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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Users', 'SetLendingUsers', 'SetReturnUsers', 'LendingStates']
        ];
        $lendings = $this->paginate($this->Lendings);

        $this->set(compact('lendings'));
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
							return $this->redirect('../../../../'.$ref);
				}
			}
            $this->Flash->error(__('The lending could not be saved. Please, try again.'));
        }
        $users = $this->Lendings->Users->find('list', ['limit' => 200]);
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
        $documents = $this->Lendings->Documents->find('list', ['limit' => 200]);
        $users = $this->Lendings->Users->find('list', ['limit' => 200]);
        $setLendingUsers = $this->Lendings->SetLendingUsers->find('list', ['limit' => 200]);
        $setReturnUsers = $this->Lendings->SetReturnUsers->find('list', ['limit' => 200]);
        $lendingStates = $this->Lendings->LendingStates->find('list', ['limit' => 200]);
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
        $this->request->allowMethod(['post', 'delete']);
        $lending = $this->Lendings->get($id);
        if ($this->Lendings->delete($lending)) {
            $this->Flash->success(__('The lending has been deleted.'));
        } else {
            $this->Flash->error(__('The lending could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
