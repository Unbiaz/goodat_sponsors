<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContratTypes Controller
 *
 * @property \App\Model\Table\ContratTypesTable $ContratTypes
 *
 * @method \App\Model\Entity\ContratType[] paginate($object = null, array $settings = [])
 */
class ContratTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contratTypes = $this->paginate($this->ContratTypes);

        $this->set(compact('contratTypes'));
        $this->set('_serialize', ['contratTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Contrat Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contratType = $this->ContratTypes->get($id, [
            'contain' => []
        ]);

        $this->set('contratType', $contratType);
        $this->set('_serialize', ['contratType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contratType = $this->ContratTypes->newEntity();
        if ($this->request->is('post')) {
            $contratType = $this->ContratTypes->patchEntity($contratType, $this->request->getData());
            if ($this->ContratTypes->save($contratType)) {
                $this->Flash->success(__('The contrat type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contrat type could not be saved. Please, try again.'));
        }
        $this->set(compact('contratType'));
        $this->set('_serialize', ['contratType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrat Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contratType = $this->ContratTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contratType = $this->ContratTypes->patchEntity($contratType, $this->request->getData());
            if ($this->ContratTypes->save($contratType)) {
                $this->Flash->success(__('The contrat type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contrat type could not be saved. Please, try again.'));
        }
        $this->set(compact('contratType'));
        $this->set('_serialize', ['contratType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrat Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contratType = $this->ContratTypes->get($id);
        if ($this->ContratTypes->delete($contratType)) {
            $this->Flash->success(__('The contrat type has been deleted.'));
        } else {
            $this->Flash->error(__('The contrat type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
