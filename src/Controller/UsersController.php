<?php
namespace App\Controller;
use Cake\Mailer\Email;
use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
    public function initialize()
	{
	parent::initialize();
	$this->Auth->allow(['logout']);
	}
	public function logout()
	{
	$this->Flash->success('Has sortit correctament.');
    return $this->redirect($this->Auth->logout());
	}
    
    public function login()
	{
	$prevcurrurl = $this->request->here(true);
	$currurl = str_replace('/', 'º', $prevcurrurl);
	if ($this->request->is('post')) {
	$user = $this->Auth->identify();
	if ($user) {
	$this->Auth->setUser($user);
	 return $this->redirect($this->request->session()->read('lastUrl'));
	}
	$this->Flash->error('El nom d\'usuari/a o contrasenya és incorrecte.');
	}
	} 
    	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'SubscriptionStates'],
            'limit' => 100
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
 
    public function view($id = null)
    {
		
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$user = $this->Users->get($id, [
            'contain' => ['Lendings' => ['Documents']]
        ]);
        
        $documentsQuery = $this->Users->Lendings->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Lendings', function (\Cake\ORM\Query $query) use ($user) {
				return $query->where([
					'Lendings.user_id' => $user->id
				]);
			})
			->order(['Lendings.lending_state_id' => 'ASC']);

		$paginationOptions = [
			'limit' => 100
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('user', 'currurl', 'pdocuments'));
        
    }
    
    public function pdfviewall($id = null)
    {
		
		$prevcurrurl = $this->request->here(true);
		$currurl = str_replace('/', 'º', $prevcurrurl);
		$user = $this->Users->get($id, [
            'contain' => ['Lendings' => ['Documents']]
        ]);
        
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Historial de préstec - ' . $user->name . '.pdf'
            ]
        ]);
        
        $documentsQuery = $this->Users->Lendings->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Lendings', function (\Cake\ORM\Query $query) use ($user) {
				return $query->where([
					'Lendings.user_id' => $user->id
				]);
			})
			->order(['Lendings.lending_state_id' => 'ASC']);

		$paginationOptions = [
			'limit' => 100
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);

        $this->set(compact('user', 'currurl', 'pdocuments'));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $subscriptionStates = $this->Users->SubscriptionStates->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'subscriptionStates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
     
    
     
    public function pwd()
    {
        $user =$this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->data)) {
            $user = $this->Users->patchEntity($user, [
                    'old_password'  => $this->request->data['old_password'],
                    'password'      => $this->request->data['password1'],
                    'password1'     => $this->request->data['password1'],
                    'password2'     => $this->request->data['password2']
                ],
                ['validate' => 'password']
            );
            if ($this->Users->save($user)) {
                $this->Flash->success('Contrasenya canviada!');
                $this->redirect('/documents/index');
            } else {
                $this->Flash->error('No s\'ha canviat la contrasenya!');
            }
        }
        $this->set('user',$user);
    }
    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $subscriptionStates = $this->Users->SubscriptionStates->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'subscriptionStates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
   {
        if($this->Auth->user('group_id') == 12){
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if(!empty($user->photo_dir)){
		$delefolder = $user->photo_dir;
		$dfolder = str_replace('webroot/','',$delefolder);
		$delfolder = new Folder(WWW_ROOT . $dfolder);
		$delfolder->delete();
		}
        if ($this->Authors->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    else{
		$this->Flash->error(__('No tens permisos per esborrar.'));
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		}
	}
	public function avisaPrestec($userid)
	{
		
		$user = $this->Users->get($userid, [
            'contain' => ['Lendings' => ['Documents']]
        ]);
        
        $documentsQuery = $this->Users->Lendings->Documents
			->find()
			->contain(['Authorities' => ['Authors', 'AuthorTypes'], 'PublicationPlaces' => ['Countries'], 'Levels', 'Collections', 'Lendings' => ['LendingStates', 'Users' => ['Groups'], 'SetLendingUsers', 'SetReturnUsers'], 'Languages', 'Cdus', 'Formats', 'Collections', 'Subjects', 'PublicationPlaces', 'Locations', 'CatalogueStates', 'ConservationStates', 'Publishers', 'LendingStates'])
			->matching('Lendings', function (\Cake\ORM\Query $query) use ($user) {
				return $query->where([
					'AND' => ['Lendings.user_id' => $user->id], ['Lendings.lending_state_id' => 3]
				]);
			})
			->order(['Lendings.lending_state_id' => 'ASC']);

		$paginationOptions = [
			'limit' => 100
		];

		$pdocuments = $this->paginate($documentsQuery, $paginationOptions);
		
		if(!empty($user->mail1) && !empty($user->mail2)){		
			$email = new Email('default');
			$email->from(['orlandai.biblioteca@gmail.com' => 'Biblioteca Marta Mata (Escola Orlandai)'])
				->to($user->mail1)
				->addTo($user->mail2)
				->subject('Avís de cortesia: préstec vençut')
				->template('avisaPrestec')
				->emailFormat('html')
				->viewVars(compact('user', 'pdocuments'));
			if($email->send()){
				$now = Time::now();
				$user = $this->Users->patchEntity($user, $this->request->getData());
				$user->lastmail = $now;
				$this->Users->save($user);
				$this->Flash->success(__('El correu s\'ha enviat correctament.'));
				return $this->redirect($this->referer());
			} else {
				$this->Flash->error(__('El correu no s\'ha pogut enviar.'));
			}
		}
		elseif(!empty($user->mail1)){		
			$email = new Email('default');
			$email->from(['orlandai.biblioteca@gmail.com' => 'Biblioteca Marta Mata (Escola Orlandai)'])
				->to($user->mail1)
				->subject('Avís de cortesia: préstec vençut')
				->template('avisaPrestec')
				->emailFormat('html')
				->viewVars(compact('user', 'pdocuments'));
			if($email->send()){
				$now = Time::now();
				$user = $this->Users->patchEntity($user, $this->request->getData());
				$user->lastmail = $now;
				$this->Users->save($user);
				$this->Flash->success(__('El correu s\'ha enviat correctament.'));
				return $this->redirect($this->referer());
			} else {
				$this->Flash->error(__('El correu no s\'ha pogut enviar.'));
			}
		}
		elseif(!empty($user->mail2)){		
			$email = new Email('default');
			$email->from(['orlandai.biblioteca@gmail.com' => 'Biblioteca Marta Mata (Escola Orlandai)'])
				->to($user->mail2)
				->subject('Avís de cortesia: préstec vençut')
				->template('avisaPrestec')
				->emailFormat('html')
				->viewVars(compact('user', 'pdocuments'));
			if($email->send()){
				$now = Time::now();
				$user = $this->Users->patchEntity($user, $this->request->getData());
				$user->lastmail = $now;
				$this->Users->save($user);
				$this->Flash->success(__('El correu s\'ha enviat correctament.'));
				return $this->redirect($this->referer());
			} else {
				$this->Flash->error(__('El correu no s\'ha pogut enviar.'));
			}
		}
		else{
			$this->Flash->error(__('No consta cap adreça electrònica.'));
			return $this->redirect($this->referer());
			}
}
}
