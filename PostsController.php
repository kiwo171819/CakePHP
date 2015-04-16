<?php
/**
 * 
 */

class PostsController extends AppController {
	public $components = array('Paginator');
	
public function index() {
	  $this->helpers[] = "Time";
		$this->helpers[] = "Number";
		
		$this->Post->recursive = 0; 
		$this->set('Posts', $this->Paginator->paginate());
}
	public $name = 'Posts';
	public function add(){
		if($this->data){
			if($this->Post->save($this->data))
			$this->Session->setFlash('Post Adicionado com sucesso');
			$this->data = array();


		}
	}
	
	public function edit($id = NULL){
		if($this->data){
			if($this->Post->save($this->data));
			$this->Session->setFlash('editado');
			$this->redirect(array('controller'=>'posts','action'=>'index'));
		}else{
		$this->data = $this->Post->read(NULL,$id);
		}
	}
	
	public function delete($id = NULL){
		if($id){
			if ($this->Post->delete($id)) {
				$this->Session->setFlash('excluido com sucesso');
				$this->redirect(array('Controller'=>'posts','action'=>'index'));
			}
		}
	}
	
	public function view ($id = NULL){
		if ($id){
			$post = $this->Post->read(NULL,$id);
			$this->set(compact('post'));
		}
	}
}
