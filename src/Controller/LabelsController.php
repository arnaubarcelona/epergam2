<?php
namespace App\Controller;
use Cake\I18n\Time;
use App\Controller\AppController;

/**
 * Labels Controller
 *
 * @property \App\Model\Table\LabelsTable $Labels
 *
 * @method \App\Model\Entity\Label[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LabelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents']
        ];
        $labels = $this->paginate($this->Labels);

        $this->set(compact('labels'));
    }



	public function pdfindex()
    {
		$now = Time::now();
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Etiquetes - ' . $now . '.pdf',
                'margin' => [
					'bottom' => 10,
					'left' => 10,
					'right' => 10,
					'top' => 10
				]
            ]
        ]);
        $labels = $this->Labels->find(all);

        $this->set(compact('labels'));
    }
    /**
     * View method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('label', $label);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $label = $this->Labels->newEntity();
        if ($this->request->is('post')) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('The label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label could not be saved. Please, try again.'));
        }
        $documents = $this->Labels->Documents->find('list', ['limit' => 200]);
        $this->set(compact('label', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('The label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label could not be saved. Please, try again.'));
        }
        $documents = $this->Labels->Documents->find('list', ['limit' => 200]);
        $this->set(compact('label', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $label = $this->Labels->get($id);
        if ($this->Labels->delete($label)) {
            $this->Flash->success(__('The label has been deleted.'));
        } else {
            $this->Flash->error(__('The label could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
