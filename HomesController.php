# CakePHP<?php
/**
 * HomesController
 */

App::uses('AppController', 'Controller');

class HomesController extends AppController {

	/**
	* Index
	*/
	public function index() {

		# Articles
		$this->loadModel('Post');
		$posts = $this->Post->find('all',
			array(
			
				# Aqui ele esta pegando apenas 6 notícias
				'limit' => 6,
				
				# Aqui ele ta ordenando da maior data do campo created para a menor
				'order' => array(
					//'posts.created' => 'DESC'
				)
			)
		);

		# Set
		$this->set(
			array(
				'posts' => $posts
			)
		);

	}

}
