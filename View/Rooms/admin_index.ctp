<?php //echo pr($rooms); ?>
<div class="row">
<?php echo $this->Session->flash('sing'); ?>
	<?php foreach ($rooms as $key => $room): ?>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h5 class="panel-title">Phòng: <?php echo $room['Room']['name']; ?></h5>
				</div>
	    		<div class="panel-body">
	    			<p>Loại phòng: <?php echo $room['Type']['name']; ?></p>
	    			<p>Tầng: <?php echo $room['Room']['floor']; ?></p>
	    			<p>
	    				<?php if ($room['Room']['singing'] == 1): ?>
	    					<div class="alert alert-danger">Đang hát</div>
	    					<?php //echo $this->Form->create('Room'); ?>
	    						<?php echo $this->Form->postLink('Kết thúc', '/admin/rooms/end_sing/'.$room['Room']['id'], array('class' => 'btn btn-warning', 'escape' => false)); ?>
	    					<?php //echo $this->Form->end(); ?>
	    				<?php else: ?>
	    					<div class="alert alert-info">Có thể sử dụng</div>
	    					<?php //echo $this->Form->create('Room'); ?>
	    						<?php echo $this->Form->postLink('Bắt đầu hát', '/admin/rooms/start_sing/'.$room['Room']['id'], array('class' => 'btn btn-success', 'escape' => false)); ?>
	    					<?php //echo $this->Form->end(); ?>
	    				<?php endif ?>
	    			</p>
	    		</div>
	 		</div>
		</div>
	<?php endforeach ?>
</div>