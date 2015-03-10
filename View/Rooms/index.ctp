<?php foreach($list_room as $room): ?>
<div class="col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Phòng số: <?php echo $room['Room']['name']; ?></h3>
    </div>
    <div class="panel-body">
    	<div class="thumbnail">
    	 	<p></p>
    	 	<p>Loại phòng: <?php echo $room['Type']['name'] ?></p>
    	 	<p>Giá phòng: <?php echo $room['Type']['price'] ?></p>
    	 	<p><?php echo $this->Form->postLink('Xem thông tin phòng','/customers/register_room/'.$room['Room']['id'],array('class'=>'btn btn-success')) ?></p>
    	</div>
    </div>
  </div>
</div>
<?php endforeach; ?>
