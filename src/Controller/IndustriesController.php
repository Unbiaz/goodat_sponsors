<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Industries Controller
 *
 * @property \App\Model\Table\IndustriesTable $Industries
 *
 * @method \App\Model\Entity\Industry[] paginate($object = null, array $settings = [])
 */
class IndustriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $industries = $this->paginate($this->Industries);

        $this->set(compact('industries'));
        $this->set('_serialize', ['industries']);
    }

    /**
     * View method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $industry = $this->Industries->get($id, [
            'contain' => []
        ]);

        $this->set('industry', $industry);
        $this->set('_serialize', ['industry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $industry = $this->Industries->newEntity();
        if ($this->request->is('post')) {
            $industry = $this->Industries->patchEntity($industry, $this->request->getData());
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
        $this->set('_serialize', ['industry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $industry = $this->Industries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $industry = $this->Industries->patchEntity($industry, $this->request->getData());
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
        $this->set('_serialize', ['industry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $industry = $this->Industries->get($id);
        if ($this->Industries->delete($industry)) {
            $this->Flash->success(__('The industry has been deleted.'));
        } else {
            $this->Flash->error(__('The industry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
