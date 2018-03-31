<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentsLanguages Controller
 *
 * @property \App\Model\Table\DocumentsLanguagesTable $DocumentsLanguages
 *
 * @method \App\Model\Entity\DocumentsLanguage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsLanguagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Languages']
        ];
        $documentsLanguages = $this->paginate($this->DocumentsLanguages);

        $this->set(compact('documentsLanguages'));
    }

    /**
     * View method
     *
     * @param string|null $id Documents Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentsLanguage = $this->DocumentsLanguages->get($id, [
            'contain' => ['Documents', 'Languages']
        ]);

        $this->set('documentsLanguage', $documentsLanguage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentsLanguage = $this->DocumentsLanguages->newEntity();
        if ($this->request->is('post')) {
            $documentsLanguage = $this->DocumentsLanguages->patchEntity($documentsLanguage, $this->request->getData());
            if ($this->DocumentsLanguages->save($documentsLanguage)) {
                $this->Flash->success(__('The documents language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents language could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsLanguages->Documents->find('list', ['limit' => 200]);
        $languages = $this->DocumentsLanguages->Languages->find('list', ['limit' => 200]);
        $this->set(compact('documentsLanguage', 'documents', 'languages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documents Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentsLanguage = $this->DocumentsLanguages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentsLanguage = $this->DocumentsLanguages->patchEntity($documentsLanguage, $this->request->getData());
            if ($this->DocumentsLanguages->save($documentsLanguage)) {
                $this->Flash->success(__('The documents language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents language could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsLanguages->Documents->find('list', ['limit' => 200]);
        $languages = $this->DocumentsLanguages->Languages->find('list', ['limit' => 200]);
        $this->set(compact('documentsLanguage', 'documents', 'languages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documents Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentsLanguage = $this->DocumentsLanguages->get($id);
        if ($this->DocumentsLanguages->delete($documentsLanguage)) {
            $this->Flash->success(__('The documents language has been deleted.'));
        } else {
            $this->Flash->error(__('The documents language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
