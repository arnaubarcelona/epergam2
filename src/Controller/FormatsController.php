<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * Formats Controller
 *
 * @property \App\Model\Table\FormatsTable $Formats
 *
 * @method \App\Model\Entity\Format[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $formats = $this->paginate($this->Formats);

        $this->set(compact('formats'));
    }

    /**
     * View method
     *
     * @param string|null $id Format id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $format = $this->Formats->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('format', $format);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $format = $this->Formats->newEntity();
        if ($this->request->is('post')) {
            $format = $this->Formats->patchEntity($format, $this->request->getData());
            if ($this->Formats->save($format)) {
                $this->Flash->success(__('The format has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The format could not be saved. Please, try again.'));
        }
        $this->set(compact('format'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Format id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $format = $this->Formats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $format = $this->Formats->patchEntity($format, $this->request->getData());
            if ($this->Formats->save($format)) {
                $this->Flash->success(__('The format has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The format could not be saved. Please, try again.'));
        }
        $this->set(compact('format'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Format id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$format = $this->Formats->get($id);
		$delefolder = $format->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        $format = $this->Formats->get($id);
        if ($this->Formats->delete($format)) {
            $this->Flash->success(__('The format has been deleted.'));
        } else {
            $this->Flash->error(__('The format could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
