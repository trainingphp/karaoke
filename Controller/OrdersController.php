<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


///// admin///////


/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		if($this->request->is('post')) {
			$start = date('Y-m-d', strtotime($this->request->data['Order']['start']));
			$end = date('Y-m-d', strtotime($this->request->data['Order']['end']));
			if($start > $end) {
				$this->Session->setFlash('Ngày bắt đầu không được lớn hơn ngày kết thúc!', 'default', array('class' => 'alert alert-danger'), 'order');
			}
			else {
				$orders = $this->Order->find('all', array(
					'recursive' => -1,
					'conditions' => array(
						'and' => array(
							'Order.created >=' => $start,
							'Order.created <=' => $end,
							)
						)
					)
				);
				$this->set('orders', $orders);
			}
		}
		else{
			$orders = $this->Order->find('all', array(
				'order' => array('created' => 'desc'),
			));
			$this->set('orders', $orders);
		}
		
		$this->set('title', 'Hóa đơn');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id), 'recursive' => -1);
		$this->set('order', $this->Order->find('first', $options));
		$this->set('title', 'Xem chi tiết hóa đơn');
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			$this->Order->created = date('Y-m-d');
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Order->Customer->find('list');
		$rooms = $this->Order->Room->find('list');
		$this->set(compact('customers', 'rooms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$customers = $this->Order->Customer->find('list');
		$rooms = $this->Order->Room->find('list');
		$this->set(compact('customers', 'rooms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if($this->request->is('post', 'delete')) {
			if ($this->Order->delete($id)) {
				$this->Session->setFlash('Đã xóa hóa đơn!', 'default', array('class' => 'alert alert-info'), 'order');
			} else {
				$this->Session->setFlash('Xóa không thành công. Vui lòng thử lại!', 'default', array('class' => 'alert alert-danger'), 'order');
			}
		}
		
		$this->redirect($this->referer());
	}

	// dịch vụ sử dụng
	public function admin_add_service($id = null) {
		if($this->request->is('post')) {
			$this->loadModel('Service');
			// $service = $this->Service->findById($id);
			$service = $this->Service->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'Service.id' => $id
					)
				));

			if($this->Session->check('service.'.$id)) {
				$item = $this->Session->read('service.'.$id);
				$item['quantity'] += 1;
			}
			else {
				$item = array(
					'id' => $service['Service']['id'],
					'name' => $service['Service']['name'],
					'price' => $service['Service']['price'],
					'quantity' => 1
				);
			}			

			// thêm service vào sử dụng
			$this->Session->write('service.'.$id, $item);

			//tính tổng tiền
			$service = $this->Session->read('service');
			$total = $this->Tool->array_sum($service, 'quantity', 'price') + $this->Session->read('payment.total');
			$this->Session->write('payment.total', $total);

			$this->Session->setFlash('Đã thêm vào hóa đơn!', 'default', array('class' => 'alert alert-info'), 'service');
			$this->redirect($this->referer());
		}
	}

	// cập nhật số lượng dịch vụ sử dụng
	public function admin_update($id = null) {
		if($this->request->is('post')) {
			$count = $this->request->data['Order']['quantity'];
			if(empty($count) || $count <= 0){
				$count = $count;
			}
			else {
				$service = $this->Session->read('service.'.$id);
				$service['quantity'] = $count;
				$this->Session->write('service.'.$id, $service);

				//tính tổng tiền
				$service = $this->Session->read('service');
				$total = $this->Tool->array_sum($service, 'quantity', 'price');
				$this->Session->write('payment.total', $total);
			}
			$this->redirect($this->referer());
		}
	}

	// nhập thông tin khách hàng
	public function admin_service_info(){
		$this->set('title', 'Thông tin khách hàng');
		$service = $this->Session->read('service');
		$this->set('service', $service);
	}

	// tính tiền
	public function admin_checkout() {
		$data = '';
		if($this->request->is('post')) {
			$data = array(
				'room_id' => $this->Session->read('payment.id'),
				'customer_info' => json_encode($this->request->data['Order']),
				'order_info' => json_encode($this->Session->read('payment')),
				'service_info' => json_encode($this->Session->read('service')),
			);
			if($this->Order->saveAll($data)) {
				$this->Session->delete('service');
				$this->Session->delete('payment');
				$this->Session->setFlash('Đã thanh toán. Xin cảm ơn!', 'default', array('class' => 'alert alert-info'), 'order');
			}
			else {
				$this->Session->setFlash('Hóa đơn chưa được thanh toán. vui long thử lại!', 'default', array('class' => 'alert alert-danger'), 'order');
			}
		}
		$this->layout = null;
		$this->set('data', $data);
		$this->set('title', 'In hóa đơn');
	}

}