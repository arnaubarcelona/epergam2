<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\I18n\Time;
use Cake\View\Helper\UrlHelper;


/**
 * Languages Controller
 *
 * @property \App\Model\Table\LanguagesTable $Languages
 *
 * @method \App\Model\Entity\Language[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
{
	public $paginate = [
	'limit' => 100,
	];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
    public function pdfindex()
    {
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Llista de llengües.pdf'
            ]
        ]);
        $planguages = $this->Languages->find('all', [
        'recursive'=>-1,
        'fields' => [
           'Languages.id',
           'Languages.name',
           'Languages.photo',
           'Languages.photo_dir',
           'Languages.created',
           'Languages.modified',
           //'Languages__count_documents' => 'count(LanguagesDocuments.authority_id)',
           'count_documents' => 'count(DocumentsLanguages.language_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Languages.name' => 'ASC'],
        'contain' => ['Documents'],
        'sortWhitelist' => ['id', 'name', 'count_documents','created','modified'],
        'join' => [
            'DocumentsLanguages' => [
                'table' => 'documents_languages',
                'type' => 'LEFT',
                'conditions' => [
                    'DocumentsLanguages.language_id = Languages.id'
                ],
            ],
        ],
        'group' => 'Languages.id'
    ]);
        $this->set(compact('planguages'));
    }
    
    public function index()
    {
        $where = [
        'recursive'=>-1,
        'fields' => [
           'Languages.id',
           'Languages.name',
           'Languages.photo',
           'Languages.photo_dir',
           'Languages.created',
           'Languages.modified',
           //'Languages__count_documents' => 'count(LanguagesDocuments.authority_id)',
           'count_documents' => 'count(DocumentsLanguages.language_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Languages.name' => 'ASC'],
        'contain' => ['Documents'],
        'sortWhitelist' => ['id', 'name', 'count_documents','created','modified'],
        'join' => [
            'DocumentsLanguages' => [
                'table' => 'documents_languages',
                'type' => 'LEFT',
                'conditions' => [
                    'DocumentsLanguages.language_id = Languages.id'
                ],
            ],
        ],
        'group' => 'Languages.id'
    ];
    
    
     // Set pagination
    $this->paginate = $where;

    // Get data
    $languages = $this->paginate($this->Languages, ['limit' => 100]);

        $this->set(compact('languages'));
    }

    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
         public function pdfcompactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
        $language = $this->Languages->get($id, [
            'contain' => ['Documents']]);
            
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $language->name . ' - llista compacta.pdf'
            ]
        ]);
        $pdocuments = $this->Languages->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Languages', function (\Cake\ORM\Query $query) use ($language) {
				return $query->where([
					'Languages.id' => $language->id
				]);
			})->order(['Documents.name' => 'ASC']);
        $this->set(compact('language', 'pdocuments', 'currurl'));
    }
     
     
    public function compactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$language = $this->Languages->get($id, [
            'contain' => ['Documents']
        ]);
        
        $documentsQuery = $this->Languages->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Languages', function (\Cake\ORM\Query $query) use ($language) {
				return $query->where([
					'Languages.id' => $language->id
				]);
			});
		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];
		

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('language', 'currurl', 'pdocuments'));
    }
    
    
    public function view($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$language = $this->Languages->get($id, [
            'contain' => ['Documents']
        ]);
        
        $documentsQuery = $this->Languages->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Languages', function (\Cake\ORM\Query $query) use ($language) {
				return $query->where([
					'Languages.id' => $language->id
				]);
			});

		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('language', 'currurl', 'pdocuments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $language = $this->Languages->newEntity();
        if ($this->request->is('post')) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $documents = $this->Languages->Documents->find('list', ['limit' => 200]);
        $this->set(compact('language', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => ['Documents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $documents = $this->Languages->Documents->find('list', ['limit' => 200]);
        $this->set(compact('language', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		if($this->Auth->user('group_id') == 12){
		$this->request->allowMethod(['post', 'delete']);
		$language = $this->Languages->get($id);
		$delefolder = $language->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
        if ($this->Languages->delete($language)) {
            $this->Flash->success(__('The language has been deleted.'));
        } else {
            $this->Flash->error(__('The language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    else{
		$this->Flash->error(__('No tens permisos per esborrar.'));
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		}
	}
}
