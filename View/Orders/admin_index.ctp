<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">Hóa đơn</h4>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('Order', array('action' => 'index', 'admin' => true, 'class' => 'form-inline', 'inputDefaults' => array('div' => false, 'label' => false, 'class' => 'form-control'))); ?>
			Từ ngày: <?php echo $this->Form->input('start'); ?> 
			Đến ngày: <?php echo $this->Form->input('end'); ?> 
			<?php echo $this->Form->button('xem', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>

		<hr>
		<?php echo $this->Session->flash('order'); ?>
		<?php if (!empty($orders)): ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Khách hàng</th>
						<th>Thời gian</th>
						<th>Phòng</th>
						<th>Thanh toán</th>
						<th colspan="2">Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stt = 1; 
						$total = 0;
					?>
					<?php foreach ($orders as $order): ?>
						<tr>
							<td><?php echo $stt++; ?></td>
							<td><?php echo json_decode($order['Order']['customer_info'])->name; ?></td>
							<td><?php echo $this->Time->format('d-m-y H:i:s', $order['Order']['created'], null, 'Asia/Ho_Chi_Minh'); ?></td>
							<td><?php echo $order['Order']['room_id']; ?></td>
							<td><?php echo $this->Number->currency(json_decode($order['Order']['order_info'])->total, ' VND', array('places' => 0, 'wholePosition' => 'after')); ?></td>
							<td><?php echo $this->Html->link('Chi tiết', array('action' => 'view', $order['Order']['id'], 'admin' => true)); ?></td>
							<td><?php echo $this->Form->postLink('Xóa', array('action' => 'delete', $order['Order']['id'], 'admin' => true)); ?></td>
						</tr>
						<?php $total += json_decode($order['Order']['order_info'])->total; ?>
					<?php endforeach ?>
					<tr>
						<td><strong>Tổng</strong></td>
						<td></td>
						<td></td>
						<td></td>
						<td><strong><?php echo $this->Number->currency($total, ' VND', array('places' => 0, 'wholePosition' => 'after')) ?></strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php else: ?>
			Chưa có hóa đơn nào!
		<?php endif ?>
		
	</div>
</div>