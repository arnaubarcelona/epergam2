<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LendingPolicies Controller
 *
 * @property \App\Model\Table\LendingPoliciesTable $LendingPolicies
 *
 * @method \App\Model\Entity\LendingPolicy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LendingPoliciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lendingPolicies = $this->paginate($this->LendingPolicies);

        $this->set(compact('lendingPolicies'));
    }

    /**
     * View method
     *
     * @param string|null $id Lending Policy id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lendingPolicy = $this->LendingPolicies->get($id, [
            'contain' => ['Groups']
        ]);

        $this->set('lendingPolicy', $lendingPolicy);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lendingPolicy = $this->LendingPolicies->newEntity();
        if ($this->request->is('post')) {
            $lendingPolicy = $this->LendingPolicies->patchEntity($lendingPolicy, $this->request->getData());
            if ($this->LendingPolicies->save($lendingPolicy)) {
                $this->Flash->success(__('The lending policy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending policy could not be saved. Please, try again.'));
        }
        $groups = $this->LendingPolicies->Groups->find('list', ['limit' => 200]);
        $this->set(compact('lendingPolicy', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lending Policy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lendingPolicy = $this->LendingPolicies->get($id, [
            'contain' => ['Groups']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lendingPolicy = $this->LendingPolicies->patchEntity($lendingPolicy, $this->request->getData());
            if ($this->LendingPolicies->save($lendingPolicy)) {
                $this->Flash->success(__('The lending policy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending policy could not be saved. Please, try again.'));
        }
        $groups = $this->LendingPolicies->Groups->find('list', ['limit' => 200]);
        $this->set(compact('lendingPolicy', 'groups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lending Policy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lendingPolicy = $this->LendingPolicies->get($id);
        if ($this->LendingPolicies->delete($lendingPolicy)) {
            $this->Flash->success(__('The lending policy has been deleted.'));
        } else {
            $this->Flash->error(__('The lending policy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
