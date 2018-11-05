<?php
namespace App\Controller;
//namespace Cake\View\Helper;

use App\Controller\AppController;
use App\Controller\HtmlHelper;
use Cake\Mailer\Email;
use Cake\Database\Type;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[] paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    
    public function isAuthorized($user)
    {
        //debug($user);
        $this->log('Questions Controller isAuthorized', 'debug');
        $this->log($user, 'debug');

        // This whole section is to allow content specific access on actions

        $action = $this->request->params['action'];

        // Theses actions are always allowed
        if ( in_array($action, ['index','area','location','view','talentRoute']) && $this->isLoggedIn() ) {
            $this->log('Index', 'debug');
            return true;
        }
        
        // The index actions are always allowed for Admin
        if ( in_array($action, ['add', 'edit']) && $this->isAdmin() ) {
            $this->log('Add Always Allowed for Admin', 'debug');
            return true;
        }

        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            $this->log('No ID', 'debug');
            return false;
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
        $this->paginate = [
            'contain' => ['Companies', 'ContratTypes', 'FunctionalAreas', 'Locations'],
            'order'=>['expirated'=>'desc']
        ];
        
        //Limitation for no subscriber
        if(!$this->isSubcriber() && !$this->isAdmin())$this->paginate['limit']=4;
        
        $jobs = $this->paginate($this->Jobs);
        $functionalAreas = $this->Jobs->FunctionalAreas->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();
        $locations = $this->Jobs->Locations->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();

        $this->set(compact('jobs', 'functionalAreas', 'locations'));
        $this->set('_serialize', ['jobs', 'functionalAreas', 'locations']);
    }
    
    /**
     * Area method
     *
     * @return \Cake\Http\Response|void
     */
    public function area($id)
    {
        $this->paginate = [
            'contain' => ['Companies', 'ContratTypes', 'FunctionalAreas', 'Locations']
        ];
        
        //Limitation for no subscriber
        if(!$this->isSubcriber() && !$this->isAdmin())$this->paginate['limit']=4;
        
        $jobs = $this->paginate($this->Jobs->find('all')->where(['area_id'=>$id]));
        $functionalAreas = $this->Jobs->FunctionalAreas->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();
        $locations = $this->Jobs->Locations->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();
        $area = $this->Jobs->FunctionalAreas->find()->where(['id'=>$id])->first();

        $this->set(compact('jobs', 'functionalAreas', 'locations', 'area'));
        $this->set('_serialize', ['jobs', 'functionalAreas', 'locations', 'area']);
    }
    
    /**
     * Location method
     *
     * @return \Cake\Http\Response|void
     */
    public function location($id)
    {
        $this->paginate = [
            'contain' => ['Companies', 'ContratTypes', 'FunctionalAreas', 'Locations']
        ];
        
        //Limitation for no subscriber
        if(!$this->isSubcriber() && !$this->isAdmin())$this->paginate['limit']=4;
        
        $jobs = $this->paginate($this->Jobs->find('all')->where(['location_id'=>$id]));
        $functionalAreas = $this->Jobs->FunctionalAreas->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();
        $locations = $this->Jobs->Locations->find('list', ['keyField' => 'id', 'valueField' => 'name', 'order'=>['name' => 'asc']])->toArray();
        $location = $this->Jobs->Locations->find()->where(['id'=>$id])->first();

        $this->set(compact('jobs', 'functionalAreas', 'locations', 'location'));
        $this->set('_serialize', ['jobs', 'functionalAreas', 'locations', 'location']);
    }
    

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Companies', 'ContratTypes', 'FunctionalAreas', 'Locations']
        ]);

        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        
        $companies = $this->Jobs->Companies->find('list', ['keyField' => 'id_cmpny', 'valueField' => 'name_company'])->order(['name_company'=>'asc']);
        $contratTypes = $this->Jobs->ContratTypes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        $functionalAreas = $this->Jobs->FunctionalAreas->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        $locations = $this->Jobs->Locations->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        
        $this->set(compact('job', 'companies', 'contratTypes', 'functionalAreas', 'locations'));
        $this->set('_serialize', ['job', 'companies', 'contratTypes', 'functionalAreas', 'locations']);
    }
    
    
    /**
     * Talent Route method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function talentRoute()
    {
        if ($this->request->is('post')) {
            
            $data = $this->request->Data();
            if (!empty($data)) {
                
                if($user = $this->Auth->user()){
                    
                    $email = new Email('default');
                    $email
                        ->from(['noreply@goodat.co.uk'=>'Sponsors Goodat'])
                        ->to('mehouabolet@unbiaz.com')
                        ->subject('New talent route questions')
                        ->template('admin_email_talentroute')
                        ->emailFormat('html')
                        ->viewVars(['university'=>$data['university'], 'study_year'=>$data['study_year'], 'questions'=>$data['questions'], 'username'=>$user['username'], 'user_email'=>$user['email']])
                        ->send();
                    
                    $this->Flash->success(__('Your questions have been sent'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else $this->Flash->error(__('Error, any data has been posted'));
            
        }
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        
        $companies = $this->Jobs->Companies->find('list', ['keyField' => 'id_cmpny', 'valueField' => 'name_company'])->order(['name_company'=>'asc']);
        $contratTypes = $this->Jobs->ContratTypes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        $functionalAreas = $this->Jobs->FunctionalAreas->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        $locations = $this->Jobs->Locations->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name'=>'asc']);
        
        $this->set(compact('job', 'companies', 'contratTypes', 'functionalAreas', 'locations'));
        $this->set('_serialize', ['job', 'companies', 'contratTypes', 'functionalAreas', 'locations']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
