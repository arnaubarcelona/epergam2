<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MassiveErrors Controller
 *
 * @property \App\Model\Table\MassiveErrorsTable $MassiveErrors
 *
 * @method \App\Model\Entity\MassiveError[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MassiveErrorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $massiveErrors = $this->paginate($this->MassiveErrors, ['contain' => 'Documents']);

        $this->set(compact('massiveErrors'));
    }
    
    public function labelindex()
    {
        $massiveErrors = $this->paginate($this->MassiveErrors, ['contain' => 'Documents']);

        $this->set(compact('massiveErrors'));
    }

    /**
     * View method
     *
     * @param string|null $id Massive Error id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $massiveError = $this->MassiveErrors->get($id, [
            'contain' => []
        ]);

        $this->set('massiveError', $massiveError);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $massiveError = $this->MassiveErrors->newEntity();
        if ($this->request->is('post')) {
            $massiveError = $this->MassiveErrors->patchEntity($massiveError, $this->request->getData());
            if ($this->MassiveErrors->save($massiveError)) {
                $this->Flash->success(__('The massive error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The massive error could not be saved. Please, try again.'));
        }
        $this->set(compact('massiveError'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Massive Error id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $massiveError = $this->MassiveErrors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $massiveError = $this->MassiveErrors->patchEntity($massiveError, $this->request->getData());
            if ($this->MassiveErrors->save($massiveError)) {
                $this->Flash->success(__('The massive error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The massive error could not be saved. Please, try again.'));
        }
        $this->set(compact('massiveError'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Massive Error id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $massiveError = $this->MassiveErrors->get($id);
        if ($this->MassiveErrors->delete($massiveError)) {
            $this->Flash->success(__('The massive error has been deleted.'));
        } else {
            $this->Flash->error(__('The massive error could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
