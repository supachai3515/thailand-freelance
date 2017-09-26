<div id="login-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header" id="content-head">
					<h1>เข้าสู่ระบบ</h1>
				</div>
			</div>
		   	<div class="col-md-12">
		   		<div id="login-area">
		   			<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-login">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<a href="<?php  echo site_url(); ?>member/login" class="active" id="login-form-link">เข้าสู่ระบบ</a>
									</div>
									<div class="col-xs-6">
										<a href="<?php  echo site_url(); ?>register/" id="register-form-link">สมัครสมาชิก</a>
									</div>
								</div>
								<hr>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">

										<form id="login-form" action="<?php  echo site_url(); ?>member/signin" method="post" role="form" style="display: block;">
											<div class="form-group">
												<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
												<?php echo form_error('username', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
											</div>
											<div class="form-group">
												<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
												<?php echo form_error('password', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
											</div>



											<div class="form-group">
												<select class="form-control" name="member_type">
													<option value="1" <?php echo (set_value('member_type')=="1")?"selected":""; ?>>freelance</option>
													<option value="2" <?php echo (set_value('member_type')=="2")?"selected":""; ?>>owner</option>
												</select>
											</div>											




											<div class="form-group text-center">
												
											<?php echo form_checkbox('remember_me', 'value', set_checkbox('remember_me', 'value')); ?>
												<label for="remember"> อยู่ในระบบต่อไป</label>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-sm-6 col-sm-offset-3">
														<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="เข้าสู่ระบบ">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
														<div class="text-center">
															<a href="<?php  echo site_url(); ?>member/forgot" tabindex="5" class="forgot-password">ลืมรหัสผ่าน?</a>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		   		</div>
		   	</div>
		 </div>
	</div>
 </div>