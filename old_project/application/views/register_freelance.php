<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
            $(function() {
	 $('#chk_avail').click(function() {
                   	 var name = $('#login_name').val();
                   	 var name_regex = /^[a-zA-Z0-9]+$/;
                 	 if ((name.length >= 2)  && (name.match(name_regex))){
			$.post('<?php echo base_url(); ?>register/check_user/?r='+ Math.floor(Math.random()*1000), {usr_name: name}, function(d) {
				if (d == "1") {
					$('#msgbx_success').css('display', 'none');
					$('#msgbx_null_err').css('display', 'none');
					$('#msgbx_err').css('display', 'block');
				}else {
					$('#msgbx_err').css('display', 'none');
					$('#msgbx_null_err').css('display', 'none');
					$('#msgbx_success').css('display', 'block');
				}
			});
                  	}else{
			$('#msgbx_success').css('display', 'none');
			$('#msgbx_err').css('display', 'none');
			$('#msgbx_null_err').css('display', 'block');
                  	 }
                });

                $('#chk_avail_email').click(function() {
                    	var email = $('#email').val();
                    	var emailRegEx = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                      	if ((email.length >= 5)  && (emailRegEx.test(email))){
                    		$.post('<?php echo base_url(); ?>register/check_email/?r='+ Math.floor(Math.random()*1000), {usr_email: email}, function(d) {
				if (d == "1") {
					$('#msgbx_email_success').css('display', 'none');
					$('#msgbx_email_null_err').css('display', 'none');
					$('#msgbx_email_err').css('display', 'block');
				}else {
					$('#msgbx_email_err').css('display', 'none');
					$('#msgbx_email_null_err').css('display', 'none');
					$('#msgbx_email_success').css('display', 'block');
				}
                   		 });
                 	 }else{
			$('#msgbx_email_err').css('display', 'none');
			$('#msgbx_email_success').css('display','none');
			$('#msgbx_email_null_err').css('display', 'block');
                  	 }                    
                });

                $('#btn-cancel').click(function() {
                  	$(location).attr('href',"<?php echo base_url(); ?>register/freelance");
                });
               

            });
</script>
        <style type="text/css">
            .alert-box { color:#555; border-radius:10px; font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px; padding:10px 10px 10px 36px; margin:10px; } 
            .alert-box span { font-weight:bold; text-transform:uppercase; } 
            .error { background:#ffecec; border:1px solid #f5aca6; } 
            .success { background:#e9ffd9; border:1px solid #a6ca8a; } 
            #msgbx_err{ display: none; } 
            #msgbx_null_err{ display: none; }   
            #msgbx_email_null_err{ display: none; } 
            #msgbx_success{ display: none; } 
            #msgbx_email_err{ display: none; } 
            #msgbx_email_success{ display: none; }    
             

        </style>
<div id="register-freelance-page">
		   		<div class="container">
		   			<div class="row">
		   				<div class="col-md-12">
		   					<div class="page-header" id="content-head">
		   						<h1>สมัครสมาชิก - Freelance</h1>
		   						<p>กรุณากรอกข้อมูลข้างล่างให้ครบถ้วน</p>
		   					</div>
		   				</div>
		   				<div class="col-md-12">
		   					<div id="regis-form-area">
		   						<form action="<?php echo base_url(); ?>register/freelance" class="form-horizontal" method="post"  enctype="multipart/form-data">
		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">ชื่อ-นามสกุล <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="text" name="member_name"  class="form-control" value="<?php echo set_value('member_name'); ?>">
		   									<?php echo form_error('member_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->
										
									<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">หมายเลขประจำตัวประชาชน <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="text" name="idcard" class="form-control" value="<?php echo set_value('idcard'); ?>">
		   									<?php echo form_error('idcard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">นามแฝง (username) <span>*</span></label>
		   								<div class="col-sm-8">
		   									<input type="text"  name="login_name" id="login_name" class="form-control" placeholder="* ห้ามใช้ภาษาไทย"  value="<?php echo set_value('login_name'); ?>">
		   									<?php echo form_error('login_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
											<div id="msgbx_err" class="alert-box error"><span>ผิดพลาด: </span>ไม่สามารถใช้นามแฝงนี้ได้</div>
											<div id="msgbx_null_err" class="alert-box error"><span>ผิดพลาด: </span>กรุณากรอกนามแฝง</div>
											<div id="msgbx_success" class="alert-box success"><span>สำเร็จ: </span>สามารถใช้ชื่อนามแฝงนี้ได้</div>

		   								</div>
		   								<br class="br">
		   								<div class="col-sm-2">
		   									<button type="button" id="chk_avail" class="btn btn-primary" >ตรวจสอบขื่อนามแฝง</button>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-xs-2 control-label">เพศ</label>
		   								<div class="col-xs-10">
		   									<label class="radio-inline">
											  <input type="radio" name="sex" id="sex1" value="1" <?php echo (set_value('sex')=="1")?"checked":""; ?>> ชาย
											</label>
											<label class="radio-inline">
											  <input type="radio" name="sex" id="sex2" value="2" <?php echo (set_value('sex')=="2")?"checked":""; ?>> หญิง
											</label>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">อายุ <span>*</span></label>
		   								<div class="col-sm-10">
		   									<div class="input-group">
										      <input type="text" name="age" class="form-control" value="<?php echo set_value('age'); ?>">
										      <div class="input-group-addon">ปี</div>
										    </div>
										    <?php echo form_error('age', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
					                    <label for="Project-type" class="col-sm-2 control-label">ประเภท Freelance</label>
					                    <div class="col-sm-10">
					                      <select class="form-control" name="freelance_typeid">
					                          <?php if ($category_list): ?>
					                          		<?php foreach($category_list as $cat_id=>$cat_name): ?>
					                          			<option value="<?php echo $cat_id; ?>" <?php echo (set_value('freelance_typeid')==$cat_id)?"selected":""; ?>><?php echo $cat_name; ?></option>
					                          		<?php endforeach; ?>	
					                          <?php endif; ?>
					                      </select>
					                    </div>
					                </div><!--form-group-->
					                <div class="form-group">
		   								<label for="" class="col-sm-2 control-label">บริษัท</label>
		   								<div class="col-sm-10">
		   									<input type="text" name="freelance_companyname" class="form-control" value="<?php echo set_value('freelance_companyname'); ?>">
		   								</div>
		   							</div><!--form-group-->
		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">ที่อยู่ <span>*</span></label>
		   								<div class="col-sm-10">
		   									<textarea rows="5" name="address" class="form-control"><?php echo set_value('address'); ?></textarea>
		   									<?php echo form_error('address', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
					                    <label for="Project-type" class="col-sm-2 control-label">จัดหวัด <span>*</span></label>
					                    <div class="col-sm-10">
					                      <select name="city" class="form-control">
							<option value="">เลือกจังหวัด</option>

							<?php if ($provinces): ?>
								<?php foreach($provinces as $key=>$val): ?>
									<option value="<?php echo $key; ?>" <?php echo (set_value('city')==$key)?"selected":""; ?>><?php echo $val; ?></option>    
								<?php endforeach; ?>	
							<?php endif; ?>

					                      </select>
					                      <?php echo form_error('city', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
					                    </div>
					                </div><!--form-group-->

					               			 <div class="form-group">
		   								<label for="" class="col-sm-2 control-label">รหัสไปรษณีย์ <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="text" name="postcode" class="form-control" value="<?php echo set_value('postcode'); ?>">
		   									<?php echo form_error('postcode', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">โทรศัพท์ <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
		   									<?php echo form_error('phone', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">โทรศัพท์มือถือ <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile'); ?>">
		   									<?php echo form_error('mobile', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">โทรสาร</label>
		   								<div class="col-sm-10">
		   									<input type="text" name="fax" class="form-control" value="<?php echo set_value('fax'); ?>">
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">อีเมล์ (Email) <span>*</span></label>
		   								<div class="col-sm-8">
		   									<input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
		   									<?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
											<div id="msgbx_email_err" class="alert-box error"><span>ผิดพลาด: </span>ไม่สามารถใช้อีเมล์นี้ได้</div>
											<div id="msgbx_email_null_err" class="alert-box error"><span>ผิดพลาด: </span>กรุณากรอกอีเมล์</div>
											<div id="msgbx_email_success" class="alert-box success"><span>สำเร็จ: </span>สามารถใช้อีเมล์นี้ได้</div>				
		   								</div>
		   								<br class="br">
		   								<div class="col-sm-2">
		   									<button type="button" class="btn btn-primary" id="chk_avail_email">ตรวจสอบชื่ออีเมลล์</button>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">รหัสผ่าน <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
		   									<?php echo form_error('password', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">ยืนยันรหัสผ่าน <span>*</span></label>
		   								<div class="col-sm-10">
		   									<input type="password" name="password2" class="form-control" value="<?php echo set_value('password2'); ?>">
		   									<?php echo form_error('password2', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
					                    <label for="Project-type" class="col-sm-2 control-label">ความสามารถเฉพาะตัว <span>*</span></label>
					                    <div class="col-sm-10">
						<?php if ($knowhow_list): ?>
						<?php foreach($knowhow_list as $freelance_category_list=>$freelance_category_listname): ?>
					                      <div class="col-sm-3 col-xs-6">
					                        <label class="checkbox-inline">
					                          <input type="checkbox" name="knowhow[]"  value="<?php echo $freelance_category_list; ?>" <?php echo set_checkbox('knowhow[]', $freelance_category_list, false); ?>> <?php echo $freelance_category_listname; ?>
					                        </label>
					                      </div>
					               <?php endforeach; ?>       	
					             	<?php endif; ?>					             							             				                  
					                    </div>
					                    <?php echo form_error('knowhow[]', '<div class="clear"></div><div class="alert alert-danger contact-warning">', '</div>'); ?>					                    						                   
					                  </div><!--form-group-->
					                  <div class="form-group">
		   								<label for="" class="col-sm-2 control-label">รายละเอียดส่วนตัว</label>
		   								<div class="col-sm-10">
		   									<textarea rows="5" name="personalportfolio" class="form-control"><?php echo set_value('personalportfolio'); ?></textarea>
		   								</div>
		   								<label for="" class="col-sm-2 control-label"></label>
		   								<div class="col-sm-10">
		   									<span>กรุณาไม่กรอกที่อยู่ หรือที่ติดต่อ มิฉะนั้นชื่อบัญชีของคุณจะถูกยกเลิกทันที</span>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">ประวัติผลงาน/ความสามารถอื่นๆ</label>
		   								<div class="col-sm-10">
		   									<textarea rows="5" name="knowhow_special" class="form-control"><?php echo set_value('knowhow_special'); ?></textarea>
		   								</div>
		   							</div><!--form-group-->

		   							<div class="form-group">
		   								<label for="" class="col-sm-2 control-label">Upload Logo (Not over 10 Kbs.)</label>
		   								<div class="col-sm-10">
		   									<label class="btn btn-default btn-file">
											    เลือกไฟล์ <input type="file" name="flogo">
											</label>
		   								</div>
		   							</div><!--form-group-->

		   							<div id="project-post-submit">
				                      <button type="submit" id="btn-submit" class="btn btn-success">สมัครสมาชิก</button>
				                      <button type="button" id="btn-cancel" class="btn btn-danger">ล้างข้อมูล</button>
				                    </div>
		   						</form>
		   					</div>
		   				</div>
		   			</div>
		   			<div class="row">
		   				<div class="col-md-12">
		   					<div id="warning-panel">
			   					<div class="panel panel-warning">
				                    <div class="panel-heading">ข้อแนะนำในการจ้างงาน และรับงาน</div>
				                    <div class="panel-body">
				                        <p>
				                        	1. การตกลงทำงานทุกครั้งควรมีการ "นัดเจอตัว" และ "ต้องทำหนังสือสัญญา" ทุกครั้ง ต้องขอสำเนาบัตรประชาชน สำเนาทะเบียนบ้าน เพื่อสามารถแจ้งความได้หากถูกโกง <span><a href="#">ดาวน์โหลดหนังสือสัญญา</a></span> 
				                        </p>
				                        <p>
				                        	2. หากอีกฝ่ายบ่ายเบี่ยงไม่ทำหนังสือสัญญา ให้พึงระลึกว่าอาจจะถูกโกงได้
				                        </p>
				                        <p>
				                        	3. ไม่ควรส่งงานทั้งหมด หรืองานส่วนสำคัญไปให้กับผู้ว่าจ้างก่อนที่จะได้รับเงิน หรือไม่ควรโอนเงินค่าจ้างไปให้กับผู้รับทำงานทั้งหมด ก่อนที่จะมีการรับส่งงานทั้งหมด หรือบางส่วน (ตามที่ระบุไว้ในหนังสือสัญญา)
				                        </p>
				                        <p>
				                        	4. การติดต่อกันด้วย อีเมล์ หรือ โทรศัพท์ เพียงอย่างเดียว และ ไม่ทำหนังสือสัญญา เสี่ยงที่อาจจะถูกโกงมากที่สุด
				                        </p>
				                        <p>
				                        	5. หากคาดว่าจะถูกโกง กรุณาอีเมล์แจ้งมาที่ <span><a href="#">support@ddcovey.co.th</a></span> ทางทีมงานจะนำข้อความของท่านแจ้งไปยังผู้ถูกกล่าวหา และหากผู้ถูกกล่าวหาไม่ส่งอีเมล์ชี้แจงภายใน 3 วัน ทาง Jobbid.in.th จะเพิ่มชื่อของคนๆนั้นลงใน <span><a href="#">ระบบเฝ้าระวังของทางเวบไซต์</a></span> และยกเลิกการใช้งานจนกว่าผู้ถูกกล่าวหาจะอธิบายกับทางคู่กรณีแล้วเท่านั้น
				                        </p>
				                    </div>
				                </div>
			   				</div>
		   				</div>
		   			</div>
		   		</div>
		   </div>