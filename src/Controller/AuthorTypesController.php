<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuthorTypes Controller
 *
 * @property \App\Model\Table\AuthorTypesTable $AuthorTypes
 *
 * @method \App\Model\Entity\AuthorType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $authorTypes = $this->paginate($this->AuthorTypes);

        $this->set(compact('authorTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Author Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authorType = $this->AuthorTypes->get($id, [
            'contain' => ['Authorities']
        ]);

        $this->set('authorType', $authorType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authorType = $this->AuthorTypes->newEntity();
        if ($this->request->is('post')) {
            $authorType = $this->AuthorTypes->patchEntity($authorType, $this->request->getData());
            if ($this->AuthorTypes->save($authorType)) {
                // Check for ajax
                if ($this->request->is('ajax')) {
                    return $this->response->withType('application/json')
                        ->withStringBody(json_encode([
                            'status' => 'success',
                            'message' => 'The author type has been saved.',
                            'data' => json_decode(json_encode($authorType), true)
                        ]));
                }
                $this->Flash->success(__('The author type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Check for ajax
            if ($this->request->is('ajax')) {
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => 'The author type could not be saved. Please, try again.'
                    ]));
            }
            $this->Flash->error(__('The author type could not be saved. Please, try again.'));
        }
        $this->set(compact('authorType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Author Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authorType = $this->AuthorTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authorType = $this->AuthorTypes->patchEntity($authorType, $this->request->getData());
            if ($this->AuthorTypes->save($authorType)) {
                $this->Flash->success(__('The author type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author type could not be saved. Please, try again.'));
        }
        $this->set(compact('authorType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Author Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authorType = $this->AuthorTypes->get($id);
        if ($this->AuthorTypes->delete($authorType)) {
            $this->Flash->success(__('The author type has been deleted.'));
        } else {
            $this->Flash->error(__('The author type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
