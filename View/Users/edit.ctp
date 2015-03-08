<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Chỉnh sửa thông tin cá nhân</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('User'); ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>&nbsp</td>
	      	<td><?php echo $user['User']['username']; ?></td>
	      </tr>
	      <tr>
	      	<td>Số điện thoại</td>
	      	<td><?php echo $user['User']['phone']; ?></td>
	      </tr>
	      <tr>
	      	<td>Địa chỉ</td>
	      	<td><?php echo $user['User']['address']; ?></td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td><?php echo $user['User']['email']; ?></td>
	      </tr>
	    </tbody>
	  </table>
      </div>
    </div>
<div class="users form">

	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
