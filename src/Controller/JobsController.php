<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class JobsController extends AppController
{
		 public function isAuthorized($user){
		    // All registered users can add articles
		    if ($this->request->action === 'actualJob') {
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
    
     public function jobslist()
    {
        $this->paginate = [
            'contain' => ['Statuses', 'Dealerships', 'Services']
        ];
        $this->set('jobs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['jobs']);
        
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $this->set(compact('statuses', 'dealerships', 'services'));
    }
    
    
		public function new() //Requester function to up a job order
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            $job->status_id = 1; //define status to Pending Approval
            if ($this->Jobs->save($job)) {
                $this->Flash->success(___('the job has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $job->id]);
            } else {
                $this->Flash->error(___('the job could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $this->set(compact('job', 'statuses', 'dealerships', 'services'));
        $this->set('_serialize', ['job']);
    }
    
    public function actualJob($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Statuses', 'Dealerships', 'Services','Users']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            
            $start_date = new \DateTime($job->start); // get start date/time from db
						$end_date  = new \DateTime(date('Y-m-d H:i:s')); // get actual date/time 
						$interval = date_diff($start_date,$end_date); //get the time of the task
						$total_time = $interval->format('%H:%I:%S'); //format time in Hours:Min:Sec
						
						$job->status_id = 5; //Job order status set to done
						$job->end = date('Y-m-d H:i:s'); //set de end date/time	
						$job->time = $total_time; //set the complete time
						
						$this->loadModel('Users');// Get Users Model
						$actual_user =  $this->Auth->user('id');// Set actual user ID
						$user = $this->Users->get($actual_user);// Retrieve actual login user info
						$user->busy = 0; //set user status to busy

            if ($this->Jobs->save($job) && $this->Users->save($user)) {
                $this->Flash->success(___('Well Done'), ['plugin' => 'Alaxos']);
								$this->request->session()->write('Auth.User.busy', 0);//Get user stats from session and write new value
								
                return $this->redirect(['controller'=>'Groups','action' => 'employeeWelcome']);
            } else {
                $this->Flash->error(___('the job could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $this->set(compact('job', 'statuses', 'users', 'dealerships', 'services'));
        $this->set('_serialize', ['job']);
    }
    
    public function detail($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Statuses', 'Dealerships', 'Services']
        ]);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }
    /**
    	Employee functions
    */

    
    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses', 'Dealerships', 'Services']
        ];
        $this->set('jobs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['jobs']);
        
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $this->set(compact('statuses', 'dealerships', 'services'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Statuses', 'Dealerships', 'Services']
        ]);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(___('the job has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $job->id]);
            } else {
                $this->Flash->error(___('the job could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        
        $this->set(compact('job', 'statuses', 'dealerships', 'services','users'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            $job->start = date('Y-m-d H:i:s'); //set start date/time of the job order
            if ($this->Jobs->save($job)) {
                $this->Flash->success(___('the job has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $job->id]);
            } else {
                $this->Flash->error(___('the job could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        $this->set(compact('job', 'statuses', 'dealerships', 'services'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        
        try
        {
            if ($this->Jobs->delete($job)) {
                $this->Flash->success(___('the job has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the job could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the job could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The job could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Jobs->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected job has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected jobs have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected jobs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected jobs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no job to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Job id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->newEntity();
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success(___('the job has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $job->id]);
            } else {
                $this->Flash->error(___('the job could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $statuses = $this->Jobs->Statuses->find('list', ['limit' => 200]);
        $dealerships = $this->Jobs->Dealerships->find('list', ['limit' => 200]);
        $services = $this->Jobs->Services->find('list', ['limit' => 200]);
        
        $job->id = $id;
        $this->set(compact('job', 'statuses', 'dealerships', 'services'));
        $this->set('_serialize', ['job']);
    }
}
