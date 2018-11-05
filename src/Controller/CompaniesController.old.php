<?php
namespace App\Controller;

use App\Controller\AppController;
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


    public function isAuthorized($user)
    {
        //debug($user);
        $this->log('Questions Controller isAuthorized', 'debug');
        $this->log($user, 'debug');

        // This whole section is to allow content specific access on
        // actions such as /edit/nnn

        $action = $this->request->params['action'];

        // The index actions are always allowed.
        if ( in_array($action, ['index','category']) && $this->isLoggedIn() ) {
            $this->log('Index', 'debug');
            return true;
        }
        
        // The index actions are always allowed.
        if (in_array($action, ['add', 'view']) && $this->isAdmin()) {
            $this->log('Add Always Allowed for Admin', 'debug');
            return true;
        }

        /*if(!$this->isAdmin() && !$this->isSubcriber()){
            return $this->redirect(['controller' => 'Users', 'action'=>'subscribe']);
        }*/
        
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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if(!$this->isSubcriber() && !$this->isAdmin()){

            $companies = $this->Companies->find('all',[
                'contain' => ['Industries'], 
                'order'=>['Companies.name_company'=>'asc'],
                'limit'=>5
            ]);
        } 
        else $companies = $this->paginate($this->Companies, ['contain' => ['Industries'], 'order'=>['Companies.name_company'=>'asc']]);

        $industries = $this->Companies->Industries->find('all', ['order'=>['categori_indus'=>'ASC'] ]);
        
        $this->set(compact('industries', 'companies'));
        $this->set('_serialize', ['industries', 'companies']);
    }

    public function category($cat_id)
    {
        if(!$this->isSubcriber() && !$this->isAdmin()){

            $companies = $this->Companies->find('all',[
                'contain' => ['Industries'],
                'conditions' => ['Companies.industri_id' => $cat_id], 
                'order'=>['Companies.name_company'=>'asc'],
                'limit'=>5
            ]);
        } 
        else $companies = $this->paginate($this->Companies, ['contain' => ['Industries'], 'conditions' => ['Companies.industri_id' => $cat_id], 'order'=>['Companies.name_company'=>'asc']]);
    
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
