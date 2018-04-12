<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Utility\Hash;
/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 *
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cdus', 'Formats', 'Collections', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'LendingStates']
        ];
        $documents = $this->paginate($this->Documents);

        $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
        $document = $this->Documents->get($id, [
            'contain' => ['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates']
        ]);

        $this->set(compact('document', 'currurl'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Added by IV[14-03-2018]
        $this->loadModel('Authorities');
        $this->loadModel('AuthoritiesDocuments');
        $formattedAuthorities = [];

        $document = $this->Documents->newEntity();
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                // Save authorities documents
                $document_id = $document->id;
                $this->saveAuthoritiesDocuments($document_id, $this->request->getData('authority_ids'));

                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }

        // Added by IV[15-03-2018]
        $documents = $this->Documents->find();
        $groupedCduIds = $documents->select([
            'count' => $documents->func()->count('id'),
            'id' => $documents->func()->max('cdu_id')
        ])
        ->group('cdu_id')
        ->where(['cdu_id != ""'])
        ->toArray();

        $formattedCduIds = Hash::combine($groupedCduIds, '{n}.id', '{n}.count');
        $cdus = $this->Documents->Cdus->find()->toArray();
        if (!empty($cdus)) {
            foreach ($cdus as $key => $cdu) {
                $formattedCdus[$cdu['id']] = $cdu['name'];

                if (!empty($cdu['description'])) {
                    $formattedCdus[$cdu['id']] .= " {$cdu['description']}";

                    if (isset($formattedCduIds[$cdu['id']])) {
                        $formattedCdus[$cdu['id']] .= " ({$formattedCduIds[$cdu['id']]})";
                    } else {
                        $formattedCdus[$cdu['id']] .= " (0)";
                    }
                }
            }
        }
        // Added by IV -- end
        
        $formats = $this->Documents->Formats->find('list');
        $collections = $this->getCollectionListCount();
        $publicationPlaces = $this->Documents->PublicationPlaces->find('list');
        $locations = $this->getLocationsListCount();
        $catalogueStates = $this->Documents->CatalogueStates->find('list');
        $conservationStates = $this->Documents->ConservationStates->find('list');

        // Added by IV[14-03-2018]
        $authorities = $this->Authorities->find()
            ->contain([
                'Authors' => function ($q) {
                    return $q->select(['id', 'name']);
                },
                'AuthorTypes' => function ($q) {
                    return $q->select(['id', 'name']);
                }
            ])
            ->toArray();

        $authoritiesDocuments = $this->AuthoritiesDocuments->find();
        $groupedauthoritiesDocumentsIds = $authoritiesDocuments->select([
            'count' => $authoritiesDocuments->func()->count('id'),
            'id' => $authoritiesDocuments->func()->max('authority_id')
        ])
        ->group('authority_id')
        ->where(['authority_id != ""'])
        ->toArray();

        $formattedauthoritiesDocumentsIds = Hash::combine($groupedauthoritiesDocumentsIds, '{n}.id', '{n}.count');

        if (!empty($authorities)) {
            foreach ($authorities as $key => $authority) {
                $formattedAuthorities[$authority['id']] = $authority['author']['name'];

                if (!empty($authority['author_type']['name'])) {
                    $formattedAuthorities[$authority['id']] .= " {$authority['author_type']['name']}";
                }

                if (isset($formattedauthoritiesDocumentsIds[$authority['id']])) {
                    $formattedAuthorities[$authority['id']] .= " ({$formattedauthoritiesDocumentsIds[$authority['id']]})";
                } else {
                    $formattedAuthorities[$authority['id']] .= " (0)";
                }
            }
        }
        // Added by IV -- end

        $languages = $this->getDocLanguagesListCount();
        $levels = $this->Documents->Levels->find('list');
        $publishers = $this->getDocPublishersListCount();
        $subjects = $this->Documents->Subjects->find('list');
        $lendingStates = $this->Documents->LendingStates->find('list');
        $this->set(compact('document', 'cdus', 'formats', 'collections', 'publicationPlaces', 'locations', 'catalogueStates', 'conservationStates', 'formattedCdus', 'formattedAuthorities', 'authorities', 'languages', 'levels', 'publishers', 'subjects', 'lendingStates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		// Added by IV[14-03-2018]
        $this->loadModel('Authorities');
        $this->loadModel('AuthoritiesDocuments');
        $formattedAuthorities = [];

        $document = $this->Documents->get($id, [
            'contain' => ['Authorities', 'Languages', 'Levels', 'Publishers', 'Subjects']
        ]);
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                // Save authorities documents
                $document_id = $document->id;
                $this->saveAuthoritiesDocuments($document_id, $this->request->getData('authority_ids'));

                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }

        // Added by IV[15-03-2018]
        $documents = $this->Documents->find();
        $groupedCduIds = $documents->select([
            'count' => $documents->func()->count('id'),
            'id' => $documents->func()->max('cdu_id')
        ])
        ->group('cdu_id')
        ->where(['cdu_id != ""'])
        ->toArray();

        $formattedCduIds = Hash::combine($groupedCduIds, '{n}.id', '{n}.count');
        $cdus = $this->Documents->Cdus->find()->toArray();
        if (!empty($cdus)) {
            foreach ($cdus as $key => $cdu) {
                $formattedCdus[$cdu['id']] = $cdu['name'];

                if (!empty($cdu['description'])) {
                    $formattedCdus[$cdu['id']] .= " {$cdu['description']}";

                    if (isset($formattedCduIds[$cdu['id']])) {
                        $formattedCdus[$cdu['id']] .= " ({$formattedCduIds[$cdu['id']]})";
                    } else {
                        $formattedCdus[$cdu['id']] .= " (0)";
                    }
                }
            }
        }
        // Added by IV -- end
        
        $formats = $this->Documents->Formats->find('list');
        $collections = $this->getCollectionListCount();
        $publicationPlaces = $this->Documents->PublicationPlaces->find('list');
        $locations = $this->getLocationsListCount();
        $catalogueStates = $this->Documents->CatalogueStates->find('list');
        $conservationStates = $this->Documents->ConservationStates->find('list');

        // Added by IV[14-03-2018]
        $authorities = $this->Authorities->find()
            ->contain([
                'Authors' => function ($q) {
                    return $q->select(['id', 'name']);
                },
                'AuthorTypes' => function ($q) {
                    return $q->select(['id', 'name']);
                }
            ])
            ->toArray();

        $authoritiesDocuments = $this->AuthoritiesDocuments->find();
        $groupedauthoritiesDocumentsIds = $authoritiesDocuments->select([
            'count' => $authoritiesDocuments->func()->count('id'),
            'id' => $authoritiesDocuments->func()->max('authority_id')
        ])
        ->group('authority_id')
        ->where(['authority_id != ""'])
        ->toArray();

        $formattedauthoritiesDocumentsIds = Hash::combine($groupedauthoritiesDocumentsIds, '{n}.id', '{n}.count');

        if (!empty($authorities)) {
            foreach ($authorities as $key => $authority) {
                $formattedAuthorities[$authority['id']] = $authority['author']['name'];

                if (!empty($authority['author_type']['name'])) {
                    $formattedAuthorities[$authority['id']] .= " {$authority['author_type']['name']}";
                }

                if (isset($formattedauthoritiesDocumentsIds[$authority['id']])) {
                    $formattedAuthorities[$authority['id']] .= " ({$formattedauthoritiesDocumentsIds[$authority['id']]})";
                } else {
                    $formattedAuthorities[$authority['id']] .= " (0)";
                }
            }
        }
        // Added by IV -- end

        $languages = $this->getDocLanguagesListCount();
        $levels = $this->Documents->Levels->find('list');
        $publishers = $this->getDocPublishersListCount();
        $subjects = $this->Documents->Subjects->find('list');
        $lendingStates = $this->Documents->LendingStates->find('list');
        $this->set(compact('document', 'cdus', 'formats', 'collections', 'publicationPlaces', 'locations', 'catalogueStates', 'conservationStates', 'formattedCdus', 'formattedAuthorities', 'authorities', 'languages', 'levels', 'publishers', 'subjects', 'lendingStates'));
		 }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->request->allowMethod(['post', 'delete']);
		$document = $this->Documents->get($id);
		$delefolder = $document->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
		$document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function saveAuthoritiesDocuments($document_id, $authority_ids)
    {
        $this->loadModel('AuthoritiesDocuments');
        $this->loadModel('Authorities');
        $this->loadModel('Authors');
        $this->loadModel('AuthorTypes');

        foreach ($authority_ids as $key => $authority_id) {
            $saveData = [];

            $authorityId = $this->Authorities->find()
                ->where([
                    'id' => $authority_id,
                ])
                ->first();

            if ($authorityId == null) {
                $split = explode('[', $authority_id);

                if (count($split) > 0 && isset($split[0]) && !empty($split[0])) {
                    $author = $this->Authors->find()
                        ->where([
                            'name' => trim($split[0]),
                        ])
                        ->first();

                    if (!$author) {
                        return false;                            
                    }

                    $authorId = $author->id;

                    if (isset($split[1]) && !empty($split[1])) {
                        $split[1] = '[' . $split[1];

                        $authorType = $this->AuthorTypes->find()
                            ->where([
                                'name' => $split[1],
                            ])
                            ->first();

                        if (!$authorType) {
                            return false;
                        }

                        $authorTypeId = $authorType->id;
                    } else {
                        $authorTypeId = 1;
                    }

                    $authorities = $this->Authorities->find()
                        ->where([
                            'author_id' => $authorId,
                            'author_type_id' => $authorTypeId,
                        ])
                        ->first();
                    
                    if (!$authorities) {
                        return false;
                    }

                    $authority_id = $authorities->id;
                }
            }

            $authorityDocument = $this->AuthoritiesDocuments->find()
                ->where([
                    'document_id' => $document_id,
                    'authority_id' => $authority_id,
                ])
                ->first();

            if (!$authorityDocument) {
                $saveData = [
                    'document_id' => $document_id,
                    'authority_id' => $authority_id
                ];

                $AuthoritiesDocuments = $this->AuthoritiesDocuments->newEntity();
                $AuthoritiesDocuments = $this->AuthoritiesDocuments->patchEntity($AuthoritiesDocuments, $saveData);
                $result = $this->AuthoritiesDocuments->save($AuthoritiesDocuments, ['validate' => false]);
            }
        }
    }

    public function checkAuthorTypesExists()
    {
        $response = [
            'status' => 'error',
            'message' => 'Method not allowed'
        ];

        if ($this->request->is('ajax')) {
            $this->loadModel('Authors');
            $this->loadModel('AuthorTypes');
            $this->loadModel('Authorities');

            $requestData = $this->request->getData('data');
            $split = explode('[', $requestData['text']);

            if (count($split) > 0) {
                $response['status'] = 'success';
                $response['message'] = 'success';

                // Sanitize string
                $authorName = trim($split['0']);

                // Check if author is exists
                $author = $this->Authors->find()
                    ->where(['name LIKE' => $authorName])
                    ->first();

                if (is_null($author)) {
                    $response['author'] = [
                        'name' => $authorName,
                        'not_exist' => true
                    ];
                } else {
                    $response['author'] = [
                        'name' => $authorName,
                        'id' => $author->id
                    ];
                }

                // Check if author_type is exists
                if (count($split) != 1) {
                    $authorTypeName = trim($split['1']);
                    $authorTypeName = '[' . $authorTypeName;

                    $authorType = $this->AuthorTypes->find()
                        ->where(['name LIKE' => $authorTypeName])
                        ->first();

                    if (is_null($authorType)) {
                        $response['author_type'] = [
                            'name' => $authorTypeName,
                            'not_exist' => true
                        ];
                    } else {
                        $response['author_type'] = [
                            'name' => $authorTypeName,
                            'id' => $authorType->id
                        ];
                    }
                } else {
                    $response['author_type'] = [
                        'id' => '1'
                    ];
                }

                // Check for authorities
                if (!isset($response['author']['not_exist']) && !isset($response['author_type']['not_exist'])) {
                    $authority = $this->Authorities->find()
                        ->where([
                            'author_id' => $response['author']['id'],
                            'author_type_id' => $response['author_type']['id'],
                        ])
                        ->first();

                    if (is_null($authority)) {
                        $response['authorities'] = [
                            'found' => false
                        ];
                    } else {
                        $response['authorities'] = [
                            'found' => true
                        ];
                    }
                }
            } else {
                $response['message'] = 'Text is not inserted in proper format';
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($response));
        }

        return $this->response->withType('application/json')
                ->withStringBody(json_encode($response));
    }

    protected function getCollectionListCount()
    {
        $this->loadModel('Collections');

        $query = $this->Collections->find();
        $result = $query->select([
                'Collections.id',
                'Collections.name',
                'total_docs' => $query->func()->count('Documents.id')
            ])
            ->leftJoinWith('Documents')
            ->group(['Collections.id'])
            ->toArray();

        if (!empty($result)) {
            $result = Hash::combine($result, '{n}.id', ['%s (%s)', '{n}.name', '{n}.total_docs']);
        }
        
        return $result;
    }

    protected function getLocationsListCount()
    {
        $this->loadModel('Locations');

        $query = $this->Locations->find();
        $result = $query->select([
                'Locations.id',
                'Locations.name',
                'total_docs' => $query->func()->count('Documents.id')
            ])
            ->leftJoinWith('Documents')
            ->group(['Locations.id'])
            ->toArray();

        if (!empty($result)) {
            $result = Hash::combine($result, '{n}.id', ['%s (%s)', '{n}.name', '{n}.total_docs']);
        }

        return $result;
    }

    protected function getDocLanguagesListCount()
    {
        $this->loadModel('Languages');

        $query = $this->Languages->find();

        $result = $query->select([
                'Languages.id',
                'Languages.name',
                'total_docs' => $query->func()->count('dl.id')
            ])
            ->hydrate(false)
            ->join([
                'table' => 'documents_languages',
                'alias' => 'dl',
                'type' => 'LEFT',
                'conditions' => 'dl.language_id = Languages.id',
            ])
            ->group(['Languages.id'])
            ->toArray();

        if (!empty($result)) {
            $result = Hash::combine($result, '{n}.id', ['%s (%s)', '{n}.name', '{n}.total_docs']);
        }

        return $result;
    }

    protected function getDocPublishersListCount()
    {
        $this->loadModel('Publishers');

        $query = $this->Publishers->find();

        $result = $query->select([
                'Publishers.id',
                'Publishers.name',
                'total_docs' => $query->func()->count('dp.id')
            ])
            ->hydrate(false)
            ->join([
                'table' => 'documents_publishers',
                'alias' => 'dp',
                'type' => 'LEFT',
                'conditions' => 'dp.publisher_id = Publishers.id',
            ])
            ->group(['Publishers.id'])
            ->toArray();

        if (!empty($result)) {
            $result = Hash::combine($result, '{n}.id', ['%s (%s)', '{n}.name', '{n}.total_docs']);
        }

        return $result;
    }
}
