<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Authorities Controller
 *
 * @property \App\Model\Table\AuthoritiesTable $Authorities
 *
 * @method \App\Model\Entity\Authority[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthoritiesController extends AppController
{
	public function pdfindex()
    {
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Llista d\'autories.pdf'
            ]
        ]);
        $pauthorities = $this->Authorities->find('all', [
        'recursive'=>-1,
        'fields' => [
           'Authorities.id',
           'Authorities.author_id',
           'Authorities.author_type_id',
           'Authorities.created',
           'Authorities.modified',
		   'author_id' => 'Authors.id',
		   'author_type_id' => 'AuthorTypes.id',
           'author_name' => 'Authors.name',
           'author_type_name' => 'AuthorTypes.name',
           //'Authorities__count_documents' => 'count(AuthoritiesDocuments.authority_id)',
           'count_documents' => 'count(AuthoritiesDocuments.authority_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Authors.name' => 'ASC'],
        'contain' => ['Authors', 'AuthorTypes', 'Documents'], 
        'sortWhitelist' => ['id', 'author_id', 'author_type_name', 'author_id', 'author_type_id', 'author_name', 'count_documents','created','modified'],
        'join' => [
            'AuthoritiesDocuments' => [
                'table' => 'authorities_documents',
                'type' => 'LEFT',
                'conditions' => [
                    'AuthoritiesDocuments.authority_id = Authorities.id'
                ],
            ],
        ],
        'group' => 'Authorities.id'
    ]);
			
        $this->set(compact('pauthorities'));
    }
    
	 public function pdfcompactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
        $authority = $this->Authorities->get($id, [
            'contain' => ['Authors', 'AuthorTypes', 'Documents']]);
            
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $authority->name . ' - llista compacta.pdf'
            ]
        ]);
        $pdocuments = $this->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($authority) {
				return $query->where([
					'Authorities.id' => $authority->id
				]);
			})->order(['Documents.name' => 'ASC']);
			
        $this->set(compact('authority', 'pdocuments', 'currurl'));
    }
     
	
	public $paginate = [
		'limit' => 100,
		];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		

    $where = [
        'recursive'=>-1,
        'fields' => [
           'Authorities.id',
           'Authorities.author_id',
           'Authorities.author_type_id',
           'Authorities.created',
           'Authorities.modified',
		   'author_id' => 'Authors.id',
		   'author_type_id' => 'AuthorTypes.id',
           'author_name' => 'Authors.name',
           'author_type_name' => 'AuthorTypes.name',
           //'Authorities__count_documents' => 'count(AuthoritiesDocuments.authority_id)',
           'count_documents' => 'count(AuthoritiesDocuments.authority_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Authors.name' => 'ASC'],
        'contain' => ['Authors', 'AuthorTypes', 'Documents'], 
        'sortWhitelist' => ['id', 'author_id', 'author_type_name', 'author_id', 'author_type_id', 'author_name', 'count_documents','created','modified'],
        'join' => [
            'AuthoritiesDocuments' => [
                'table' => 'authorities_documents',
                'type' => 'LEFT',
                'conditions' => [
                    'AuthoritiesDocuments.authority_id = Authorities.id'
                ],
            ],
        ],
        'group' => 'Authorities.id'
    ];

     // Set pagination
    $this->paginate = $where;

    // Get data
    $authorities = $this->paginate($this->Authorities, ['limit' => 100]);
		
        $this->set(compact('authorities'));
    }

    /**
     * View method
     *
     * @param string|null $id Authority id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       public function compactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$authority = $this->Authorities->get($id, [
            'contain' => ['Authors', 'AuthorTypes', 'Documents']
        ]);
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $authority->author->name . $authority->author_type->name . ' - llista compacta.pdf'
            ]
        ]);
        $documentsQuery = $this->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($authority) {
				return $query->where([
					'Authorities.id' => $authority->id
				]);
			});
		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];
		

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('authority', 'currurl', 'pdocuments'));
    }
    
    
    
    public function view($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$authority = $this->Authorities->get($id, [
            'contain' => ['Authors', 'AuthorTypes', 'Documents']
        ]);
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $authority->author->name . $authority->author_type->name .' - llista detallada.pdf'
            ]
        ]);
        
        $documentsQuery = $this->Authorities->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Authorities', function (\Cake\ORM\Query $query) use ($authority) {
				return $query->where([
					'Authorities.id' => $authority->id
				]);
			});		

		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('authority', 'currurl', 'pdocuments'));
	}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authority = $this->Authorities->newEntity();
        if ($this->request->is('post')) {
            if ($this->request->is('ajax')) {
                $isAuthoritiesSaved = $this->upsertAuthorities($this->request->getData());

                if ($isAuthoritiesSaved) {
                    return $this->response->withType('application/json')
                        ->withStringBody(json_encode([
                            'status' => 'success',
                            'message' => 'L\'autoria s\'ha desat.',
                            'data' => json_decode(json_encode($isAuthoritiesSaved), true)
                        ]));
                }

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => 'L\'autoria no s\'ha pogut desar. Si us plau, torneu-ho a intentar.'
                    ]));
            }

            $authority = $this->Authorities->patchEntity($authority, $this->request->getData());
            if ($this->Authorities->save($authority)) {
                $this->Flash->success(__('The authority has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authority could not be saved. Please, try again.'));
        }
        $authors = $this->Authorities->Authors->find('list')->order(['name' => 'ASC']);
        $authorTypes = $this->Authorities->AuthorTypes->find('list');
        $documents = $this->Authorities->Documents->find('list')->order(['name' => 'ASC']);
        $this->set(compact('authority', 'authors', 'authorTypes', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Authority id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authority = $this->Authorities->get($id, [
            'contain' => ['Documents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authority = $this->Authorities->patchEntity($authority, $this->request->getData());
            if ($this->Authorities->save($authority)) {
                $this->Flash->success(__('The authority has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authority could not be saved. Please, try again.'));
        }
        $authors = $this->Authorities->Authors->find('list', ['limit' => 200]);
        $authorTypes = $this->Authorities->AuthorTypes->find('list')->order(['name' => 'ASC']);
        $documents = $this->Authorities->Documents->find('list')->order(['name' => 'ASC']);
        $this->set(compact('authority', 'authors', 'authorTypes', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Authority id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authority = $this->Authorities->get($id);
        if ($this->Authorities->delete($authority)) {
            $this->Flash->success(__('The authority has been deleted.'));
        } else {
            $this->Flash->error(__('The authority could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
     public function upsertAuthorities($requestData)
    {
        $authority = $this->Authorities->find()
            ->where([
                'author_id' => $requestData['author_id'],
                'author_type_id' => $requestData['author_type_id'],
            ])
            ->first();

        if (is_null($authority)) {
            $authority = $this->Authorities->newEntity();
            $authority = $this->Authorities->patchEntity($authority, $requestData);
            if ($this->Authorities->save($authority)) {
                return $authority;
            }

            return false;
        }

        return $authority;
    }
}

