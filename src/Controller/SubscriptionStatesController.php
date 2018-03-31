<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * SubscriptionStates Controller
 *
 * @property \App\Model\Table\SubscriptionStatesTable $SubscriptionStates
 *
 * @method \App\Model\Entity\SubscriptionState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $subscriptionStates = $this->paginate($this->SubscriptionStates);

        $this->set(compact('subscriptionStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Subscription State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subscriptionState = $this->SubscriptionStates->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('subscriptionState', $subscriptionState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subscriptionState = $this->SubscriptionStates->newEntity();
        if ($this->request->is('post')) {
            $subscriptionState = $this->SubscriptionStates->patchEntity($subscriptionState, $this->request->getData());
            if ($this->SubscriptionStates->save($subscriptionState)) {
                $this->Flash->success(__('The subscription state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subscription state could not be saved. Please, try again.'));
        }
        $this->set(compact('subscriptionState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subscription State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subscriptionState = $this->SubscriptionStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subscriptionState = $this->SubscriptionStates->patchEntity($subscriptionState, $this->request->getData());
            if ($this->SubscriptionStates->save($subscriptionState)) {
                $this->Flash->success(__('The subscription state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subscription state could not be saved. Please, try again.'));
        }
        $this->set(compact('subscriptionState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subscription State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$subscriptionState = $this->SubscriptionStates->get($id);
		$delefolder = $subscriptionState->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        $subscriptionState = $this->SubscriptionStates->get($id);
        if ($this->SubscriptionStates->delete($subscriptionState)) {
            $this->Flash->success(__('The subscription state has been deleted.'));
        } else {
            $this->Flash->error(__('The subscription state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
