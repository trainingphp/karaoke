<?php 
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			debug($this->request->data);
		$kt = true;
		//lay trong tin co trong db
		$info_db = $this->Customer->find('all',array(
			'recursive'=>-1
			));
		//debug($info_db);
		//$hour = null;
		$info_pick_room = $this->request->data;
		foreach($info_pick_room as $room){
			$starHour = $room['start']['hour'];
			$min = $room['start']['min'];
			$endHour = $room['end']['hour'];
		}
		foreach ($info_db as $check_info) {
			$starts = explode(":",$check_info['Customer']['start']);
			$end = explode(":",$check_info['Customer']['end']);
			if($starHour >= $starts[0] && $starHour < $end[0])
				{$kt = false;}
		}
		//debug($kt);
		if($kt == true && $endHour > $starHour){
			//debug($info_pick_room);
			//thuc hien add vao db
			$this->Customer->create();

			if ($this->Customer->save($info_pick_room)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		}else{
			debug('sai');
		}
	}
		$this->set(compact('rooms'));
		//$this->redirect($this->referer());
	}


 ?>



<div class="customers form">
<?php echo $this->Form->create('Customer',array('action'=>'add')); ?>
	<fieldset>
		<legend><?php echo __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('room_id',array('value'=>1,'type'=>'text'));
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('date');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('status',array('type'=>'text','value'=>0));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>