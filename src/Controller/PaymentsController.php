<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;
use Cake\I18n\Time;
use Cake\Database\FunctionsBuilder;
use Cake\Database\Type\DateTimeType;
use DateTime;
use DateInterval;

$path = App::path('src');
require_once(dirname(dirname($path[0])).'/vendor/stripe/stripe/init.php');


/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 *
 * @method \App\Model\Entity\Payment[] paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function isAuthorized($user)
    {
        //debug($user);
        $this->log('Questions Controller isAuthorized', 'debug');
        $this->log($user, 'debug');

        // This whole section is to allow content specific access on
        // actions such as /edit/nnn

        $action = $this->request->params['action'];

        // The index actions are always allowed.
        if (in_array($action, ['charge'])) {
            $this->log('Charge', 'debug');
            return true;
        }

        if(!$this->isAdmin() && !$this->isSubcriber()){
            return $this->redirect(['controller' => 'Users', 'action'=>'subscribe']);
        }

        // The index actions are always allowed.
        if (in_array($action, ['index','add']) && $this->isAdmin()) {
            $this->log('Add Always Allowed for Admin', 'debug');
            return true;
        }
        
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            $this->log('No ID', 'debug');
            //$this->log($this->request->params, 'debug');
            return false;
        }

        // Check that the entity belongs to the current user.
        // $id = $this->request->params['pass'][0];
        // $entity = $this->Companies->get($id);
        // if ($entity->user_id == $user['id']) {
        //     return true;
        // }

        return parent::isAuthorized($user);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
        $this->set('_serialize', ['payments']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('payment', $payment);
        $this->set('_serialize', ['payment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', ['keyField' => 'id_user', 'valueField' => 'username']);
        $this->set(compact('payment', 'users'));
        $this->set('_serialize', ['payment']);
    }

    public function charge(){
      
      if ($this->request->is('post')) {

            $stripe = [
              "secret_key"      => "sk_live_Z7oScV3bpyT0E3nzt8sPTwkm",
              "publishable_key" => "pk_live_bKiYwvTS1Odhzyk7E4ldz28Z"
            ];

            \Stripe\Stripe::setApiKey($stripe['secret_key']);
            
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create(array(
                  'amount'   => 499,
                  'currency' => 'gbp',
                  'description' => 'sponsors goodat charge',
                  'source' => $token
              ));

            $newdate = new DateTime();
            $newdate->add(new DateInterval('P180D'));

            $payment = $this->Payments->newEntity();
            $payment = $this->Payments->patchEntity($payment, [
                'amount' => 499,
                'validTo' => $newdate,
                'user_id' => $this->Auth->user()['id_user'],
                'created' => Time::now()
                ]);
            
            if ($this->Payments->save($payment)) {

                $this->Flash->success(__('The payment has been validated.'));
                return $this->redirect(['controller' => 'Companies', 'action'=>'index']);
            }

        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', ['keyField' => 'id_user', 'valueField' => 'username']);
        $this->set(compact('payment', 'users'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
