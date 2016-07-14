<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dealerships Controller
 *
 * @property \App\Model\Table\DealershipsTable $Dealerships
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class DealershipsController extends AppController
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
            'contain' => ['Groups']
        ];
        $this->set('dealerships', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['dealerships']);
        
        $groups = $this->Dealerships->Groups->find('list', ['limit' => 200]);
        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Dealership id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dealership = $this->Dealerships->get($id, [
            'contain' => ['Groups', 'Jobs', 'Users']
        ]);
        $this->set('dealership', $dealership);
        $this->set('_serialize', ['dealership']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dealership = $this->Dealerships->newEntity();
        if ($this->request->is('post')) {
            $dealership = $this->Dealerships->patchEntity($dealership, $this->request->data);
            if ($this->Dealerships->save($dealership)) {
                $this->Flash->success(___('the dealership has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $dealership->id]);
            } else {
                $this->Flash->error(___('the dealership could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $groups = $this->Dealerships->Groups->find('list', ['limit' => 200]);
        $this->set(compact('dealership', 'groups'));
        $this->set('_serialize', ['dealership']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dealership id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dealership = $this->Dealerships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dealership = $this->Dealerships->patchEntity($dealership, $this->request->data);
            if ($this->Dealerships->save($dealership)) {
                $this->Flash->success(___('the dealership has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $dealership->id]);
            } else {
                $this->Flash->error(___('the dealership could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $groups = $this->Dealerships->Groups->find('list', ['limit' => 200]);
        $this->set(compact('dealership', 'groups'));
        $this->set('_serialize', ['dealership']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dealership id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dealership = $this->Dealerships->get($id);
        
        try
        {
            if ($this->Dealerships->delete($dealership)) {
                $this->Flash->success(___('the dealership has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the dealership could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the dealership could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The dealership could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Dealerships->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected dealership has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected dealerships have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected dealerships could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected dealerships could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no dealership to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Dealership id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $dealership = $this->Dealerships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dealership = $this->Dealerships->newEntity();
            $dealership = $this->Dealerships->patchEntity($dealership, $this->request->data);
            if ($this->Dealerships->save($dealership)) {
                $this->Flash->success(___('the dealership has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $dealership->id]);
            } else {
                $this->Flash->error(___('the dealership could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $groups = $this->Dealerships->Groups->find('list', ['limit' => 200]);
        
        $dealership->id = $id;
        $this->set(compact('dealership', 'groups'));
        $this->set('_serialize', ['dealership']);
    }
}
