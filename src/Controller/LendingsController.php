<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Lendings Controller
 *
 * @property \App\Model\Table\LendingsTable $Lendings
 *
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LendingsController extends AppController
{
	public $paginate = [
	'limit' => 100,
	];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
      public function pdfoindex($groupid)
    {
		$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Llista de préstecs - ' . $groupid . '.pdf'
            ]
        ]);
		
		$plendings = $this->Lendings->find('all', [
        'recursive'=>-1,
        'fields' => [
           'Lendings.id',
           'Lendings.date_taken',
           'Lendings.date_return',
           'Lendings.date_real_return',
           'lending_state_name' => 'LendingStates.name',
           'Lendings.lending_state_id',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
           'set_lending_user_name' => 'SetLendingUsers.name',
           'set_return_user_name' => 'SetReturnUsers.name',
           'user_name' => 'Users.name',
           'user_id' => 'Users.id',
           'group_name' => 'Groups.name',
           'group_id' => 'Groups.id',
           'phone1' => 'Users.phone1',
           'phone2' => 'Users.phone2',
           'Lendings.created',
           'Lendings.modified'
         ],
         'conditions' => ['Lendings.lending_state_id !=' => 5, 'Groups.id' => $groupid],
        'order' => ['Lendings.created' => 'DESC'],
        'contain' => ['Users' => ['Groups'], 'Documents', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates'],
        'sortWhitelist' => ['id', 'name', 'group_name', 'date_taken', 'date_return', 'lending_state_id', 'document_id', 'document_name', 'set_lending_user_name', 'set_return_user_name', 'user_name', 'created','modified']
    ]);

        $this->set(compact('plendings'));
		
    }
     
    public function index($grupid = null)
    {
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
	
    
    if(!empty($grupid)){
    $where = [
        'recursive'=>-1,
        'fields' => [
           'Lendings.id',
           'Lendings.date_taken',
           'Lendings.date_return',
           'Lendings.date_real_return',
           'lending_state_name' => 'LendingStates.name',
           'Lendings.lending_state_id',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
           'set_lending_user_name' => 'SetLendingUsers.name',
           'set_return_user_name' => 'SetReturnUsers.name',
           'user_name' => 'Users.name',
           'user_id' => 'Users.id',
           'group_name' => 'Groups.name',
           'group_id' => 'Groups.id',
           'lastmail' => 'Users.lastmail',
           'Lendings.created',
           'Lendings.modified'
         ],
        'conditions' => ['Lendings.lending_state_id !=' => 5, 'AND' => ['Groups.id' => $grupid]],
        'contain' => ['Users' => ['Groups'], 'Documents', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates'],
        'sortWhitelist' => ['id', 'name', 'group_name', 'date_taken', 'date_return', 'lending_state_id', 'lastmail', 'document_id', 'document_name', 'set_lending_user_name', 'set_return_user_name', 'user_name', 'created','modified'],
    ];
	}
	else{
		 $where = [
        'recursive'=>-1,
        'fields' => [
           'Lendings.id',
           'Lendings.date_taken',
           'Lendings.date_return',
           'Lendings.date_real_return',
           'lending_state_name' => 'LendingStates.name',
           'Lendings.lending_state_id',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
           'set_lending_user_name' => 'SetLendingUsers.name',
           'set_return_user_name' => 'SetReturnUsers.name',
           'user_name' => 'Users.name',
           'user_id' => 'Users.id',
           'group_name' => 'Groups.name',
           'group_id' => 'Groups.id',
           'lastmail' => 'Users.lastmail',
           'Lendings.created',
           'Lendings.modified'
         ],
         'conditions' => ['Lendings.lending_state_id !=' => 5],
        'contain' => ['Users' => ['Groups'], 'Documents', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates'],
        'sortWhitelist' => ['id', 'name', 'group_name', 'date_taken', 'date_return', 'lastmail', 'lending_state_id', 'document_id', 'document_name', 'set_lending_user_name', 'set_return_user_name', 'user_name', 'created','modified'],
    ];
	}
    
     // Set pagination
    $this->paginate = $where;

    // Get data
    $lendings = $this->paginate($this->Lendings, ['limit' => 100]);
    $gr = $this->LoadModel('Groups');
    $groups = $gr->find('list');

        $this->set(compact('lendings', 'currurl', 'groups'));
		
    }
    
    public function doneindex($grupid = null)
    {
		
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		
		if(!empty($grupid)){
		 $where = [
        'recursive'=>-1,
        'fields' => [
           'Lendings.id',
           'Lendings.date_taken',
           'Lendings.date_return',
           'Lendings.date_real_return',
           'lending_state_name' => 'LendingStates.name',
           'Lendings.lending_state_id',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
           'set_lending_user_name' => 'SetLendingUsers.name',
           'set_return_user_name' => 'SetReturnUsers.name',
           'user_name' => 'Users.name',
           'user_id' => 'Users.id',
           'grup_id' => 'Groups.id',
           'Lendings.created',
           'Lendings.modified'
         ],
         'conditions' => ['Lendings.lending_state_id' => 5, 'AND' => ['Groups.id' => $grupid]],
        'order' => ['Documents.name' => 'ASC'],
        'contain' => ['Users' => ['Groups'], 'Documents', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates'],
        'sortWhitelist' => ['id', 'name', 'date_taken', 'date_return', 'lending_state_id', 'document_id', 'document_name', 'set_lending_user_name', 'set_return_user_name', 'user_name', 'created','modified'],
    ];
		}
		else{
		$where = [
        'recursive'=>-1,
        'fields' => [
           'Lendings.id',
           'Lendings.date_taken',
           'Lendings.date_return',
           'Lendings.date_real_return',
           'lending_state_name' => 'LendingStates.name',
           'Lendings.lending_state_id',
           'document_id' => 'Documents.id',
           'document_name' => 'Documents.name',
           'set_lending_user_name' => 'SetLendingUsers.name',
           'set_return_user_name' => 'SetReturnUsers.name',
           'user_name' => 'Users.name',
           'user_id' => 'Users.id',
           'grup_id' => 'Groups.id',
           'Lendings.created',
           'Lendings.modified'
         ],
         'conditions' => ['Lendings.lending_state_id' => 5],
        'order' => ['Documents.name' => 'ASC'],
        'contain' => ['Users' => ['Groups'], 'Documents', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates'],
        'sortWhitelist' => ['id', 'name', 'date_taken', 'date_return', 'lending_state_id', 'document_id', 'document_name', 'set_lending_user_name', 'set_return_user_name', 'user_name', 'created','modified'],
    ];
		}
    
    
     // Set pagination
    $this->paginate = $where;
	$gr = $this->LoadModel('Groups');
    $groups = $gr->find('list');
    // Get data
    $lendings = $this->paginate($this->Lendings, ['limit' => 100]);

        $this->set(compact('lendings', 'currurl', 'groups'));
		
    }
    /**
     * View method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	   $lending = $this->Lendings->get($id, [
            'contain' => ['Documents', 'Users', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates']
        ]);
		ini_set('memory_limit', '258M');
        $this->set(compact('lending'));
    }
	public function return($document_id, $lending_id, $referer)
	{
		
		$documents = $this->loadModel('Documents');
		$document = $documents->get($document_id);
		$lendings = $this->loadModel('Lendings');
		$lending = $lendings->get($lending_id);
		
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $lending = $this->Lendings->patchEntity($lending, $this->request->getData());
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            $document->lending_state_id = 1;
            $now = Time::now();
            $lending->date_real_return = $now;
            $lendingtaken = $lending->date_taken->day . $lending->date_taken->month . $lending->date_taken->year;
            $lendingreturn = $now->day . $now->month . $now->year;
            $lending->set_return_user_id = $this->Auth->user('id');
            if($lendingtaken == $lendingreturn )
            {				
				if ($this->Documents->save($document) && $this->Lendings->delete($lending))
					{
					$this->Flash->success(__('Aquest préstec no constarà a l\'historial de préstecs.'));
					$ref = str_replace('º','/',$referer);
					return $this->redirect('../../../../'.$ref);
					}}
			else
				{
				$lending->lending_state_id = 5;
				if ($this->Lendings->save($lending) && $this->Documents->save($document))
					{
					$this->Flash->success(__('El document s\'ha retornat.'));
					$ref = str_replace('º','/',$referer);
					return $this->redirect('../../../../'.$ref);
					}
				}
            $this->Flash->error(__('El documents no s\'ha pogut retornar. Si us plau, torneu-ho a intentar.'));
			}
			
		
		$this->set(compact('lending'));		
	}
            
		
	public function quickadd($document_id, $user_id, $referer)
	{
		$documents = $this->loadModel('Documents');
		$document = $documents->get($document_id);
		if($document->lending_state_id == 1){
		
			$lending = $this->Lendings->newEntity();
			if ($this->request->is('post')) {
				$lending = $this->Lendings->patchEntity($lending, $this->request->getData());
				$document = $this->Documents->patchEntity($document, $this->request->getData());
				$lending->document_id = $document_id;
						$lendinguser = $user_id;
						$users = $this->loadModel('Users');
						$user = $users->get($lendinguser, [
							'contain' => ['Groups', 'Lendings']
						]);
						$items = 0;
						if(!empty($user->lendings)){
						foreach($user->lendings as $userlending){
							if($userlending->lending_state_id == 2 || $userlending->lending_state_id == 2) { $items = $items + 1; }
						}
						}
						$lendinggroup = $user->group_id;
						$groups = $this->loadModel('Groups');
						$group = $groups->get($lendinggroup, [
							'contain' => ['LendingPolicies']
						]);
						$lendingpolicy_id = $group->lending_policy_id;
						$lendingpolicies = $this->loadModel('LendingPolicies');
						$lendingpolicy = $lendingpolicies->get($lendingpolicy_id);
						$maxdays = $lendingpolicy->lending_max_days;
						$maxitems = $lendingpolicy->lending_max_items;
						
						if($items == $maxitems){
							$this->Lendings->delete($lending);
							$this->Flash->error(__('Aquesta persona ja té '. $items . ' documents prestats, que és el màxim autoritzat per al seu grup.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('../../../../'.$ref);
						}
						
						$now = Time::now();
						$returndate = Time::now();
						$returndate = $returndate->addDays($maxdays);
						$lending->set_lending_user_id = $this->Auth->user('id');
						$lending->date_taken = $now;
						$lending->date_return = $returndate;
						$lending->lending_state_id = 2;
						$lending->user_id = $lendinguser;
						$document->lending_state_id = 2;
						$newreferer = $referer;
						if ($this->Lendings->save($lending) && $this->Documents->save($document)) {
							$this->Flash->success(__('S\'ha prestat el document a ' . $user->name . '. La data de retorn és: ' . $returndate->i18nFormat('d/M/YYYY') . '.'));
							$ref = str_replace('º','/',$referer);
							return $this->redirect('http://80.211.14.98/epergam2/users/view/' . $user->id);
				}
			
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        }
        elseif ($document->lending_state_id == 2){$this->Flash->error(__('Aquest document ja es troba en préstec.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('http://80.211.14.98/epergam2/documents/view/' . $document->id);}
        elseif ($document->lending_state_id == 3){$this->Flash->error(__('Aquest document ja es troba en préstec.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('http://80.211.14.98/epergam2/documents/view/' . $document->id);}
        elseif ($document->lending_state_id == 4){$this->Flash->error(__('Aquest document no es pot prestar perquè està reservat.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('../../../../'.$ref);}
        elseif ($document->lending_state_id == 6){$this->Flash->error(__('Aquest document està exclòs de préstec.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('../../../../'.$ref);}
        $this->set(compact('lending'));
	}
    
    public function add($document_id, $referer)
    {
		$documents = $this->loadModel('Documents');
		$document = $documents->get($document_id);
			$lending = $this->Lendings->newEntity();
			if ($this->request->is('post')) {
				$lending = $this->Lendings->patchEntity($lending, $this->request->getData());
				$document = $this->Documents->patchEntity($document, $this->request->getData());
				$lending->document_id = $document_id;
				if ($this->Lendings->save($lending)) {
						$lendinguser = $lending->user_id;
						$users = $this->loadModel('Users');
						$user = $users->get($lendinguser, [
							'contain' => ['Groups', 'Lendings']
						]);
						$items = 0;
						if(!empty($user->lendings)){
						foreach($user->lendings as $userlending){
							if($userlending->lending_state_id == 2 || $userlending->lending_state_id == 2) { $items = $items + 1; }
						}
						}
						$lendinggroup = $user->group_id;
						$groups = $this->loadModel('Groups');
						$group = $groups->get($lendinggroup, [
							'contain' => ['LendingPolicies']
						]);
						$lendingpolicy_id = $group->lending_policy_id;
						$lendingpolicies = $this->loadModel('LendingPolicies');
						$lendingpolicy = $lendingpolicies->get($lendingpolicy_id);
						
						$maxdays = $lendingpolicy->lending_max_days;
						$maxitems = $lendingpolicy->lending_max_items;
						
						if($items == $maxitems){
							$this->Lendings->delete($lending);
							$this->Flash->error(__('Aquesta persona ja té '. $items . ' documents prestats, que és el màxim autoritzat per al seu grup.'));
							$newreferer = $referer;
							$ref = str_replace('º','/',$referer);
							return $this->redirect('../../../../'.$ref);
						}
						
						$now = Time::now();
						$returndate = Time::now();
						$returndate = $returndate->addDays($maxdays);
						$lending->set_lending_user_id = $this->Auth->user('id');
						$lending->date_taken = $now;
						$lending->date_return = $returndate;
						$lending->lending_state_id = 2;
						$document->lending_state_id = 2;
						$newreferer = $referer;
						if ($this->Lendings->save($lending) && $this->Documents->save($document)) {
							$this->Flash->success(__('S\'ha prestat el document a ' . $user->name . '. La data de retorn és: ' . $returndate->i18nFormat('d/M/YYYY') . '.'));
							$ref = str_replace('º','/',$referer);
							return $this->redirect('http://80.211.14.98/epergam2/users/view/' . $user->id);
				}
			}
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        $users = $this->Lendings->Users->find('list');
        $this->set(compact('lending', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lending = $this->Lendings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lending = $this->Lendings->patchEntity($lending, $this->request->getData());
            if ($this->Lendings->save($lending)) {
                $this->Flash->success(__('The lending has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        $documents = $this->Lendings->Documents->find('list');
        $users = $this->Lendings->Users->find('list');
        $setLendingUsers = $this->Lendings->SetLendingUsers->find('list');
        $setReturnUsers = $this->Lendings->SetReturnUsers->find('list');
        $lendingStates = $this->Lendings->LendingStates->find('list');
        $this->set(compact('lending', 'documents', 'users', 'setLendingUsers', 'setReturnUsers', 'lendingStates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lending id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		if($this->Auth->user('group_id') == 12){
			$this->request->allowMethod(['post', 'delete']);
			$lending = $this->Lendings->get($id);
			if ($this->Lendings->delete($lending)) {
				$this->Flash->success(__('The lending has been deleted.'));
			} else {
				$this->Flash->error(__('The lending could not be deleted. Please, try again.'));
			}

			return $this->redirect(['action' => 'index']);
		}
    else {
		$this->Flash->error(__('No tens permisos per esborrar.'));
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		
		}
	}
}
