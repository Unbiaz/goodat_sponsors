<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Utility\Text;
use DebugKit;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[] paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

public function initialize()
    {
        parent::initialize();
               
        $this->Auth->allow(['index','category']);

     
    }
        
/*public function isAuthorized($user)
    {
        
        $action = $this->request->params['action'];

           if(in_array($action, ['index','category'])) {

            return true;
        }
              
        
       return parent::isAuthorized($user);
    }*/

/*public function beforeFilter(Event $event) {
   
    $this->Auth->allow('index');

   return parent::beforeFilter($event);

    }*/

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
 $companies = $this->paginate($this->Companies, ['contain' => ['Industries'], 'order'=>['Companies.name_company'=>'asc']]);
    $industries = $this->Companies->Industries->find('all', ['order'=>['categori_indus'=>'ASC'] ]);
    $this->set(compact('industries', 'companies'));
    $this->set('_serialize', ['industries', 'companies']);
    }

    public function category($cat_id)
    {
        
 $companies = $this->paginate($this->Companies, ['contain' => ['Industries'], 'conditions' => ['Companies.industri_id' => $cat_id], 'order'=>['Companies.name_company'=>'asc']]);
            
        $industries = $this->Companies->Industries->find('all', ['order'=>['categori_indus'=>'ASC'] ]);

        $this->set(compact('companies', 'industries'));
        $this->set('_serialize', ['companies', 'industries']);
    }


    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Industries']
        ]);

        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $industries = $this->Companies->Industries->find('list', ['limit' => 200]);
        $this->set(compact('company', 'industries'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $industries = $this->Companies->Industries->find('list', ['limit' => 200]);
        $this->set(compact('company', 'industries'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
