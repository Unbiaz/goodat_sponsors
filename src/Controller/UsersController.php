<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Utility\Text;
use Cake\Mailer\Email;


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
        $this->Auth->allow(['logout','add', 'forgotPassword']);
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
    
        if($this->request->is('post')) {
        
            $user_data = $this->request->data;
            if (!empty($user_data)) {

                $check_email = $this->Users->find()
                    ->where(['Users.email_address' => $user_data['User']['email_address']])
                    ->first();
        
                if (!empty($check_email)) {
                
                    $data['id'] = $check_email['User']['id'];
                    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                
                    $new_password = '';
                    for ($i=0; $i<6; $i++) {
                        $new_password .= $characters[rand(0, strlen($characters) - 1)];
                    }
          
                    $data['password'] = md5($new_password);
                    //$this->Users->save($data);
                    
                    /* Sending Email to user */
                    $email = $user_data['User']['email_address'];
                    $message = '';  
                    $message .= '<html>';
                    $message .='<table style="width:800px;margin:auto;border-collapse:collapse;border:1px solid #5A5A5A;">';
                    $message .='<thead style="background:#5A5A5A;">';
                    $message .='<tr>';
                    $message .='<td width="50%" style="padding:14px 20px;text-align:right;font-size:25px;color:#fff;"></td>';
                    $message .='</tr>';
                    $message .='</thead>';
                    $message .='<tbody>';
                    $message .='<tr>';
                    $message .='<td style="padding:5px 20px;" colspan="2">';
                    $message .= "<h3>New Password  :".$new_password."</h3></br>";

                    $message .= '<br/><br/>Best Regards';
                    $message .= '<br/><br/> My Team';
                    $message .='</td>';
                    $message .='</tr>';
                    $message .='</tbody>';
                    $message .='</table>';
                    $message .= '<html>';
                    $data_send['body'] = $message;
                    $data_send['subject'] = "Forgot Password - My Team";

                    $data_send['to'] = $email;
                    //echo "<pre>";print_r($data_send);die;
                    // echo "<pre>";print_r($data_send);die;

                    $output = $this->send_mail($data_send);
      
                    /* Sending Email to user */
                    if ($output) {  
                        $this->Flash->success(__('Password has been changed, Check Your Mail'));
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

}
