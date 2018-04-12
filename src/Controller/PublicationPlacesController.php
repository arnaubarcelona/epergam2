<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PublicationPlaces Controller
 *
 * @property \App\Model\Table\PublicationPlacesTable $PublicationPlaces
 *
 * @method \App\Model\Entity\PublicationPlace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublicationPlacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries']
        ];
        $publicationPlaces = $this->paginate($this->PublicationPlaces);

        $this->set(compact('publicationPlaces'));
    }

    /**
     * View method
     *
     * @param string|null $id Publication Place id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicationPlace = $this->PublicationPlaces->get($id, [
            'contain' => ['Countries', 'Documents']
        ]);

        $this->set('publicationPlace', $publicationPlace);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicationPlace = $this->PublicationPlaces->newEntity();
        if ($this->request->is('post')) {
            $publicationPlace = $this->PublicationPlaces->patchEntity($publicationPlace, $this->request->getData());
            if ($this->PublicationPlaces->save($publicationPlace)) {
                $this->Flash->success(__('The publication place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publication place could not be saved. Please, try again.'));
        }
        $countries = $this->PublicationPlaces->Countries->find('list', ['limit' => 200]);
        $this->set(compact('publicationPlace', 'countries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Publication Place id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicationPlace = $this->PublicationPlaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicationPlace = $this->PublicationPlaces->patchEntity($publicationPlace, $this->request->getData());
            if ($this->PublicationPlaces->save($publicationPlace)) {
                $this->Flash->success(__('The publication place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publication place could not be saved. Please, try again.'));
        }
        $countries = $this->PublicationPlaces->Countries->find('list', ['limit' => 200]);
        $this->set(compact('publicationPlace', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Publication Place id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicationPlace = $this->PublicationPlaces->get($id);
        if ($this->PublicationPlaces->delete($publicationPlace)) {
            $this->Flash->success(__('The publication place has been deleted.'));
        } else {
            $this->Flash->error(__('The publication place could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isPublicationPlaceAlreadyExists()
    {
        $response = false;

        if ($this->request->is('ajax')) {
            $name = $this->request->getData('name');

            $publicationPlace = $this->PublicationPlaces->find()
                ->where(['name' => $name])
                ->first();

            if ($publicationPlace) {
                return $this->response->withStringBody(true);
            }

            $response = false;
        }

        return $this->response->withStringBody($response);
    }
}
