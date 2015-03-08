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
	<?php //pr($service); ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên dịch vụ</th>
					<th>Giá dịch vụ</th>
					<th>Số lượng</th>
				</tr>
			</thead>
			<tbody>
				<?php $stt = 1; ?>
				<?php foreach ($service as $item): ?>
					<tr>
						<td><?php echo $stt ++; ?></td>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $this->Number->currency($item['price'], ' VND', array('places' => 0, 'wholePosition' => 'after')) ?></td>
						<td>
							<?php echo $this->Form->create('Order', array('action' => 'update/'.$item['id'], 'admin' => true, 'class' => 'form-inline')); ?>
								<?php echo $this->Form->input('quantity', array('label' => false, 'div' => false, 'class' => 'form-control', 'value' => $item['quantity'])); ?>
								<?php echo $this->Form->button('Cập nhật', array('type' => 'submit', 'class' => 'btn btn-link')); ?>
							<?php echo $this->Form->end(); ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="glyphicon glyphicon-user"> Thanh toán</i></h4>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('Order', array('action' => 'checkout', 'admin' => true, 'class' => "form-horizontal", 'inputDefaults' => array('label' => false, 'class' => "form-control"))); ?>
		<h4>Thông tin khách hàng</h4>
					  <div class="form-group">
					    <label for="inputFullname" class="col-sm-2 control-label">Tên</label>
					    <div class="col-sm-10">
					      <?php echo $this->Form->input('name', array('placeholder' => 'Tên khách hàng')); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <?php echo $this->Form->input('email', array('placeholder' => 'Nhập Email')); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputAddress" class="col-sm-2 control-label">Địa chỉ</label>
					    <div class="col-sm-10">
					      <?php echo $this->Form->input('address', array('placeholder' => 'Nhập địa chỉ')); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPhone" class="col-sm-2 control-label">Điện thoại</label>
					    <div class="col-sm-10">
					      <?php echo $this->Form->input('phone', array('placeholder' => 'Nhập số điện thoại')); ?>
					    </div>
					  </div>
					  <hr>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <?php echo $this->Form->button('Tính tiền', array('type' => 'submit', 'class' => "btn btn-primary pull-right")); ?>
					    </div>
					  </div>
					<?php echo $this->Form->end(); ?>
	</div>
</div>