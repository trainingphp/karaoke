<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">Chi tiết hóa đơn</h4>
	</div>
	<div class="panel-body">
		<?php if (!empty($order)): ?>
			<?php foreach ($order as $item): ?>
				<div>
					<h4>Thông tin khách hàng</h4>
					<p>Khách hàng: <?php echo json_decode($item['customer_info'])->name; ?></p>
					<p>Điện thoại: <?php echo json_decode($item['customer_info'])->phone; ?></p>
					<p>Email: <?php echo json_decode($item['customer_info'])->email; ?></p>
					<p>Địa chỉ: <?php echo json_decode($item['customer_info'])->address; ?></p>
				</div>
				<hr>
				<div>
					<h4>Thông tin hóa đơn</h4>
					<div class="col">
						<div class="col col-lg-6">
							<strong>Thông tin phòng:</strong>
							<p>Phòng số: <?php echo json_decode($item['order_info'])->id; ?></p>
							<p>Thời gian bắt đầu: <?php echo json_decode($item['order_info'])->time_start; ?></p>
							<p>Thời gian kết thúc: <?php echo json_decode($item['order_info'])->time_end; ?></p>
							<p>Thời gian hát: <?php echo json_decode($item['order_info'])->time; ?> h</p>
						</div>
						<div class="col col-lg-6">
							<strong>Thông tin dịch vụ</strong>
							<?php $service = json_decode($item['service_info']); ?>
							<?php //pr($service); ?>
							<?php foreach ($service as $s): ?>
								<p>Tên: <?php echo $s->name; ?></p>
								<p>Giá: <?php echo $s->price; ?>/1 sản phẩm</p>
								<p>Số lượng: <?php echo $s->quantity; ?></p>
								<hr>
							<?php endforeach ?>
						</div>
					</div>
					<div>
						Tổng tiền thanh toán: <strong><?php echo $this->Number->currency(json_decode($item['order_info'])->total, ' VND', array('places' => 0, 'wholePosition' => 'after')); ?></strong>
					</div>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<p>Hóa đơn này không tồn tại!</p>
		<?php endif ?>
	</div>
</div>