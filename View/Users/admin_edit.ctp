   <?php //debug($info_user); ?>
<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Chỉnh sửa User</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('User',array('action'=>'admin_edit')); ?>
      <?php echo $this->Form->input('id',array('value'=>$info_user['User']['id'])); ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Vai trò</td>
	      	<td><?php echo $this->Form->input('group_id',array('label'=>false,'hiddens'=>true,'value'=>$info_user['User']['group_id'])); ?></td>
	      </tr>
	      <tr>
	      	<td>Username</td>
	      	<td><?php echo $this->Form->input('username',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Phone</td>
	      	<td><?php echo $this->Form->input('phone',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td><?php echo $this->Form->input('email',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Địa chỉ</td>
	      	<td><?php echo $this->Form->input('address',array('label'=>false)); ?></td>
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
 