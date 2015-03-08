   <?php //debug($info_server); ?>
<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Chỉnh sửa dịch vụ</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('Service',array('action'=>'admin_edit')); ?>
      <?php echo $this->Form->input('id',array('value'=>$info_server['Service']['id'])); ?>
        <table class="table">
	    <tbody>
	      
	      <tr>
	      	<td>Tên dịch vụ</td>
	      	<td><?php echo $this->Form->input('name',array('label'=>false,'value'=>$info_server['Service']['name'])); ?></td>
	      </tr>
	      <tr>
	      	<td>Mô tả</td>
	      	<td><?php echo $this->Form->input('description',array('label'=>false,'value'=>$info_server['Service']['description'])); ?></td>
	      </tr>
	      <tr>
	      	<td>Giá dịch vụ</td>
	      	<td><?php echo $this->Form->input('price',array('label'=>false,'value'=>$info_server['Service']['price'])); ?></td>
	      </tr>
	      <tr>
	      	<td>&nbsp</td>
	      	<td><?php echo $this->Form->input('Lưu chỉnh sửa',array('type'=>'submit','class'=>'btn btn-info','label'=>false)); ?></td>
	      </tr>
	    </tbody>
	  </table>
	  <?php echo $this->Form->end(); ?>
      </div>
    </div>