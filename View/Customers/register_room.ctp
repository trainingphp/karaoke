<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Chon ngày đặt</h3>
      </div>
      <div class="panel-body">
        <?php echo $this->Form->create('Customer'); ?>
        <?php echo $this->Session->flash('check_day'); ?>
        <?php echo $this->Form->input('id',array('value'=>$id,'hiden'=>true,'label'=>false)) ?>
        <?php echo $this->Form->input('date',array('type'=>'text','placeholder'=>'Nam-thang-ngay','label'=>'')); ?><br>
        <?php echo $this->Form->button('Xem giờ trống',array('type'=>'submit','label'=>false,'class'=>'btn btn-info')); ?>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>



<div class="col-md-8">
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin về phòng</h3>
      </div>
      <div class="panel-body">
          <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Ngày đặt</th>
        <th>Bắt đầu</th>
        <th>Kết thúc</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($room_info)): $i = 1;?>
      <?php //debug($room_info); ?>
      <?php //debug($errors); ?>
      <?php foreach ($room_info as $info): ?>       
      <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $info['Customer']['name'] ?></td>
        <td><?php echo $info['Customer']['date'] ?></td>
        <td><?php echo $info['Customer']['start'] ?></td>
        <td><?php echo $info['Customer']['end'] ?></td>
      </tr>
      <?php endforeach ?>
    <?php else: ?>
      <h4>Chưa có lịch hẹn nào!</h4>
    <?php endif; ?>
    </tbody>
  </table>        
      </div>
    </div>
	
</div>
<div class="col-md-4">
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Chọn giờ hát</h3>
      </div>
      <div class="panel-body">
        <?php echo $this->Form->create('Customer',array('action'=>'add')); ?>
  <table class="table table-condensed">
        <p>Người đặt phòng:
        <?php echo $this->Form->input('name',array('type'=>'text','placeholder'=>'Tên liên hệ','label'=>false)); ?>
      </p>
      <p>Số phòng:
        <?php echo $this->Form->input('room_id',array('value'=>$id,'label'=>false,'type'=>'text','readonly'=>true)); ?></p><p>
        <?php echo $this->Session->flash('er'); ?>
        Thời gian bắt đầu
        <?php echo $this->Form->input('start',array('label'=>false,'type'=>'number','placeholder'=>'vd: 9 hoặc 17')); ?></p>
        <p>
        Thời gian kết thúc:
        <?php echo $this->Form->input('end',array('label'=>false,'type'=>'number','placeholder'=>'vd: 10 hoặc 20')); ?>
        </p>
        <P>Địa chỉ:
          <?php echo $this->Form->input('address',array('label'=>'')); ?>
        </P>
        <p>
        Số điện thoại:
        <?php echo $this->Form->input('phone',array('label'=>false)); ?>
        </p>
        <?php?>
        <?php if(!empty($choose_day)): ?>
      <p>Ngày đặt phòng:
      
      <?php echo $this->Form->input('date',array('value'=>$choose_day,'label'=>'','type'=>'text','readonly')); ?>    
      </p>
      <?php endif; ?>
      <p>
      <?php echo $this->Form->input('status',array('label'=>'','value'=>0,'hidden'=>true,'readonly')); ?>
      </p>
        <?php echo $this->Form->button('Dat phong',array('type'=>'submit','class'=>'btn btn-info')); ?>
      
  </table>
  <?php echo $this->Form->end(); ?>
      </div>
    </div>
	<h3></h3>
	<?php //echo $this->Session->flash('comfir_day'); ?>
	
</div>