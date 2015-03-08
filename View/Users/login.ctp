<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title"><i class="glyphicon glyphicon-user"></i> Đăng nhập</h4>
	</div>
	<div class="panel-body">
	<?php if (empty($user_info)): ?>
		<p><b class="star">(*)</b>: Thông tin bắt buộc</p>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->element('errors'); ?>
			<?php echo $this->Form->create('User', array('class' => "form-horizontal", 'novalidate' => true, 'inputDefaults' => array('label' => false, 'class' => 'form-control', 'error' => false))); ?>
			  <div class="form-group">
			    <label for="inputUsername" class="col-sm-2 control-label">Tài khoản <b class="star">(*)</b></label>
			    <div class="col-sm-10">
			      <?php echo $this->Form->input('username', array('placeholder' => 'Tên đăng nhập')); ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword" class="col-sm-2 control-label">Mật khẩu <b class="star">(*)</b></label>
			    <div class="col-sm-10">
			       <?php echo $this->Form->input('password', array('placeholder' => 'Mật khẩu')); ?>
			    </div>
			  </div>
			  <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Ghi nhớ đăng nhập
                    </label>
                  </div>
                </div>
              </div>
			  <hr>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <?php echo $this->Form->button('Đăng nhập', array('type' => "submit", 'class' => "btn btn-primary")); ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="" class="col-sm-2 control-label"></label>
			    <div class="col-sm-10">
			       <?php echo $this->Html->link('Quên mật khẩu?', '/quen-mat-khau'); ?>
			    </div>
			  </div>
			<?php echo $this->Form->end(); ?>
	<?php else: ?>
		Bạn đã đăng nhập. Quay lại <?php echo $this->Html->link('trang chủ', '/'); ?>!
	<?php endif ?>
	</div>	
</div>