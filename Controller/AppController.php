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
			'loginRedirect' => '/'
			)
		);

	public function beforeFilter(){
		$this->Auth->allow('index');
		$this->set('user_info', $this->get_user());
	}

	public function get_user() {
		if($this->Session->check('User')) {
			return $this->Session->read('User');
		}
	}
}
