<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * CatalogueStates Controller
 *
 * @property \App\Model\Table\CatalogueStatesTable $CatalogueStates
 *
 * @method \App\Model\Entity\CatalogueState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CatalogueStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $catalogueStates = $this->paginate($this->CatalogueStates);

        $this->set(compact('catalogueStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Catalogue State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catalogueState = $this->CatalogueStates->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('catalogueState', $catalogueState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catalogueState = $this->CatalogueStates->newEntity();
        if ($this->request->is('post')) {
            $catalogueState = $this->CatalogueStates->patchEntity($catalogueState, $this->request->getData());
            if ($this->CatalogueStates->save($catalogueState)) {
                $this->Flash->success(__('The catalogue state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalogue state could not be saved. Please, try again.'));
        }
        $this->set(compact('catalogueState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Catalogue State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catalogueState = $this->CatalogueStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catalogueState = $this->CatalogueStates->patchEntity($catalogueState, $this->request->getData());
            if ($this->CatalogueStates->save($catalogueState)) {
                $this->Flash->success(__('The catalogue state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalogue state could not be saved. Please, try again.'));
        }
        $this->set(compact('catalogueState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Catalogue State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$catalogueState = $this->CatalogueStates->get($id);
		$delefolder = $catalogueState->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        $catalogueState = $this->CatalogueStates->get($id);
        if ($this->CatalogueStates->delete($catalogueState)) {
            $this->Flash->success(__('The catalogue state has been deleted.'));
        } else {
            $this->Flash->error(__('The catalogue state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
