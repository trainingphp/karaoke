<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin đặt phòng của khách hàng</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('Customer',array('action'=>'admin_add')); ?>
      <?php echo $this->Form->input('id',array('type'=>'text','value'=>$customer['Customer']['id'],'label'=>false,'hidden'=>true)); ?>
  <table class="table">
    <tbody>
      <tr>
      	<td>Tên khách hàng</td>
      	<td><?php echo $this->Form->input('name',array('value'=>$customer['Customer']['name'],'label'=>false)); ?></td>
      </tr>
      <tr>
      	<td>Số phòng</td>
      	<td><?php echo $this->Form->input('room_id',array('type'=>'text','value'=>$customer['Customer']['room_id'],'label'=>false)); ?></td>
      </tr>
      <tr>
      	<td>Thời gian bắt đầu</td>
      	<td><?php echo $this->Form->input('start',array('label'=>false,'value'=>$customer['Customer']['start'])); ?></td>
      </tr>
      <tr>
      	<td>Tên gian kết thúc</td>
      	<td><?php echo $this->Form->input('start',array('label'=>false,'value'=>$customer['Customer']['end'])); ?></td>
      </tr>
      <tr>
      	<td>Địa chỉ</td>
      	<td><?php echo $this->Form->input('address',array('label'=>false,'value'=>$customer['Customer']['name'])); ?></td>
      </tr>
      <tr>
      	<td>Số điện thoại</td>
      	<td><?php echo $this->Form->input('phone',array('label'=>false,'value'=>$customer['Customer']['phone'])); ?></td>
      </tr>
      <tr>
      	<td></td>
      	<td><?php echo $this->Form->input('status',array('label'=>false,'value'=>$customer['Customer']['status'],'hidden'=>true)); ?></td>
      </tr>
    </tbody>
  </table>
  	<?php echo $this->Form->input('status',array('label'=>false,'value'=>$customer['Customer']['status'],'hidden'=>true)); ?>
  	<?php echo $this->Form->button('Lưu',array('class'=>'btn btn-info')) ?>
  <?php echo $this->Form->end(); ?>
      </div>
    </div>
<div class="customers view">
	
</div>

