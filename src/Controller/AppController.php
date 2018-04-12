<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\View\Helper\SessionHelper;
use Cake\Routing\Router;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     
    public function beforeFilter(Event $event){
	$url = Router::url(NULL, true); //complete url
    if (!preg_match('/login|logout/i', $url)){
        $this->request->session()->write('lastUrl', $url);
    }
    $us = $this->LoadModel('Users');
		$users = $us->find('list',
		['keyField' => 'id',
		'valueField' => 'name']);
		$docs = $this->LoadModel('Documents'); 
		$documents = $docs->find('list',
		['keyField' => 'id',
		'valueField' => 'fullname']);
		$subs = $this->LoadModel('Subjects'); 
		$subjects = $subs->find('list');
		$langs = $this->LoadModel('Languages'); 
		$languages = $langs->find('list');
		$auths = $this->LoadModel('Authors'); 
		$authors = $auths->find('list');
    $this->set(compact('users', 'documents', 'authors', 'subjects', 'languages'));
}

   
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		
		$this->loadComponent('Auth', [
		'authenticate' => [
		'Form' => [
		'fields' => [
		'username' => 'username',
		'password' => 'password'
		]
		]
		],
		'loginAction' => [
		'controller' => 'Users',
		'action' => 'login'
		],
		// If unauthorized, return them to page they were just on
		'unauthorizedRedirect' => $this->referer()
		]);
		// Allow the display action so our PagesController
		// continues to work. Also enable the read only actions.
		$this->Auth->allow(['display', 'view', 'index', 'compactview', 'pdfcompactview', 'pdfindex', 'doneindex']);
		}
		
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
