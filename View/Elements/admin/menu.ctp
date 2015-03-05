<div class="list-group">
  <?php echo $this->Html->link('Quản lí phòng', array('controller' => 'rooms', 'action' => 'index'), array('class' => 'list-group-item list-group-item-success')); ?>
  <?php echo $this->Html->link('Thông tin đặt phòng', array('controller' => 'customers', 'action' => 'index'), array('class' => 'list-group-item list-group-item-success')); ?>
  <?php echo $this->Html->link('Tài khoản', array('controller' => 'users', 'action' => 'index'), array('class' => 'list-group-item list-group-item-success')); ?>
  <?php echo $this->Html->link('Sản phẩm', array('controller' => 'servives', 'action' => 'index'), array('class' => 'list-group-item list-group-item-success')); ?>
  <?php echo $this->Html->link('Thống kê', array('controller' => 'orders', 'action' => 'index'), array('class' => 'list-group-item list-group-item-success')); ?>
  <?php echo $this->Html->link('Liên hệ', '#', array('class' => 'list-group-item list-group-item-success')); ?>
</div>