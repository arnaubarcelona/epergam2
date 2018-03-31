<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentsPublishers Controller
 *
 * @property \App\Model\Table\DocumentsPublishersTable $DocumentsPublishers
 *
 * @method \App\Model\Entity\DocumentsPublisher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsPublishersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Publishers']
        ];
        $documentsPublishers = $this->paginate($this->DocumentsPublishers);

        $this->set(compact('documentsPublishers'));
    }

    /**
     * View method
     *
     * @param string|null $id Documents Publisher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentsPublisher = $this->DocumentsPublishers->get($id, [
            'contain' => ['Documents', 'Publishers']
        ]);

        $this->set('documentsPublisher', $documentsPublisher);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentsPublisher = $this->DocumentsPublishers->newEntity();
        if ($this->request->is('post')) {
            $documentsPublisher = $this->DocumentsPublishers->patchEntity($documentsPublisher, $this->request->getData());
            if ($this->DocumentsPublishers->save($documentsPublisher)) {
                $this->Flash->success(__('The documents publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents publisher could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsPublishers->Documents->find('list', ['limit' => 200]);
        $publishers = $this->DocumentsPublishers->Publishers->find('list', ['limit' => 200]);
        $this->set(compact('documentsPublisher', 'documents', 'publishers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documents Publisher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentsPublisher = $this->DocumentsPublishers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentsPublisher = $this->DocumentsPublishers->patchEntity($documentsPublisher, $this->request->getData());
            if ($this->DocumentsPublishers->save($documentsPublisher)) {
                $this->Flash->success(__('The documents publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents publisher could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsPublishers->Documents->find('list', ['limit' => 200]);
        $publishers = $this->DocumentsPublishers->Publishers->find('list', ['limit' => 200]);
        $this->set(compact('documentsPublisher', 'documents', 'publishers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documents Publisher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentsPublisher = $this->DocumentsPublishers->get($id);
        if ($this->DocumentsPublishers->delete($documentsPublisher)) {
            $this->Flash->success(__('The documents publisher has been deleted.'));
        } else {
            $this->Flash->error(__('The documents publisher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
