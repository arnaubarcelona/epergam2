<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Publishers Controller
 *
 * @property \App\Model\Table\PublishersTable $Publishers
 *
 * @method \App\Model\Entity\Publisher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublishersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $publishers = $this->paginate($this->Publishers);

        $this->set(compact('publishers'));
    }

    /**
     * View method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publisher = $this->Publishers->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('publisher', $publisher);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publisher = $this->Publishers->newEntity();
        if ($this->request->is('post')) {

            if ($this->request->is('ajax')) {
                $defaultSaveData = [
                    'photo' => '',
                    'photo_dir' => '',
                    'photo_size' => 0,
                    'photo_type' => '',
                ];
                $saveData = $this->request->getData();
                $saveData = array_merge($saveData, $defaultSaveData);

                $publisher = $this->Publishers->patchEntity(
                    $publisher,
                    $saveData,
                    ['validate' => false]
                );
            } else {
                $publisher = $this->Publishers->patchEntity($publisher, $this->request->getData());
            }

            
            if ($this->Publishers->save($publisher)) {
                // Check for ajax
                if ($this->request->is('ajax')) {
                    return $this->response->withType('application/json')
                        ->withStringBody(json_encode([
                            'status' => 'success',
                            'message' => __('The publisher has been saved.'),
                            'data' => json_decode(json_encode($publisher), true)
                        ]));
                }
                $this->Flash->success(__('The publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Check for ajax
            if ($this->request->is('ajax')) {
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => __('The publisher could not be saved. Please, try again.')
                    ]));
            }
            $this->Flash->error(__('The publisher could not be saved. Please, try again.'));
        }
        $documents = $this->Publishers->Documents->find('list', ['limit' => 200]);
        $this->set(compact('publisher', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publisher = $this->Publishers->get($id, [
            'contain' => ['Documents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publisher = $this->Publishers->patchEntity($publisher, $this->request->getData());
            if ($this->Publishers->save($publisher)) {
                $this->Flash->success(__('The publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publisher could not be saved. Please, try again.'));
        }
        $documents = $this->Publishers->Documents->find('list', ['limit' => 200]);
        $this->set(compact('publisher', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publisher = $this->Publishers->get($id);
        if ($this->Publishers->delete($publisher)) {
            $this->Flash->success(__('The publisher has been deleted.'));
        } else {
            $this->Flash->error(__('The publisher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isPublisherAlreadyExists()
    {
        $response = false;

        if ($this->request->is('ajax')) {
            $name = $this->request->getData('name');

            $publisher = $this->Publishers->find()
                ->where(['name' => $name])
                ->first();

            if ($publisher) {
                return $this->response->withStringBody(true);
            }

            $response = false;
        }

        return $this->response->withStringBody($response);
    }
}
