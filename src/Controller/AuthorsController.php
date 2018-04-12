<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\I18n\Time;
use Cake\View\Helper\UrlHelper;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 *
 * @method \App\Model\Entity\Author[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorsController extends AppController
{
public function pdfcompactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
        $author = $this->Authors->get($id, [
            'contain' => ['Authorities' => ['Documents', 'AuthorTypes']]]);
            
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $author->name . ' - llista compacta.pdf'
            ]
        ]);
        $pdocuments = $this->Authors->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($author) {
				return $query->where([
					'Authorities.author_id' => $author->id
				]);
			})->order(['Documents.name' => 'ASC']);
        $this->set(compact('author', 'pdocuments', 'currurl'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
		public $paginate = [
			'limit' => 100,
			'contain' => ['Authorities' => ['Documents']]
			];
			
    public function index()
    {
		
		
	
	$authors = $this->paginate($this->Authors);

    $this->set(compact('authors'));
}

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function compactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$author = $this->Authors->get($id, [
            'contain' => ['Authorities' => ['Documents', 'AuthorTypes']]
        ]);
        
        $documentsQuery = $this->Authors->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'CatalogueStates', 'LendingStates'])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($author) {
				return $query->where([
					'Authorities.author_id' => $author->id
				]);
			});

		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('author', 'currurl', 'pdocuments'));
    }
    
    public function view($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$author = $this->Authors->get($id, [
            'contain' => ['Authorities' => ['Documents', 'AuthorTypes']]
        ]);
        
        $documentsQuery = $this->Authors->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($author) {
				return $query->where([
					'Authorities.author_id' => $author->id
				]);
			});

		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('author', 'currurl', 'pdocuments'));
}
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $author = $this->Authors->newEntity();
        if ($this->request->is('post')) {
            $author = $this->Authors->patchEntity($author, $this->request->getData());
            if ($this->Authors->save($author)) {
                // Check for ajax
                if ($this->request->is('ajax')) {
                    return $this->response->withType('application/json')
                        ->withStringBody(json_encode([
                            'status' => 'success',
                            'message' => 'The author has been saved.',
                            'data' => json_decode(json_encode($author), true)
                        ]));
                }
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Check for ajax
            if ($this->request->is('ajax')) {
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => 'The author could not be saved. Please, try again.'
                    ]));
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $this->set(compact('author'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $author = $this->Authors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $author = $this->Authors->patchEntity($author, $this->request->getData());
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $this->set(compact('author'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('group_id') == 12){
		$this->request->allowMethod(['post', 'delete']);
		$author = $this->Authors->get($id);
		if(!empty($author->photo_dir)){
		$delefolder = $author->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
		}
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('The author has been deleted.'));
        } else {
            $this->Flash->error(__('The author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    else{
		$this->Flash->error(__('No tens permisos per esborrar.'));
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		}
	}
}
