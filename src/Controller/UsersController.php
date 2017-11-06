<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Log\Log;
use Cake\Utility\Text;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;


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
        $this->Auth->allow(['logout','add', 'forgotPassword','resetpassword']);
    }

    public function isAuthorized($user)
    {

        $this->log('Users Controller', 'debug');
        $this->log($user, 'debug');

        $action = $this->request->params['action'];

        // The index actions are always allowed.
        if (in_array($action, ['index'])) {
            $this->log('Index Always Allowed', 'debug');
            return true;
        }

        // The index actions are always allowed.
        if (in_array($action, ['add']) && $this->isAdmin()) {
            $this->log('Add Always Allowed for Admin', 'debug');
            return true;
        }

        // // The showLostPasswordReminder action are always allowed for admin.
        // if (in_array($action, ['showLostPasswordReminder']) && $this->isAdmin()) {
        //     $this->log('showLostPasswordReminder Always Allowed for Admin', 'debug');
        //     return true;
        // }

        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            $this->log('No ID', 'debug');
            //$this->log($this->request->params, 'debug');
            return false;
        }

        // Check that the user belongs to the current user.
        $id = $this->request->params['pass'][0];
        $thisUser = $this->Users->get($id);
        if ($thisUser->id == $user['id']) {
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
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roleOptions = $this->Users->roleTypes();
        $this->set(compact('user', 'roleOptions'));
        $this->set('_serialize', ['user']);
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

                return $this->redirect(['action' => 'index']);
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
                return $this->redirect($this->Auth->redirectUrl(['controller' => 'Companies','action' => 'index']));
            }
            $this->Flash->error('Your email or password is incorrect.');
        }
    }

    public function forgotPassword()
    {

        // $user = $this->Users->newEntity();
        // if ($this->request->is('post')) {
        //     $user = $this->Users->patchEntity($user, $this->request->getData());
    
        if($this->request->is('post')) {
        
            $user_data = $this->request->data;
            if (!empty($user_data)) {

                $check_email = $this->Users->find()
                    ->where(['Users.email' => $user_data['email']])
                    ->first();
        
                if (!empty($check_email)) {

                    // $email = new Email('default');
                    // $email->from(['issasanogo007@gmail.com' => 'My Site'])
                    // ->to($user_data['email'])
                    // ->subject('About')
                    // ->send('My message');

                    $email = new Email();
                    $email
                        ->template('reset_password')
                        ->emailFormat('html')
                        ->to($user_data['email'])
                        ->subject('Reset Password')
                        ->from('issasanogo007@gmail.com')
                        ->send();
                    $helpers = array('session');
                    $session = $this->request->session();
                    $session->write('email_saisi', $user_data['email']);

                    //$data_send['to'] = $email;
                    //echo "<pre>";print_r($data_send);die;
                    // echo "<pre>";print_r($data_send);die;

                    //$output = $this->send_mail($data_send);
      
                    /* Sending Email to user */
                    if ($email) {  
                        $this->Flash->success(__('A link has been sent to you to reset your password, Check Your Mail'));
                        return $this->redirect($this->referer());
                    } else {
                        $this->Flash->error(__('The password could not be changed. Please, try again.'));
                    }
                    
                } else {
                    $this->Flash->error(__('The email address could not be found. Please, try again.'));
                    return $this->redirect($this->referer());
                }
            }
        }
    }

    public function resetpassword()
    {
        if ($this->request->is('post')) {

            if($this->request->is('post')) {
        
                $user_data = $this->request->data;
                if (!empty($user_data)) {
                    $session = $this->request->session();
                    $user_active = $this->Users->find()
                        ->where(['Users.email' => $session->read('email_saisi')])
                        ->first();
                    // $user_active->set_password($user_data['password']);
                    // $user_active->


                    if ($user_data['password'] == $user_data['password2']) {
                        // $connection = ConnectionManager::get('default');
                        // $connection->update('users', ['password' => $user_data['password']], ['id_user' => $user_active->id]);
                        
                        // $user_data['password1'] = md5($user_data['password']);

                        //$hash = Security::hash($user_data['password']);
                        // $hasher->hash($user_data['password']);

                        $hasher = new DefaultPasswordHasher();
                        

                        //$user_data['password'] = $this->setPassword($user_data['password']);

                        $query = $this->Users->query();
                        $query->update()
                            ->set(['password' => $hasher->hash($user_data['password'])])
                            ->where(['id_user' => $user_active->id_user])
                            ->execute();
                        $this->Flash->success(__('The password has been changed.'));
                    } 
                    else{
                        $this->Flash->error(__('The password could not be changed. Please, check the two passwords if they are same.'));
                    }
                   
                }
            }

        }
    }

}
