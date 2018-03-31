<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentsSubjects Controller
 *
 * @property \App\Model\Table\DocumentsSubjectsTable $DocumentsSubjects
 *
 * @method \App\Model\Entity\DocumentsSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Subjects']
        ];
        $documentsSubjects = $this->paginate($this->DocumentsSubjects);

        $this->set(compact('documentsSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Documents Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentsSubject = $this->DocumentsSubjects->get($id, [
            'contain' => ['Documents', 'Subjects']
        ]);

        $this->set('documentsSubject', $documentsSubject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentsSubject = $this->DocumentsSubjects->newEntity();
        if ($this->request->is('post')) {
            $documentsSubject = $this->DocumentsSubjects->patchEntity($documentsSubject, $this->request->getData());
            if ($this->DocumentsSubjects->save($documentsSubject)) {
                $this->Flash->success(__('The documents subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents subject could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsSubjects->Documents->find('list', ['limit' => 200]);
        $subjects = $this->DocumentsSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('documentsSubject', 'documents', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documents Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentsSubject = $this->DocumentsSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentsSubject = $this->DocumentsSubjects->patchEntity($documentsSubject, $this->request->getData());
            if ($this->DocumentsSubjects->save($documentsSubject)) {
                $this->Flash->success(__('The documents subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents subject could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsSubjects->Documents->find('list', ['limit' => 200]);
        $subjects = $this->DocumentsSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('documentsSubject', 'documents', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documents Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentsSubject = $this->DocumentsSubjects->get($id);
        if ($this->DocumentsSubjects->delete($documentsSubject)) {
            $this->Flash->success(__('The documents subject has been deleted.'));
        } else {
            $this->Flash->error(__('The documents subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
