<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(
			'register_room','view'
			);
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());
	}
	/**
	 * Thông tin đặt phòng
	*/
	public function admin_index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());
	}
	public function admin_update_status(){
		if($this->request->is('post')){
			$info_cus_id = $this->request->data['Customer']['id'];
			$this->Customer->query("UPDATE customers
			SET status = 1
			WHERE customers.id = $info_cus_id");
			$this->Session->setFlash('Cập nhật thành công','default',array('class'=>'alert alert-success'),'updata_status');
			return $this->redirect($this->referer());
		}
		//debug($info_cus_id);
	}
	/**
	 * admin_add
	*/
	public function admin_add(){
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash('Lưu thông tin thành công.','default',array('class'=>'alert alert-info'),'noteAdd');
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		}
	}
	/**
	 * view admin
	*/
	public function admin_view($id=null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}
/**
 * registes_room
*/
	public function register_room($id = null) {
		$data = $this->request->data;
		if(!empty($data)){	
			$choose_day = $data['Customer']['date'];		
			$today = date("Y-m-d");
			$date = date('Y-m-d',strtotime($data['Customer']['date']));
				if(strtotime($today) <= strtotime($date)){
					$list_register = $this->Customer->find('all',array(
					'conditions'=>array(
						'Customer.date'=>$date,
						'Customer.room_id'=>$this->request->data['Customer']['id'],
						//'status'=>1
						)
					));					
					$this->set('room_info',$list_register);
				}else{
					$this->Session->write('error_day',1);
					$this->Session->setFlash('Ngày bạn chọn không được bé hơn ngày hiện tại','default',array('class'=>'alert alert-danger'),'check_day');
				}
			}
			
			$this->set(compact('id','choose_day'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('post')){
			$kiemtra = true;
			if($this->Session->check('error_day')){
				$this->Session->setFlash('Ngày bạn bạn muốn đặt phòng không hợp lệ,',
					'default',array('class'=>'alert alert-danger'),'er');
				$this->Session->delete('error_day');
				$this->redirect($this->referer());
			}else{
				
				$data = $this->request->data;
				$day = $data['Customer']['start'];
				//debug($day);
				$get_datas = $this->Customer->find('all',array(
					'recursive'=>-1,
					'order'=>array('Customer.created'=>'asc'),
					'conditions'=>array(
						'Customer.room_id'=>$data['Customer']['room_id'],
						'Customer.date'=>$data['Customer']['date']
						)
					));
				foreach($get_datas as $get_data){
					$starts = $get_data['Customer']['start'];
					$ends =$get_data['Customer']['end'];
					//debug($starts);
					//debug($day - $starts);

					if(($day >= $starts)&&($day <= $ends)){
						$kiemtra = false;
						//debug('fail');
					}
				}//
				if($kiemtra){
				//debug('ok');
					$this->Customer->create();
					if ($this->Customer->save($this->request->data)) {
						$this->Session->setFlash('Bạn đã đặt phòng thành công, chúng tôi sẽ liên hệ với bạn sau, xin cảm ơn',
							'default',array('class'=>'alert alert-info','note_save'));
						return $this->redirect(array('controller'=>'Rooms','action' => 'index'));
					} else {
						$this->Session->setFlash('Đặt phòng không thành công, hãy kiểm tra lại thông tin',
							'default',array('class'=>'alert alert-danger','note_save'));
					}
				}else{
					//debug('fail');
					$this->Session->setFlash('Giờ bạn chọn đã có','default',
						array('class'=>'alert alert-danger'),'er');
					return $this->redirect($this->referer());
				}
			}
			//debug($data);
			
		}
		//$this->redirect($this->referer());
	}
	/*public function test(){
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		}
		$rooms = $this->Customer->Room->find('list');
		$this->set(compact('rooms'));
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id=null){
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			/*if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}*/
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
		$rooms = $this->Customer->Room->find('list');
		$this->set(compact('rooms'));
	}
	public function edit($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			/*if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}*/
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
		$rooms = $this->Customer->Room->find('list');
		$this->set(compact('rooms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Session->setFlash('Xóa thành công.','default',array('class'=>'alert alert-info'),'deleCus');
		} else {
			$this->Session->setFlash(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'admin_index'));
	}
}
