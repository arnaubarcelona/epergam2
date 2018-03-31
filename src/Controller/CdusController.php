<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cdus Controller
 *
 * @property \App\Model\Table\CdusTable $Cdus
 *
 * @method \App\Model\Entity\Cdus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CdusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cdus = $this->paginate($this->Cdus);

        $this->set(compact('cdus'));
    }

    /**
     * View method
     *
     * @param string|null $id Cdus id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cdus = $this->Cdus->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('cdus', $cdus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cdus = $this->Cdus->newEntity();
        if ($this->request->is('post')) {
            $cdus = $this->Cdus->patchEntity($cdus, $this->request->getData());
            if ($this->Cdus->save($cdus)) {
                $this->Flash->success(__('The cdus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdus could not be saved. Please, try again.'));
        }
        $this->set(compact('cdus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cdus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cdus = $this->Cdus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cdus = $this->Cdus->patchEntity($cdus, $this->request->getData());
            if ($this->Cdus->save($cdus)) {
                $this->Flash->success(__('The cdus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdus could not be saved. Please, try again.'));
        }
        $this->set(compact('cdus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cdus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cdus = $this->Cdus->get($id);
        if ($this->Cdus->delete($cdus)) {
            $this->Flash->success(__('The cdus has been deleted.'));
        } else {
            $this->Flash->error(__('The cdus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
