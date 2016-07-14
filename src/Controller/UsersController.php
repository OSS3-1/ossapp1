<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UsersController extends AppController
{
		public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }
    
    public function isAuthorized($user){
		    // All registered users can add articles
		    if ($this->request->action === 'index') {
		        return true;
		    }
		    return parent::isAuthorized($user);
		}

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Alaxos.AlaxosHtml', 'Alaxos.AlaxosForm', 'Alaxos.Navbars'];

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Alaxos.Filter'];
    
    
    public function login()
		{
	    if ($this->request->is('post')) {
	        $user = $this->Auth->identify();
	        if ($user) {
	            $this->Auth->setUser($user);
	            if($this->Auth->user('role') === 'admin'){
		            return $this->redirect($this->Auth->redirectUrl());
	            }else{
		            return $this->redirect('/employees/welcome');
	            }
	            //return $this->redirect($this->Auth->redirectUrl());s
	        }
	        $this->Flash->error(__('Invalid username or password, try again'));
	    }
		}
		
		public function logout()
		{
		  return $this->redirect($this->Auth->logout());
		}

    /**
    * Index method
    *
    * @return void
    */
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dealerships']
        ];
        $this->set('users', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['users']);
        
        $dealerships = $this->Users->Dealerships->find('list', ['limit' => 200]);
        $this->set(compact('dealerships'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Dealerships']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $dealerships = $this->Users->Dealerships->find('list', ['limit' => 200]);
        $this->set(compact('user', 'dealerships'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $dealerships = $this->Users->Dealerships->find('list', ['limit' => 200]);
        $this->set(compact('user', 'dealerships'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        
        try
        {
            if ($this->Users->delete($user)) {
                $this->Flash->success(___('the user has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function delete_all() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->Users->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected users have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected users could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected users could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $dealerships = $this->Users->Dealerships->find('list', ['limit' => 200]);
        
        $user->id = $id;
        $this->set(compact('user', 'dealerships'));
        $this->set('_serialize', ['user']);
    }
}
