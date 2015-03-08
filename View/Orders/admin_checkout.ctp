<?php //pr($this->request->data); ?>
<div>
	<div>
		<h4></i> <a href="http://localhost/karaoke/admin/">In hóa đơn</a></h4>
	</div>
	<div>
		<?php if (isset($data) && !empty($data)): ?>
				<div>
					<h4>Thông tin khách hàng</h4>
					<p>Khách hàng: <?php echo json_decode($data['customer_info'])->name; ?></p>
					<p>Điện thoại: <?php echo json_decode($data['customer_info'])->phone; ?></p>
					<p>Email: <?php echo json_decode($data['customer_info'])->email; ?></p>
					<p>Địa chỉ: <?php echo json_decode($data['customer_info'])->address; ?></p>
				</div>
				<div>
					<div>
						<div>
							<strong>Thông tin phòng:</strong>
							<p>Phòng số: <?php echo json_decode($data['order_info'])->id; ?></p>
							<p>Thời gian bắt đầu: <?php echo json_decode($data['order_info'])->time_start; ?></p>
							<p>Thời gian kết thúc: <?php echo json_decode($data['order_info'])->time_end; ?></p>
							<p>Thời gian hát: <?php echo json_decode($data['order_info'])->time; ?> h</p>
						</div>
						<div>
							<strong>Thông tin dịch vụ</strong>
							<?php $service = json_decode($data['service_info']); ?>
							<?php
							$stt = 1;
							foreach ($service as $s): ?>
								<p><?php echo $stt++; ?> - Tên: <?php echo $s->name; ?> - Giá: <?php echo $s->price; ?>/1 sản phẩm - Số lượng: <?php echo $s->quantity; ?></p>
								<br>
							<?php endforeach ?>
						</div>
					</div>
					<div>
						Tổng tiền thanh toán: <strong><?php echo $this->Number->currency(json_decode($data['order_info'])->total, ' VND', array('places' => 0, 'wholePosition' => 'after')); ?></strong>
					</div>
				</div>
		<?php else: ?>
			Thông tin thanh toán rỗng!
		<?php endif ?>
		<br>
		<?php echo $this->Session->flash('order'); ?>
	</div>
</div>