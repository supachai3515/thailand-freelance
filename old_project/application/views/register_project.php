<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>

<script>
            $(function() {
                    $('#chkAccept').on('click', function(){
                        if ( $(this).is(':checked') ) {
                            $('#btn-submit').prop('disabled', false);
                        } else {
                            $('#btn-submit').prop('disabled', true);
                        }
                    });	

                $('#btn-cancel').click(function() {
                  	$(location).attr('href',"<?php echo base_url(); ?>register/project");
                });
               

            });
</script>

<div id="post-project">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="page-header" id="content-head">
                  <h1>โพสโปรเจค</h1>
                </div>
              </div>
              <div class="col-md-12">
                <div id="post-project-area">
                  <form action="<?php echo base_url(); ?>register/project" class="form-horizontal" method="post" >
                   <fieldset disabled="">
                    <div class="form-group">
                      <label for="owner-name" class="col-sm-2 control-label">ชื่อผู้โพส</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="owner-name"  name="owner_name" value="<?php echo $login_name; ?>">
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label">ชื่อโปรเจค <span>*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Project-name" name="project_name" value="<?php echo set_value('project_name'); ?>">
                      <?php echo form_error('project_name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-type" class="col-sm-2 control-label">ประเภทโปรเจค</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="project_type">
                        <option value="1" <?php echo (set_value('project_type')=="1")?"selected":""; ?>>งานฟรีแลนซ์</option>
                        <option value="2" <?php echo (set_value('project_type')=="2")?"selected":""; ?>>งานประจำ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-type" class="col-sm-2 control-label">ลักษณะงาน <span>*</span></label>
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

                  </div>
                  <div class="form-group">
                    <label for="Project-ohter-detail" class="col-sm-2 control-label">ข้อมูลรายละเอียดงานอื่นๆ <span>*</span></label>
                    <div class="col-sm-10">
                     <textarea rows="5" name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
                     <?php echo form_error('description', '<div class="alert alert-danger contact-warning">', '</div>'); ?>

                      <span>ไม่เกิน 5,000 ตัวอักษร และ 
                       <font style="text-decoration: underline;">ไม่กรอกอีเมล์ ที่อยู่ติดต่อ และเบอร์โทรศัพท์ในการติดต่อ</font>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label">Email รับการแจ้งเตือน <span>*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Project-email" name="project_email" value="<?php echo set_value('project_email'); ?>">
                      <?php echo form_error('project_email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 0;">
                    <label for="Project-price" class="col-sm-2 control-label">งบประมาณ</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="budget_start" name="budget_start" value="<?php echo set_value('budget_start'); ?>">
                      <?php echo form_error('budget_start', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                    </div>
                    <br class="br">
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="budget_end" ื name="budget_end" value="<?php echo set_value('budget_end'); ?>">
                      <?php echo form_error('budget_end', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                    </div>
                    <div class="col-sm-4">
                      <p><span> * (ตัวเลขเท่านั้น) เครื่องหมาย , ไม่ต้องใส่ค่ะ </span></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <p><span>กรุณาตรวจสอบให้แน่ใจอีกครั้งก่อนประกาศโปรเจค</span></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label">ระยะเวลาการทำงาน <span>*</span></label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="Project-name" name="project_time" value="<?php echo set_value('project_time'); ?>">
                      <?php echo form_error('project_time', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                    </div>
                    <br class="br">
                    <div class="col-sm-2">
                      <select class="form-control" name="timetype_id">
                        <option value="1" <?php echo (set_value('timetype_id')=="1")?"selected":""; ?>>วัน</option>
                        <option value="2" <?php echo (set_value('timetype_id')=="2")?"selected":""; ?>>เดือน</option>
                        <option value="3" <?php echo (set_value('timetype_id')=="3")?"selected":""; ?>>ปี</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <p><span>กรอก 0 สำหรับไม่จำกัดระยะเวลาทำโปรเจค</span></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label">วันเริ่มต้น</label>
                    <div class="col-sm-10">
                         <div id="datetimepicker1" class="input-append date">
                           <div class="input-group">
                            <input data-format="dd-MM-yyyy"  name="project_startdate" class="form-control" type="text"></input>
                            <div class="input-group-addon">
                              <div class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="glyphicon glyphicon-th-large" class="glyphicon glyphicon-th-large">
                                </i>
                              </div>
                            </div>
                          </div>
                        </div><!--datetimepicker1-->
                         <script type="text/javascript">
                            $(function() {
                              $('#datetimepicker1').datetimepicker();
                            });
                          </script>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Project-name" class="col-sm-2 control-label">วันสิ้นสุด</label>
                    <div class="col-sm-10">
                         <div id="datetimepicker2" class="input-append date">
                           <div class="input-group">
                            <input data-format="dd-MM-yyyy" class="form-control" type="text"  name="project_enddate">
                            <div class="input-group-addon">
                              <div class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="glyphicon glyphicon-th-large" class="glyphicon glyphicon-th-large">
                                </i>
                              </div>
                            </div>
                          </div>
                        </div><!--datetimepicker1-->
                         <script type="text/javascript">
                            $(function() {
                              $('#datetimepicker2').datetimepicker({
                                language: 'pt-BR'
                              });
                            });
                          </script>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">ไม่แสดงราคาที่เสนอของฟรีแลนซ์ (ยกเว้นเจ้าของโปรเจค)</label>
                    <div class="col-sm-10">
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="project_showvalue" value="1" <?php echo (set_value('project_showvalue')=="1")?"checked":""; ?>> ไม่แสดงราคา  
                      </label>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading"><input type="radio" name="rdPaymentMethod" id="inlineRadio1" value="0" checked=""> ประกาศฟรี</div>
                    <div class="panel-body">
                      <ul>
                        <li><p>ไม่เสียค่าธรรมเนียม</p></li>
                        <li><p>เปิดดูที่อยู่ผู้เข้าประมูลได้ ทุกคน คนในโปรเจคนี้ </p></li>
                        <li><p>ไม่แสดงที่อยู่ของคุณ</p></li>
                      </ul>
                    </div>
                    <div class="panel-footer" id="text-center"><span><a href="#">อ่านรายละเอียดเพิ่มเติม</a></span></div>
                  </div>
                  <div class="panel panel-warning">
                    <div class="panel-heading">ข้อตกลง</div>
                    <div class="panel-body">
                        <p>
                          1. Jobbid.in.th เป็นเพียงตัวกลางในการให้ผู้ว่าจ้าง(Employer) และผู้รับจ้าง(Freelance) มาพบกันโดยผ่านทางเวบไซต์ Jobbid.in.th เท่านั้น หากเกิดความเสียหายขึ้นในการรับทำงานของข้าพเจ้า Jobbid.in.th ไม่ต้องรับผิดชอบในทุกๆกรณี
                        </p>
                        <p>
                          2. การเลือกคนมารับทำงานของข้าพเจ้า เกิดขึ้นจากการเลือกของข้าพเจ้าเองทั้งสิ้น Jobbid.in.th เพียงแต่เป็นตัวกลางในการประกาศงานผ่านทางเวบ Jobbid.in.th.com หากข้าพเจ้าไม่สามารถเลือกคนเข้ามาทำงานให้กับโปรเจคของข้าพเจ้าได้ Jobbid.in.th ไม่ต้องรับผิดชอบในทุกๆกรณี
                          (ยกเว้นกรณีความผิดพลาดทางเทคนิคของทางเวบไซต์ Jobbid.in.th.com เช่น ความผิดพลาดทางตัวโปรแกรมในการประกาศงาน)
                        </p>
                        <div id="text-center">
                          <label class="checkbox-inline">
                            <input type="checkbox" id="chkAccept" name="chkAccept" value="1" style="margin-top:7px;"> 
                            <span id="s18">ยอมรับข้อตกลงข้างต้น</span>
                          </label>
                        </div>
                    </div>
                  </div>
                    <div id="project-post-submit">
                      <input  type="hidden"  name="owner_id" value="<?php echo $login_name; ?>">
                      <button type="submit" id="btn-submit" class="btn btn-success" disabled="true">โปรกาศโปรเจค</button>
                      <button type="button"  id="btn-cancel" class="btn btn-danger">ล้างข้อมูล</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> <!--container-->
       </div>