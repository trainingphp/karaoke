<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin đặt phòng</h3>
      </div>
      <?php //echo $this->Session->flash('updata_status'); ?>
      <div class="panel-body">
        <table class="table table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	
	<?php $i = 0;
	foreach ($customers as $customer): $i++;?>
	<tr>
		<td><?php echo $i; ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $customer['Room']['id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['date']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['start']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['end']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['created']); ?>&nbsp;</td>
		<td><?php 
			echo $this->Form->create('Customer',array('action'=>'update_status','class'=>'form-inline'));
			echo $this->Form->input('id',array('label'=>'','value'=>$customer['Customer']['id']));
			if($customer['Customer']['status'] == 1){
				echo $this->Form->input('status',array('type'=>'checkbox','label'=>'','checked'));	
			}else{
				echo $this->Form->input('status',array('type'=>'checkbox','label'=>''));
			}
			
			echo $this->Form->button('Cập nhật',array('type'=>'submit'));
			echo $this->Form->end();
		?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), array(), __('Bạn muốn xóa khách hàng này # %s?', $customer['Customer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
      </div>
    </div>

<div class="customers index">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

