<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Log\Log;
use Cake\Utility\Text;
use Cake\Mailer\Email;
use Cake\Mailer\Transport\SmtpTransport;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use \Cake\Routing\Router;
use Cake\Core\App;

$path = App::path('src');
require_once(dirname(dirname($path[0])).'/vendor/stripe/stripe/init.php');


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        
        $this->log('Users Controller initialize', 'debug');
        $this->Auth->allow(['logout','useradd', 'forgotPassword','resetpassword']);

        $action = $this->request->params['action'];

        //Redirect to companies index page
        if( in_array($action, ['useradd', 'forgotPassword', 'resetpassword']) && $this->isLoggedIn() )
            return $this->redirect(['controller'=>'Companies', 'action' => 'index']);

    }

    public function isAuthorized($user)
    {

        $this->log('Users Controller', 'debug');
        $this->log($user, 'debug');

        $action = $this->request->params['action'];

        // Allowed actions by login users
        if (in_array($action, ['subscribe']) && $this->isLoggedIn()) {
            $this->log('Subscribe Always Allowed', 'debug');
            return true;
        }

        //for Admin only
        if (in_array($action, ['index', 'add']) && $this->isAdmin()) {
            $this->log('Index and Add is allowed for Admin', 'debug');
            return true;
        }

        // All other actions require an id.
        if (empty($this->request->params['pass'])) {
            $this->log('No ID', 'debug');
            //$this->log($this->request->params, 'debug');
            return false;
        }

        // Check that the user belongs to the current user.
        $request_id = $this->request->params['pass'][0];
        if ($action == 'edit' && $this->Users->get($request_id)->id_user == $user['id_user']) {
            return true;
        }

        return parent::isAuthorized($user);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Payments']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            //Check email
            $ch = curl_init();
            curl_setopt_array($ch, [CURLOPT_URL => 'https://trumail.io/json/'.urlencode($data['email']),
                                    CURLOPT_HEADER => false,
                                    CURLOPT_RETURNTRANSFER => true]);
            $email_info = json_decode(curl_exec($ch));
            curl_close($ch);
            
            if($email_info->hostExists && $email_info->deliverable){
                
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'login']);
                }
                else
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            else
                $this->Flash->error(__('Please enter valid email'));
            
        }
        $roleOptions = $this->Users->roleTypes();
        $this->set(compact('user', 'roleOptions', 'email_info'));
        $this->set('_serialize', ['user']);
    }

    //User added itself by home page
    public function useradd()
    {
        UsersController::add();
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                if( $this->isAdmin() )
                    return $this->redirect(['action' => 'index']);
                else
                    return $this->redirect( $this->request->webroot );
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());  
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                $this->Flash->success('You are now logged in.');
                return $this->redirect(['controller'=>'Companies', 'action' => 'index']);
            }
            $this->Flash->error('Your email or password is incorrect.');
        }
    }

    public function subscribe()
    {

        $payment = $this->Users->get($this->Auth->user()['id_user'], [
            'contain' => ['Payments']
        ]);

        if($payment['payments']){

            $pay_count = 0;
            foreach ($payment['payments'] as $pay) {
                if($pay['validTo'] > Time::now() ) $pay_count++;
            }

            if($pay_count >= 1)
                return $this->redirect(['controller'=>'Companies', 'action' => 'index']);
    
        }

        $pageCharge = Router::url(['controller'=>'Payments', 'action'=>'charge']);
        $userEmail = $this->Auth->user()['email'];

        $this->set(compact('pageCharge','userEmail'));
    }


    public function forgotPassword()
    {
    
        if($this->request->is('post')) {
        
            $data = $this->request->Data();
            if (!empty($data)) {

                $user_data = $this->Users->find()
                    ->where(['Users.email' => $data['email']])
                    ->first();
        
                if (!empty($user_data)) {

                    $crypted_id = Security::encrypt( $user_data['id_user'] , 'a907988d9aa04e1d1aa27fe8774810fabe86e01d55d');
                    $encode_id = urlencode($crypted_id);

                    $email = new Email('default');
                    $email
                        ->from(['noreply@goodat.co.uk'=>'Sponsors Goodat'])
                        ->to($user_data['email'])
                        ->subject('Password reset request')
                        ->template('reset_password')
                        ->emailFormat('html')
                        ->viewVars(['username'=>$user_data['username'], 'encode_id'=>$encode_id])
                        ->send();

                    $this->Flash->success(__('A link has been sent to you to reset your password, Check Your Mail'));
                    
                } else {
                    $this->Flash->error(__('The email address could not be found. Please, try again.'));
                    return $this->redirect($this->referer());
                }
            }
            else $this->Flash->error(__('Error, any data has been posted'));
        }
    }

    public function resetpassword($encode_id)
    {

        if(!empty($encode_id)){

            if($this->request->is('post')) {
        
                $user_data = $this->request->data;

                if (!empty($user_data)) {

                    if ($user_data['password'] == $user_data['password2']) {

                        $decode_id = urldecode($encode_id);
                        $decrypted_id = Security::decrypt( $decode_id , 'a907988d9aa04e1d1aa27fe8774810fabe86e01d55d' );

                        $user_active = $this->Users->find()
                            ->where(['Users.id_user' => $decrypted_id])
                            ->first();

                        $hasher = new DefaultPasswordHasher();

                        $query = $this->Users->query();
                        $query->update()
                            ->set(['password' => $hasher->hash($user_data['password'])])
                            ->where(['id_user' => $user_active->id_user])
                            ->execute();

                        $this->Flash->success(__('Your password has been changed.'));

                        return $this->redirect(['action'=>'login']);
                    } 
                    else{
                        $this->Flash->error(__('The password could not be changed. Please, check the two passwords if they are same.'));
                    }
                   
                }
                else $this->Flash->error(__('Error, any data has been posted'));
            }

        } else return $this->redirect(['action'=>'forgotPassword']);

    }

}
