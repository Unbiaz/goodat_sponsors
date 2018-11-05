<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FunctionalAreas Controller
 *
 * @property \App\Model\Table\FunctionalAreasTable $FunctionalAreas
 *
 * @method \App\Model\Entity\FunctionalArea[] paginate($object = null, array $settings = [])
 */
class FunctionalAreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $functionalAreas = $this->paginate($this->FunctionalAreas);

        $this->set(compact('functionalAreas'));
        $this->set('_serialize', ['functionalAreas']);
    }

    /**
     * View method
     *
     * @param string|null $id Functional Area id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $functionalArea = $this->FunctionalAreas->get($id, [
            'contain' => []
        ]);

        $this->set('functionalArea', $functionalArea);
        $this->set('_serialize', ['functionalArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $functionalArea = $this->FunctionalAreas->newEntity();
        if ($this->request->is('post')) {
            $functionalArea = $this->FunctionalAreas->patchEntity($functionalArea, $this->request->getData());
            if ($this->FunctionalAreas->save($functionalArea)) {
                $this->Flash->success(__('The functional area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The functional area could not be saved. Please, try again.'));
        }
        $this->set(compact('functionalArea'));
        $this->set('_serialize', ['functionalArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Functional Area id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $functionalArea = $this->FunctionalAreas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $functionalArea = $this->FunctionalAreas->patchEntity($functionalArea, $this->request->getData());
            if ($this->FunctionalAreas->save($functionalArea)) {
                $this->Flash->success(__('The functional area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The functional area could not be saved. Please, try again.'));
        }
        $this->set(compact('functionalArea'));
        $this->set('_serialize', ['functionalArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Functional Area id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $functionalArea = $this->FunctionalAreas->get($id);
        if ($this->FunctionalAreas->delete($functionalArea)) {
            $this->Flash->success(__('The functional area has been deleted.'));
        } else {
            $this->Flash->error(__('The functional area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
