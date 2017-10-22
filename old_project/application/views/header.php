<header>
	<div class="container">
		<div class="row">
			 <div id="top-header">
			 	<div class="col-md-2">
				 	 <div id="top-logo">
				 	     <a href="<?php echo base_url(); ?>">
				 	 	    <img src="<?php echo base_url(); ?>assets/img/logo-thailand-freelance.png" class="img-responsive">
				 	 	</a>
				 	 </div><!-- top-logo -->
			 	 </div>
			 	 <div class="col-md-10">
			 	 	 <div id="top-menu">
			 	 	 	<div class="col-md-6">
				            <div id="search-job"> 
				                <div class="input-group stylish-input-group">
				                    <input type="text" class="form-control"  placeholder="ค้นหางานฟรีแลนซ์" >
				                    <span class="input-group-addon">
				                        <button type="submit">
				                            <span class="glyphicon glyphicon-search"></span>
				                        </button>  
				                    </span>
				                </div>
				            </div>
				        </div><!--col-md-6-->
				        <div class="col-md-6">
				        	<div id="top-btn" class="clearfix">
				        		<ul>
				        		<?php if($this->session->userdata('logged_in')): ?>
				        			<div id="login-menu">
					        			<div class="btn-group">
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    เมนูสมาชิก <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu">
								    <li>Username : <span><?php echo $this->session->userdata['logged_in']['login_name'];  ?></span></li>
								    <li>ประเภท :	<b><?php echo $this->session->userdata['logged_in']['member_type_name'];  ?></b></li>

								    <?php if ( $this->session->userdata['logged_in']['member_type']=="2"): ?>
								    <li role="separator" class="divider"></li>	  
								    <li><b>เมนูจัดการ โพสโปรเจ็ค :</b></li>
								    <li><a href="<?php echo base_url(); ?>register/project">กระกาศหางานฟรีแลนซ์</a></li>
								<?php endif; ?>
								    <li role="separator" class="divider"></li>
								    <li><b>เมนูจัดการทั่วไป :</b></li>

								    <?php if ( $this->session->userdata['logged_in']['member_type']=="1"): ?>
								    <li><a href="#">แก้ไขข้อมูลส่วนตัว</a></li>
								    
								    <li><a href="#">ค้นหาโปรเจ็ค</a></li>
								
								    <li><a href="#">ติดต่อสอบถาม</a></li>
								    <li><a href="#">เพิ่ม/แก้ไข ผลงานฟรีแลนซ์</a></li>
								    
									
									<!--
									<li><a href="#">แก้ไขรหัสผ่าน</a></li>
								    <li><a href="#">ชำระเงินค่าธรรมเนียม</a></li>
								    <li><a href="#">โปรเจ็คที่ท่านประมูล</a></li>
									<li><a href="#">ยืนยันตัวตน Verify</a></li>
									-->
								    <?php elseif ( $this->session->userdata['logged_in']['member_type']=="2"): ?>	

								    <li><a href="#">โพสข่าวประชาสัมพันธ์</a></li>
								    <li><a href="#">แก้ไขข้อมูลส่วนตัว</a></li>
									<li><a href="/find-freelance">ค้นหาฟรีแลนซ์</a></li>
									<!--
								    <li><a href="#">แก้ไขรหัสผ่าน</a></li>
								    <li><a href="#">โปรเจ็คที่ท่าน</a></li>
									-->
								    


								<?php endif; ?>
								  </ul>
								</div>
							</div>
							<ul>
					        			<li><a href="<?php echo base_url(); ?>member/logout" class="btn btn-info" id="btn-logout">ออกจากระบบ</a></li>
					        		</ul>
				        		<?php else: ?>	
				        			<li><a href="<?php echo base_url(); ?>register" class="btn btn-info" id="btn-register">สมัครสมาชิก</a></li>
				        			<li><a href="<?php echo base_url(); ?>member/login" class="btn btn-success" id="btn-login">เข้าสู่ระบบ</a></li>
				        		<?php endif; ?>	
				        		</ul>
				        	</div>
				        </div><!--col-md-8-->
			 	 	 </div><!-- top-menu -->
			 	 </div>
			 </div><!-- top-header -->
		 </div>
	</div><!-- container -->
</header>