<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * LendingStates Controller
 *
 * @property \App\Model\Table\LendingStatesTable $LendingStates
 *
 * @method \App\Model\Entity\LendingState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LendingStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lendingStates = $this->paginate($this->LendingStates);

        $this->set(compact('lendingStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Lending State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lendingState = $this->LendingStates->get($id, [
            'contain' => ['Lendings']
        ]);

        $this->set('lendingState', $lendingState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lendingState = $this->LendingStates->newEntity();
        if ($this->request->is('post')) {
            $lendingState = $this->LendingStates->patchEntity($lendingState, $this->request->getData());
            if ($this->LendingStates->save($lendingState)) {
                $this->Flash->success(__('The lending state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending state could not be saved. Please, try again.'));
        }
        $this->set(compact('lendingState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lending State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lendingState = $this->LendingStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lendingState = $this->LendingStates->patchEntity($lendingState, $this->request->getData());
            if ($this->LendingStates->save($lendingState)) {
                $this->Flash->success(__('The lending state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending state could not be saved. Please, try again.'));
        }
        $this->set(compact('lendingState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lending State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$lendingState = $this->LendingStates->get($id);
		$delefolder = $lendingState->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        $lendingState = $this->LendingStates->get($id);
        if ($this->LendingStates->delete($lendingState)) {
            $this->Flash->success(__('The lending state has been deleted.'));
        } else {
            $this->Flash->error(__('The lending state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
