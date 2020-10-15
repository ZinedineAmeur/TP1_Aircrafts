<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Engines Controller
 *
 * @property \App\Model\Table\EnginesTable $Engines
 *
 * @method \App\Model\Entity\Engine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnginesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $engines = $this->paginate($this->Engines);

        $this->set(compact('engines'));
    }

    /**
     * View method
     *
     * @param string|null $id Engine id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $engine = $this->Engines->get($id, [
            'contain' => ['Aircrafts'],
        ]);

        $this->set('engine', $engine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $engine = $this->Engines->newEntity();
        if ($this->request->is('post')) {
            $engine = $this->Engines->patchEntity($engine, $this->request->getData());
            if ($this->Engines->save($engine)) {
                $this->Flash->success(__('The engine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The engine could not be saved. Please, try again.'));
        }
        $aircrafts = $this->Engines->Aircrafts->find('list', ['limit' => 200]);
        $this->set(compact('engine', 'aircrafts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Engine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $engine = $this->Engines->get($id, [
            'contain' => ['Aircrafts'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $engine = $this->Engines->patchEntity($engine, $this->request->getData());
            if ($this->Engines->save($engine)) {
                $this->Flash->success(__('The engine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The engine could not be saved. Please, try again.'));
        }
        $aircrafts = $this->Engines->Aircrafts->find('list', ['limit' => 200]);
        $this->set(compact('engine', 'aircrafts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Engine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $engine = $this->Engines->get($id);
        if ($this->Engines->delete($engine)) {
            $this->Flash->success(__('The engine has been deleted.'));
        } else {
            $this->Flash->error(__('The engine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
