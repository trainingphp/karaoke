<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

// login - đăng nhập vào hệ thông
	public function login(){
		if($this->request->is('post')) {
			$this->User->set($this->request->data);
			if($this->User->validates()) {
				// pr($this->request->data);
				$user = $this->User->find('first', array(
					'recursive' => -1,
					'conditions' => array(
						'username' => $this->request->data['User']['username'],
						'password' => md5($this->request->data['User']['password']),
						)
					)
				);
				if($user) {
					if($this->Auth->login($user)){
						$this->Session->Write('User.id', $user['User']['id']);
						$this->redirect($this->Auth->redirectUrl());
					}
					else {
						$this->Session->setFlash('Lỗi. Không thể đăng nhập!', 'default', array('class' => 'alert alert-danger'), 'auth');
					}
				}
				else {
					$this->Session->setFlash('Thông tin đăng nhập không chính xác. Vui lòng kiểm tra lại!', 'default', array('class' => 'alert alert-danger'), 'auth');
				}
			}
			else {
				$this->set('errors', $this->User->validationErrors);
			}
		}
		$this->set('title', 'Đăng nhập');
	}

// logout - Đăng xuất khỏi hệ thống
	public function logout(){
		if($this->Session->check('User')){
			$this->Session->destroy();
			$this->Session->setFlash('Bạn đã đăng xuất. Hãy đăng nhập để tiếp tục!', 'default', array('class' => 'alert alert-info'), 'auth');
			$this->redirect('/login');
		}
		else {
			$this->Session->setFlash('Bạn chưa đăng nhập!', 'default', array('class' => 'alert alert-danger'), 'auth');
			$this->redirect('/login');
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
