<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			'loginAction' => '/login',
			'authError' => 'Bạn cần đăng nhập để tiếp tục',
			'flash' => array(
				'element' => 'default',
				'key' => 'auth',
				'params' => array('class' => 'alert alert-danger')
				),
			'loginRedirect' => '/admin'
			)
		);

	public function beforeFilter(){
		$this->Auth->allow('index');
		$this->set('user_info', $this->get_user());
		if(substr($this->request->params['action'], 0, 6) == 'admin_') {
			$this->layout = 'admin';
		}
	}

	public function get_user() {
		$this->loadModel('User');
		if($this->Session->check('User.id')){
			$id = $this->Session->read('User.id');
			$user_info = $this->User->findById($id);
			return $user_info;
		}
	}
}
