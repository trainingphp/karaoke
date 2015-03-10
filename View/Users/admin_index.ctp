<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin User</h3>
      </div>
      <div class="panel-body">
      <h3><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></h3>
      <?php echo $this->Session->flash('exitUser'); ?>
      <?php echo $this->Session->flash('noteEdit'); ?>
      <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>STT</th>
	        <th>Group</th>
	        <th>Username</th>
	        <th>Phone</th>
	        <th>Email</th>
	        <th>Address</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $i = 0; foreach ($users as $user): $i++;?>
	      <tr>
	        <td><?php echo $i; ?></td>
	        <td><?php echo $user['Group']['name']; ?></td>
	        <td><?php echo h($user['User']['username']); ?></td>
	        <td><?php echo h($user['User']['phone']); ?></td>
	        <td><?php echo h($user['User']['email']); ?></td>
	        <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
	        <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	      </tr>
	     <?php endforeach; ?>
	    </tbody>
	  </table>
      </div>
    </div>
