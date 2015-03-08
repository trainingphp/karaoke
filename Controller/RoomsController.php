<?php
App::uses('AppController', 'Controller');
/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/////// admin /////////


/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$rooms = $this->Room->find('all', array(
			'recursive' => 0,
			'order' => array('Room.id' => 'asc'),
		));
		$this->set('rooms', $rooms);
		$this->set('title', 'Quản lí phòng');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
		$this->set('room', $this->Room->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Room->create();
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'));
			}
		}
		$types = $this->Room->Type->find('list');
		$this->set(compact('types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
			$this->request->data = $this->Room->find('first', $options);
		}
		$types = $this->Room->Type->find('list');
		$this->set(compact('types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Room->id = $id;
		if (!$this->Room->exists()) {
			throw new NotFoundException(__('Invalid room'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Room->delete()) {
			$this->Session->setFlash(__('The room has been deleted.'));
		} else {
			$this->Session->setFlash(__('The room could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

// thời gian bắt đầu hát
	public function admin_start_sing($id = null){
		// if(!$this->Session->check('time_start.'.$id)) {
			if($this->request->is('post')){
				$this->Room->id = $id;
				$this->Room->saveField('singing', 1);
				$this->Session->write('time_start.'.$id, date('F jS, Y h:i A'));
			}
		// }
		// elseif($this->Session->check('time_start.'.$id)) {
		// 	$this->Session->setFlash('Phòng này đã được khởi động!', 'default', array('class' => 'alert alert-warning'), 'sing');
		// }
		$this->redirect($this->referer());
	}

// thời gian hát kết thúc
	public function admin_end_sing($id = null) {
		// if(!$this->Session->check('time_start.'.$id)) {
		// 	$this->Session->setFlash('Phòng này chưa được khởi động. Vui lòng chọn bắt đầu hát để có thể tính tiền', 'default', array('class' => 'alert alert-warning'), 'sing');
		// }
		// else {
			if($this->request->is('post')) {
				$this->Room->id = $id;
				$this->Room->saveField('singing', 0);

				$room = $this->Room->findById($id);

				$this->Session->write('time_end.'.$id, date('F jS, Y h:i A'));

				$this->Session->write('payment.id', $id);

				$time_start = $this->Session->read('time_start.'.$id);
				$this->Session->write('payment.time_start', $time_start);

				$time_end = $this->Session->read('time_end.'.$id);
				$this->Session->write('payment.time_end', $time_end);

				$time = (CakeTime::gmt($time_end) - CakeTime::gmt($time_start)) / 3600;
				$this->Session->write('payment.time', $time);

				$total = $time * $room['Type']['price'];
				$this->Session->write('payment.total', $total);
			}
		// }
		$this->set('title', 'Dịch vụ sử dụng');

		// lấy các dịch vụ
		$this->loadModel('Service');
		$services = $this->Service->find('all');
		$this->set('services', $services);
	}

}
