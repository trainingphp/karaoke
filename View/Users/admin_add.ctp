
<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Tạo mới User</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Session->flash('exitUser'); ?>
      <?php echo $this->Form->create('User',array()); ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Tên đăng nhập</td>
	      	<td><?php echo $this->Form->input('username',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Mật khẩu</td>
	      	<td><?php echo $this->Form->input('password',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Vai trò</td>
	      	<td><?php echo $this->Form->input('group_id',array('label'=>false)); ?></td>
	      </tr>
	      <tr>
	      	<td>Số điện thoại</td>
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
	      	<td><?php echo $this->Form->input('Đăng ký',array('label'=>false,'type'=>'submit','class'=>'btn btn-info')); ?></td>
	      </tr>
	    </tbody>
	  </table>
	  <?php echo $this->Form->end(); ?>
      </div>
    </div>
