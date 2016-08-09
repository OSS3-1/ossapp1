<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ImagesController extends AppController
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
    
    public function upload($id = null)
		{
			$this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');
			
		}
		
		public function up()
		{
			if($this->request->is('Ajax')) //Ajax Detection
	    {
	       $this->autoRender = false; // Set Render False
	       $this->response->disableCache();
	       $this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');
					// example options
					$options = array(
					    'max_file_size' => 2048000,
					    'max_number_of_files' => 5,
					    'access_control_allow_methods' => array(
					        'POST'
					    ),
					    'access_control_allow_origin' => Router::fullBaseUrl(),
					    'accept_file_types' => '/\.(jpe?g|png)$/i',
					    'upload_dir' => WWW_ROOT . 'files' . DS . 'uploads' . DS,
					    'upload_url' => '/files/uploads/',
					    'print_response' => false
					);
					
					$result = $this->JqueryFileUpload->upload($options);
					
	    }
	    
		}

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
        $this->set('images', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['images']);
        
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Jobs']
        ]);
        $this->set('image', $image);
        $this->set('_serialize', ['image']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(___('the image has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $image->id]);
            } else {
                $this->Flash->error(___('the image could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'jobs'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(___('the image has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $image->id]);
            } else {
                $this->Flash->error(___('the image could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'jobs'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        
        try
        {
            if ($this->Images->delete($image)) {
                $this->Flash->success(___('the image has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the image could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the image could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The image could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function deleteAll() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->Images->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected image has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected images have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected images could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected images could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no image to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Image id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->newEntity();
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(___('the image has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $image->id]);
            } else {
                $this->Flash->error(___('the image could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $jobs = $this->Images->Jobs->find('list', ['limit' => 200]);
        
        $image->id = $id;
        $this->set(compact('image', 'jobs'));
        $this->set('_serialize', ['image']);
    }
}
