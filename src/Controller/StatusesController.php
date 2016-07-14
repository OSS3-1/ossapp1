<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statuses Controller
 *
 * @property \App\Model\Table\StatusesTable $Statuses
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StatusesController extends AppController
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
        $this->set('statuses', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['statuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => ['Jobs']
        ]);
        $this->set('status', $status);
        $this->set('_serialize', ['status']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Statuses->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Statuses->patchEntity($status, $this->request->data);
            if ($this->Statuses->save($status)) {
                $this->Flash->success(___('the status has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $status->id]);
            } else {
                $this->Flash->error(___('the status could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->patchEntity($status, $this->request->data);
            if ($this->Statuses->save($status)) {
                $this->Flash->success(___('the status has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $status->id]);
            } else {
                $this->Flash->error(___('the status could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Statuses->get($id);
        
        try
        {
            if ($this->Statuses->delete($status)) {
                $this->Flash->success(___('the status has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the status could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the status could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The status could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Statuses->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected status has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected statuses have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected statuses could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected statuses could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no status to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Status id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->newEntity();
            $status = $this->Statuses->patchEntity($status, $this->request->data);
            if ($this->Statuses->save($status)) {
                $this->Flash->success(___('the status has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $status->id]);
            } else {
                $this->Flash->error(___('the status could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $status->id = $id;
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }
}
