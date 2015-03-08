<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin User</h3>
      </div>
      <div class="panel-body">
      <h3><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?></h3>
      <?php echo $this->Session->flash('exitUser'); ?>
      <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>STT</th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $i = 0; foreach ($services as $service): $i++;?>
	<tr>
		<td><?php echo $i; ?>&nbsp;</td>
		<td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['price']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $service['Service']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['Service']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $service['Service']['id']), array(), __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	    </tbody>
	  </table>
      </div>
    </div>
