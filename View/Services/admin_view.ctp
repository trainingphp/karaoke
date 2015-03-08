<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin dịch vụ</h3>
      </div>
      <div class="panel-body">
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Tên</td>
	      	<td><?php echo h($service['Service']['name']); ?>
			&nbsp;</td>
	      </tr>
	      <tr>
	      	<td>Mô tả</td>
	      	<td><?php echo h($service['Service']['description']); ?>
			&nbsp;</td>
	      </tr>
	      <tr>
	      	<td>Giá</td>
	      	<td><?php echo h($service['Service']['price']); ?>
			&nbsp;</td>
	      </tr>
	    </tbody>
	  </table>
      </div>
    </div>