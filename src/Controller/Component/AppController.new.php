<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Utility\Inflector;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
       $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'userModel' => 'Users'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'config' => [
                'params' => ['class' => 'alert alert-warning']
            ],
           'unauthorizedRedirect' => $this->referer()
        // 'unauthorizedRedirect' => false
        ]);

        // Allow the display action so our pages controller continues to work.

        $this->log('App Controller initialize', 'debug');
        $this->Auth->allow(['display']);
       //$this->Auth->allow();
    }

// All actions disallowed by default unless Admin
    public function isAuthorized($user)
    {

     return false;
    }

    public function isAdmin()
    {
        if (!$this->Auth->user()) {
            return false;
        }
        
        $user_id = $this->Auth->user('id_user');
            
        $this->loadModel('Users');
        $thisUser = $this->Users->get($user_id);

        return (strcasecmp($thisUser['role'], 'admin') == 0);
    }

    public function isSubcriber(){

        $this->loadModel('Users');
        $pay = $this->Users->get($this->Auth->user()['id_user'], [
            'contain' => ['Payments']
        ]);

        if($pay['payments']){

            $pay_count = 0;
            foreach ($pay['payments'] as $pay) {
                if($pay['validTo'] > Time::now() ) $pay_count++;
            }

            if($pay_count >= 1)
                return true;
        }

        return false;
    }

    
    public function isLoggedIn()
    {
        if (!$this->Auth->user()) {
            return false;
        }
        
        return true;
    }

    

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {

        $this->loadComponent('Auth');
        
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->set('isLoggedIn', false);
        $this->set('isAdmin', false);
        $this->set('username', '');

        $this->set('controller-isAdmin', $this->isAdmin());
        $this->set('controller-isLoggedIn', $this->isLoggedIn());

        if ($this->Auth->user()) {
            //debug( " Logged In");
            $this->log('AC beforeRender: isLoggedIn', 'debug');
            $this->set('isLoggedIn', true);
            $this->set('isAdmin', false);
            $this->set('isSubcriber', $this->isSubcriber());
            $this->set('username', $this->Auth->user('username'));
            $this->set('user_id', $this->Auth->user('id_user'));

            if (strcasecmp($this->Auth->user('role'), 'admin') == 0) {
                $this->log('AC beforeRender: isAdmin', 'debug');
                $this->set('isAdmin', true);
            }

        } else {
            //debug( " Guest");
            $this->log('AC beforeRender: Not loggedIn', 'debug');
        }

    }

    public function beforeFilter(Event $event){


      /*  if ( !$this->request->is('ssl') ){

            $this->redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
        }*/
    }
}
