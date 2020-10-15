<?php
namespace App\Controller;

class AircraftsController extends AppController
{
	public function isAuthorized($user)
	{
		$action = $this->request->getParam('action');
		// The add and tags actions are always allowed to logged in users.
		if (in_array($action, ['add', 'tags'])) {
			return true;
		}

		// All other actions require a slug.
		$slug = $this->request->getParam('pass.0');
		if (!$slug) {
			return false;
		}

		// Check that the article belongs to the current user.
		$aircraft = $this->Aircrafts->findBySlug($slug)->first();

		return $aircraft->user_id === $user['id'];
	}
	
	
	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
		$this->Auth->allow(['tags']);
    }
	
	public function index()
    {
        $this->loadComponent('Paginator');
        $aircrafts = $this->Paginator->paginate($this->Aircrafts->find(
			'all',[
            'contain' => ['Users'],
        ]));
        $this->set(compact('aircrafts'));
    }
	
	public function view($slug = null)
	{
		$aircraft = $this->Aircrafts->findBySlug($slug)->firstOrFail();
		$this->set(compact('aircraft'));
	}
	
	public function add()
    {
        $aircraft = $this->Aircrafts->newEntity();
        if ($this->request->is('post')) {
            $aircraft = $this->Aircrafts->patchEntity($aircraft, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $aircraft->user_id = $this->Auth->user('id');

            if ($this->Aircrafts->save($aircraft)) {
                $this->Flash->success(__('Your aircraft has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your aircraft.'));
        }
		$engines = $this->Aircrafts->Engines->find('list');
        $this->set('engines', $engines);
		
        $this->set('aircraft', $aircraft);
    }
	
	public function edit($slug)
	{
		$aircraft = $this->Aircrafts
		->findBySlug($slug)
		->contain('Engines')
		->firstOrFail();
		if ($this->request->is(['post', 'put'])) {
			$this->Aircrafts->patchEntity($aircraft, $this->request->getData(), [
			'accessibleFields' => ['user_id' => false]
			]);
			if ($this->Aircrafts->save($aircraft)) {
				$this->Flash->success(__('Your aircraft has been edited.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to edit your aircraft.'));
		}
		$engines = $this->Aircrafts->Engines->find('list');
		$this->set('engines', $engines);

		$this->set('aircraft', $aircraft);
	}
	
	public function delete($slug)
	{
		$this->request->allowMethod(['post', 'delete']);

		$aircraft = $this->Aircrafts->findBySlug($slug)->firstOrFail();
		if ($this->Aircrafts->delete($aircraft)) {
			$this->Flash->success(__('The aircraft {0} has been deleted.', $aircraft->Modele));
			return $this->redirect(['action' => 'index']);
		}
	}
}