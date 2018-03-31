<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * ConservationStates Controller
 *
 * @property \App\Model\Table\ConservationStatesTable $ConservationStates
 *
 * @method \App\Model\Entity\ConservationState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConservationStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conservationStates = $this->paginate($this->ConservationStates);

        $this->set(compact('conservationStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Conservation State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conservationState = $this->ConservationStates->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('conservationState', $conservationState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conservationState = $this->ConservationStates->newEntity();
        if ($this->request->is('post')) {
            $conservationState = $this->ConservationStates->patchEntity($conservationState, $this->request->getData());
            if ($this->ConservationStates->save($conservationState)) {
                $this->Flash->success(__('The conservation state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conservation state could not be saved. Please, try again.'));
        }
        $this->set(compact('conservationState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conservation State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conservationState = $this->ConservationStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conservationState = $this->ConservationStates->patchEntity($conservationState, $this->request->getData());
            if ($this->ConservationStates->save($conservationState)) {
                $this->Flash->success(__('The conservation state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conservation state could not be saved. Please, try again.'));
        }
        $this->set(compact('conservationState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conservation State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$conservationState = $this->ConservationStates->get($id);
		$delefolder = $conservationState->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        $conservationState = $this->ConservationStates->get($id);
        if ($this->ConservationStates->delete($conservationState)) {
            $this->Flash->success(__('The conservation state has been deleted.'));
        } else {
            $this->Flash->error(__('The conservation state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
