<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin User</h3>
      </div>
      <div class="panel-body">
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Tên</td>
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