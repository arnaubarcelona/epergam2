<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 *
 * @method \App\Model\Entity\Subject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubjectsController extends AppController
{

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
                'filename' => 'Llista de matèries.pdf'
            ]
        ]);
        $psubjects = $this->Subjects->find('all', [
        'recursive'=>-1,
        'fields' => [
           'Subjects.id',
           'Subjects.name',
           'Subjects.photo',
           'Subjects.photo_dir',
           'Subjects.created',
           'Subjects.modified',
           //'Subjects__count_documents' => 'count(SubjectsDocuments.authority_id)',
           'count_documents' => 'count(DocumentsSubjects.subject_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Subjects.name' => 'ASC'],
        'contain' => ['Documents'],
        'sortWhitelist' => ['id', 'name', 'count_documents','created','modified'],
        'join' => [
            'DocumentsSubjects' => [
                'table' => 'documents_subjects',
                'type' => 'LEFT',
                'conditions' => [
                    'DocumentsSubjects.subject_id = Subjects.id'
                ],
            ],
        ],
        'group' => 'Subjects.id'
    ]);
        $this->set(compact('psubjects'));
    }
    
    public function index()
    {
        $where = [
        'recursive'=>-1,
        'fields' => [
           'Subjects.id',
           'Subjects.name',
           'Subjects.photo',
           'Subjects.photo_dir',
           'Subjects.created',
           'Subjects.modified',
           //'Subjects__count_documents' => 'count(SubjectsDocuments.authority_id)',
           'count_documents' => 'count(DocumentsSubjects.subject_id)'
           // 'Licensees.count_users' => 'count(LicenseesUsers.licensees_id)', 
         ],
        'order' => ['Subjects.name' => 'ASC'],
        'contain' => ['Documents'],
        'sortWhitelist' => ['id', 'name', 'count_documents','created','modified'],
        'join' => [
            'DocumentsSubjects' => [
                'table' => 'documents_subjects',
                'type' => 'LEFT',
                'conditions' => [
                    'DocumentsSubjects.subject_id = Subjects.id'
                ],
            ],
        ],
        'group' => 'Subjects.id'
    ];
    
    
     // Set pagination
    $this->paginate = $where;

    // Get data
    $subjects = $this->paginate($this->Subjects, ['limit' => 100]);

        $this->set(compact('subjects'));
    }
    
            public function pdfcompactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
        $subject = $this->Subjects->get($id, [
            'contain' => ['Documents']]);
            
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Documents en ' . $subject->name . ' - llista compacta.pdf'
            ]
        ]);
        $pdocuments = $this->Subjects->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Subjects', function (\Cake\ORM\Query $query) use ($subject) {
				return $query->where([
					'Subjects.id' => $subject->id
				]);
			})->order(['Documents.name' => 'ASC']);
        $this->set(compact('subject', 'pdocuments', 'currurl'));
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     
    public function compactview($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$subject = $this->Subjects->get($id, [
            'contain' => ['Documents']
        ]);
        
        $documentsQuery = $this->Subjects->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'Levels', 'LendingStates', 'CatalogueStates', 'Lendings' => ['LendingStates', 'Users' => ['Groups']]])
			->matching('Subjects', function (\Cake\ORM\Query $query) use ($subject) {
				return $query->where([
					'Subjects.id' => $subject->id
				]);
			});
		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];
		

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('subject', 'currurl', 'pdocuments'));
    }
    
    public function view($id = null)
    {
        $prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$subject = $this->Subjects->get($id, [
            'contain' => ['Documents']
        ]);
        
        $documentsQuery = $this->Subjects->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Subjects', function (\Cake\ORM\Query $query) use ($subject) {
				return $query->where([
					'Subjects.id' => $subject->id
				]);
			});

		$paginationOptions = [
			'limit' => 100,
			'order' => [
				'Documents.name' => 'ASC'
			]
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('subject', 'currurl', 'pdocuments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                // Check for ajax
                if ($this->request->is('ajax')) {
                    return $this->response->withType('application/json')
                        ->withStringBody(json_encode([
                            'status' => 'success',
                            'message' => __('The subject has been saved.'),
                            'data' => json_decode(json_encode($subject), true)
                        ]));
                }
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Check for ajax
            if ($this->request->is('ajax')) {
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => __('The subject could not be saved. Please, try again.')
                    ]));
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }
        $documents = $this->Subjects->Documents->find('list');
        $this->set(compact('subject', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Documents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }
        $this->set(compact('subject'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isSubjectAlreadyExists()
    {
        $response = false;

        if ($this->request->is('ajax')) {
            $name = $this->request->getData('name');

            $subject = $this->Subjects->find()
                ->where(['name' => $name])
                ->first();

            if ($subject) {
                return $this->response->withStringBody(true);
            }

            $response = false;
        }

        return $this->response->withStringBody($response);
    }
}
