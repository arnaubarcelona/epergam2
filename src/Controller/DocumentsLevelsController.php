<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentsLevels Controller
 *
 * @property \App\Model\Table\DocumentsLevelsTable $DocumentsLevels
 *
 * @method \App\Model\Entity\DocumentsLevel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Levels']
        ];
        $documentsLevels = $this->paginate($this->DocumentsLevels);

        $this->set(compact('documentsLevels'));
    }

    /**
     * View method
     *
     * @param string|null $id Documents Level id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentsLevel = $this->DocumentsLevels->get($id, [
            'contain' => ['Documents', 'Levels']
        ]);

        $this->set('documentsLevel', $documentsLevel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentsLevel = $this->DocumentsLevels->newEntity();
        if ($this->request->is('post')) {
            $documentsLevel = $this->DocumentsLevels->patchEntity($documentsLevel, $this->request->getData());
            if ($this->DocumentsLevels->save($documentsLevel)) {
                $this->Flash->success(__('The documents level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents level could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsLevels->Documents->find('list', ['limit' => 200]);
        $levels = $this->DocumentsLevels->Levels->find('list', ['limit' => 200]);
        $this->set(compact('documentsLevel', 'documents', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documents Level id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentsLevel = $this->DocumentsLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentsLevel = $this->DocumentsLevels->patchEntity($documentsLevel, $this->request->getData());
            if ($this->DocumentsLevels->save($documentsLevel)) {
                $this->Flash->success(__('The documents level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documents level could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentsLevels->Documents->find('list', ['limit' => 200]);
        $levels = $this->DocumentsLevels->Levels->find('list', ['limit' => 200]);
        $this->set(compact('documentsLevel', 'documents', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documents Level id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentsLevel = $this->DocumentsLevels->get($id);
        if ($this->DocumentsLevels->delete($documentsLevel)) {
            $this->Flash->success(__('The documents level has been deleted.'));
        } else {
            $this->Flash->error(__('The documents level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
