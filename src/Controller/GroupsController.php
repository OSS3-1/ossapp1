<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class GroupsController extends AppController
{

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
    
    public function isAuthorized($user){
		    // Permitr el accesso a los empleados
		    if (in_array($this->request->action, ['employeeWelcome', 'employeeList','getJob'])) {
		        return true;
		    }
		    return parent::isAuthorized($user);
		}
    
		/**
    	Employee functions
    */
    public function getJob(){ //get list of groups
	    
	    
	    
	    $this->set('groups', $this->paginate($this->Filter->getFilterQuery()));
      $this->set('_serialize', ['groups']);
    }
    
    public function employeeList($id = null){ //get job list by group and delerships
	    
        $group = $this->Groups->get($id, [
            'contain' => ['Dealerships.Jobs.Services'] //get the dealership jobs lists
        ]);
        
        
        $this->loadModel('Users');// Get Users Model
        $actual_user =  $this->Auth->user('id');// Set actual user ID
        $user = $this->Users->get($actual_user);// Retrieve actual login user info
        
 
        if ($this->request->is(['patch', 'post', 'put'])) {
	        $job_id = $this->request->data['job']; //get job ID
	        
	        //JOB DATA
	        $this->loadModel('Jobs');// Get Jobs Model
					$job = $this->Jobs->get($job_id);// Retrieve actual login user info
	        $job->employee_assigned = $this->Auth->user('full_name');
	        $job->start = date('Y-m-d H:i:s'); 
	        $job->user_id = $actual_user;
	        $this->Jobs->save($job);
	        
	        //USER DATA
					$user->busy = $job_id; //set user status to busy
					$this->Users->save($user);//save user data
					$this->request->session()->write('Auth.User.busy', $job_id );//Get user stats from session and write new value
					return $this->redirect(['controller'=>'Jobs', 'action' => 'actualJob', $job_id ]);
        }
        
        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    
    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->set('groups', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Dealerships']
        ]);
        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(___('the group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $group->id]);
            } else {
                $this->Flash->error(___('the group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(___('the group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $group->id]);
            } else {
                $this->Flash->error(___('the group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        
        try
        {
            if ($this->Groups->delete($group)) {
                $this->Flash->success(___('the group has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the group could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the group could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The group could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Groups->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected group has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected groups have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected groups could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected groups could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no group to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->newEntity();
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(___('the group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $group->id]);
            } else {
                $this->Flash->error(___('the group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $group->id = $id;
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }
}
