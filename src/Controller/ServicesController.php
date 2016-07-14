<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ServicesController extends AppController
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

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs']
        ];
        $this->set('services', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['services']);
        
        $jobs = $this->Services->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => ['Jobs']
        ]);
        $this->set('service', $service);
        $this->set('_serialize', ['service']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success(___('the service has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $service->id]);
            } else {
                $this->Flash->error(___('the service could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Services->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('service', 'jobs'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success(___('the service has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $service->id]);
            } else {
                $this->Flash->error(___('the service could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Services->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('service', 'jobs'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        
        try
        {
            if ($this->Services->delete($service)) {
                $this->Flash->success(___('the service has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the service could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the service could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The service could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Services->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected service has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected services have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected services could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected services could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no service to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Service id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->newEntity();
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success(___('the service has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $service->id]);
            } else {
                $this->Flash->error(___('the service could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Services->Jobs->find('list', ['limit' => 200]);
        
        $service->id = $id;
        $this->set(compact('service', 'jobs'));
        $this->set('_serialize', ['service']);
    }
}
