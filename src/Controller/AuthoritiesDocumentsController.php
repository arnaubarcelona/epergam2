<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuthoritiesDocuments Controller
 *
 * @property \App\Model\Table\AuthoritiesDocumentsTable $AuthoritiesDocuments
 *
 * @method \App\Model\Entity\AuthoritiesDocument[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthoritiesDocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $where = [
        'recursive'=>-1,
        'fields' => [
           'AuthoritiesDocuments.id',
           'AuthoritiesDocuments.authority_id',
           'AuthoritiesDocuments.document_id',
           'AuthoritiesDocuments.created',
           'AuthoritiesDocuments.modified',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
		   'author_id' => 'Authors.id',
		   'author_type_id' => 'AuthorTypes.id',
           'author_name' => 'Authors.name',
           'author_type_name' => 'AuthorTypes.name',
         ],
        'order' => ['Authors.name' => 'ASC'],
        'contain' => ['Authorities' => ['Authors', 'AuthorTypes'], 'Documents'], 
        'sortWhitelist' => ['id', 'author_id', 'author_type_name', 'author_id', 'author_type_id', 'author_name', 'count_documents','created','modified']
    ];

     // Set pagination
    $this->paginate = $where;

    // Get data
    $authoritiesDocuments = $this->paginate($this->AuthoritiesDocuments, ['limit' => 100]);
		
        $this->set(compact('authoritiesDocuments'));
    }

    /**
     * View method
     *
     * @param string|null $id Authorities Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authoritiesDocument = $this->AuthoritiesDocuments->get($id, [
            'contain' => ['Authorities', 'Documents']
        ]);

        $this->set('authoritiesDocument', $authoritiesDocument);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authoritiesDocument = $this->AuthoritiesDocuments->newEntity();
        if ($this->request->is('post')) {
            $authoritiesDocument = $this->AuthoritiesDocuments->patchEntity($authoritiesDocument, $this->request->getData());
            if ($this->AuthoritiesDocuments->save($authoritiesDocument)) {
                $this->Flash->success(__('The authorities document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authorities document could not be saved. Please, try again.'));
        }
        $authorities = $this->AuthoritiesDocuments->Authorities->find('list', ['limit' => 200]);
        $documents = $this->AuthoritiesDocuments->Documents->find('list', ['limit' => 200]);
        $this->set(compact('authoritiesDocument', 'authorities', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Authorities Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authoritiesDocument = $this->AuthoritiesDocuments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authoritiesDocument = $this->AuthoritiesDocuments->patchEntity($authoritiesDocument, $this->request->getData());
            if ($this->AuthoritiesDocuments->save($authoritiesDocument)) {
                $this->Flash->success(__('The authorities document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authorities document could not be saved. Please, try again.'));
        }
        $authorities = $this->AuthoritiesDocuments->Authorities->find('list', ['limit' => 200]);
        $documents = $this->AuthoritiesDocuments->Documents->find('list', ['limit' => 200]);
        $this->set(compact('authoritiesDocument', 'authorities', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Authorities Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authoritiesDocument = $this->AuthoritiesDocuments->get($id);
        if ($this->AuthoritiesDocuments->delete($authoritiesDocument)) {
            $this->Flash->success(__('The authorities document has been deleted.'));
        } else {
            $this->Flash->error(__('The authorities document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
