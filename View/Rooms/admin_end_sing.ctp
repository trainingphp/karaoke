<div class="panel panel-info">
	<div class="panel panel-heading">
		<h4 class="panel-title"><i class="glyphicon glyphicon-saved"></i> Tiền thời gian hát</h4>
	</div>
	<div class="panel panel-body">
		<!-- Tính tiền hát, thời gian hát -->
		<?php echo $this->Session->flash('sing'); ?>
		<?php if ($this->Session->check('payment')): ?>
			<p>Phòng số: <?php echo $this->Session->read('payment.id'); ?></p>
			<p>Thời gian bắt đầu: <?php echo $this->Session->read('payment.time_start'); ?></p>
			<p>Thời gian kết thúc: <?php echo $this->Session->read('payment.time_end'); ?></p>
			<p>Thời gian hát: <?php echo $this->Session->read('payment.time'); ?> h</p>
			<p>Thành tiền: <?php echo $this->Number->currency($this->Session->read('payment.total'), ' VND', array('places' => 0, 'wholePosition' => 'after')); ?></p>
		<?php else: ?>
			Phòng chưa được hát. Quay lại <?php echo $this->Html->link('quản lí phòng', '/admin'); ?>!
		<?php endif ?>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel panel-heading">
		<h4 class="panel-title"><i class="glyphicon glyphicon-saved"></i> Sử dụng dịch vụ</h4>
	</div>
	<div class="panel panel-body">
		<?php //pr($services); ?>
		<?php echo $this->Session->flash('service'); ?>
		<?php echo $this->Form->create('Order', array('action' => 'service_info', 'admin' => true, 'class' => "form-horizontal", 'inputDefaults' => array('label' => false, 'class' => "form-control"))); ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên dịch vụ</th>
					<th>Giá dịch vụ</th>
					<th>Chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php $stt = 1; ?>
				<?php foreach ($services as $service): ?>
					<tr>
						<td><?php echo $stt ++; ?></td>
						<td><?php echo $service['Service']['name']; ?></td>
						<td><?php echo $this->Number->currency($service['Service']['price'], ' VND', array('places' => 0, 'wholePosition' => 'after')) ?></td>
						<td><?php echo $this->Form->postLink('Sử dụng', '/admin/orders/add_service/'.$service['Service']['id'], array('class' => 'btn btn-primary', 'escape' => false)); ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<hr>
		<?php echo $this->Form->button('Nhập thông tin thanh toán', array('type' => 'submit', 'class' => "btn btn-primary pull-right")); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
