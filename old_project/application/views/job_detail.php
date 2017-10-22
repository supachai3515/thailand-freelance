<div id="register-freelance-page">
	<div class="container">
		<div class="row">

<div class="col-md-12">
	<div class="page-header" id="content-head">
		<h1><?php echo $project_name; ?></h1>
	</div>
</div>

<div class="row">
<!-- left column -->
	<div class="col-md-2">
		<div class="text-center">
			<div class="thumbnail">
				<?php if (!empty($owner_logo)): ?>
				<img alt="<?php echo $owner_loginname; ?>" src="<?php echo base_url(); ?>images_flogo_owner/<?php echo $owner_logo; ?>">
			<?php else: ?>
				<img alt="<?php echo $owner_loginname; ?>" src="<?php echo base_url(); ?>images_flogo_owner/nopicture.gif">
			<?php endif; ?>	
				<div class="caption">
					<h3><?php echo $owner_name; ?></h3>
				</div>
			</div> 
      		</div>
    	</div>
    <!-- edit form column -->
    <div class="col-md-10 personal-info">
     
      <form class="form-horizontal" role="form">

        <div class="form-group">
          <label class="col-lg-2 control-label">ชนิดโปรเจคในขณะนี้ : </label>
          <div class="col-lg-10">
			<label class="control-label">ฟรีค่าธรรมเนียม</label>
          </div>
        </div>
       
        <div class="form-group">
          <label class="col-lg-2 control-label">ชื่อโปรเจค : </label>
          <div class="col-lg-10">
			<label class="control-label"><?php echo $project_name; ?></label>
          </div>
        </div>


<?php if  ((isset($this->session->userdata['logged_in'])) && ($this->session->userdata['logged_in']['member_type']=="1")): ?>

<?php if((in_array($this->session->userdata['logged_in']['login_name'],$this->config->item('supper_admin'))) || $project_type=='3'): ?>



        <div class="form-group">
          <label class="col-lg-2 control-label">ผู้ว่าจ้าง : </label>
          <div class="col-lg-10">
			<label class="control-label"><?php echo $owner_name; ?></label>
          </div>
        </div>     

        <div class="form-group">
          <label class="col-lg-2 control-label">ชื่อบุคคล/บริษัท : </label>
          <div class="col-lg-10">
			<label class="control-label"><?php echo $owner_companyname; ?></label>
          </div>
        </div>


 <div class="form-group">
          <label class="col-lg-2 control-label">รหัสไปรษณีย์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_postcode; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_phone; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์มือถือ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_mobile; ?></label>
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรสาร : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_fax; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">อีเมล์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_email; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">เวบไซต์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_website; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">ประเทศ: </label>
          <div class="col-lg-10">
  <label class="control-label">Thailand</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">ประเภคโปรเจ็ค : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_type_name; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โพสโปรเจ็คเมื่อ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_cratedate; ?></label>
          </div>
        </div>


                <div class="form-group">
          <label class="col-lg-2 control-label">สถานะ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo ($project_status=="1")?"ได้คนทำแล้วค่ะ":"เปิดหาคนทำค่ะ"; ?></label>
          </div>
        </div>


        <div class="form-group">
          <label class="col-lg-2 control-label">ลักษณะงาน :</label>
          <div class="col-lg-10">

            <?php if(!empty($project_knowhow)): ?>
            <?php 
            $project_knowhow  = substr($project_knowhow,1); 
            $arr_project_knowhow =explode(",", $project_knowhow);
            ?>  
            <?php if ($arr_project_knowhow): ?>
            <?php foreach($arr_project_knowhow as $cat_id): ?>
            <?php if (array_key_exists($cat_id,$knowhow_list)): ?>
            <div class="col-sm-3 col-xs-6">
            <label class="checkbox-inline">       
            <input type="checkbox" name="knowhow"  value="1"  disabled="disabled" checked="checked"> <?php echo $knowhow_list[$cat_id]; ?>
            </label>
            </div>      
            <?php endif; ?>
            <?php endforeach; ?>        
            <?php endif; ?>
            <?php else: ?>
            <label class="control-label">ไม่มี</label>
            <?php endif; ?>
          </div>
        </div>


        <div class="form-group">
          <label class="col-lg-2 control-label">รายละเอียดโปรเจค : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
          <?php echo $project_detail; ?>
          </div>
        </div>


         <div class="form-group">
          <label class="col-lg-2 control-label">งบประมาณ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_value_start; ?> - <?php echo $project_value_end; ?> บาท</label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">ระยะเวลาการทำงาน : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_time; ?> <?php echo $project_timetype; ?></label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">เริ่มต้น เสนอราคา : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_startdate; ?></label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">วันสิ้นสุด เสนอราคา : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_enddate; ?></label>
          </div>
        </div>

 <?php else: ?>
  <div class="col-md-12 personal-info alert alert-danger">
 ท่านต้องชำระเงินก่อนค่ะ ถึงจะสามารถดูรายละเอียดได้
</div>
                    
<?php endif; ?>

<?php elseif  ((isset($this->session->userdata['logged_in'])) && ($this->session->userdata['logged_in']['member_type']=="2")): ?>
<?php if ($this->session->userdata['logged_in']['id']==$owner_id): ?>
          <div class="form-group">
          <label class="col-lg-2 control-label">ผู้ว่าจ้าง : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_name; ?></label>
          </div>
        </div>     

        <div class="form-group">
          <label class="col-lg-2 control-label">ชื่อบุคคล/บริษัท : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_companyname; ?></label>
          </div>
        </div>


 <div class="form-group">
          <label class="col-lg-2 control-label">รหัสไปรษณีย์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_postcode; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_phone; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์มือถือ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_mobile; ?></label>
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรสาร : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_fax; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">อีเมล์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_email; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">เวบไซต์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $owner_website; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">ประเทศ: </label>
          <div class="col-lg-10">
  <label class="control-label">Thailand</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">ประเภคโปรเจ็ค : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_type_name; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โพสโปรเจ็คเมื่อ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_cratedate; ?></label>
          </div>
        </div>


                <div class="form-group">
          <label class="col-lg-2 control-label">สถานะ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo ($project_status=="1")?"ได้คนทำแล้วค่ะ":"เปิดหาคนทำค่ะ"; ?></label>
          </div>
        </div>


        <div class="form-group">
          <label class="col-lg-2 control-label">ลักษณะงาน :</label>
          <div class="col-lg-10">

            <?php if(!empty($project_knowhow)): ?>
            <?php 
            $project_knowhow  = substr($project_knowhow,1); 
            $arr_project_knowhow =explode(",", $project_knowhow);
            ?>  
            <?php if ($arr_project_knowhow): ?>
            <?php foreach($arr_project_knowhow as $cat_id): ?>
            <?php if (array_key_exists($cat_id,$knowhow_list)): ?>
            <div class="col-sm-3 col-xs-6">
            <label class="checkbox-inline">       
            <input type="checkbox" name="knowhow"  value="1"  disabled="disabled" checked="checked"> <?php echo $knowhow_list[$cat_id]; ?>
            </label>
            </div>      
            <?php endif; ?>
            <?php endforeach; ?>        
            <?php endif; ?>
            <?php else: ?>
            <label class="control-label">ไม่มี</label>
            <?php endif; ?>
          </div>
        </div>


        <div class="form-group">
          <label class="col-lg-2 control-label">รายละเอียดโปรเจค : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
          <?php echo $project_detail; ?>
          </div>
        </div>


         <div class="form-group">
          <label class="col-lg-2 control-label">งบประมาณ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_value_start; ?> - <?php echo $project_value_end; ?> บาท</label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">ระยะเวลาการทำงาน : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_time; ?> <?php echo $project_timetype; ?></label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">เริ่มต้น เสนอราคา : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_startdate; ?></label>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">วันสิ้นสุด เสนอราคา : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $project_enddate; ?></label>
          </div>
        </div>
 <?php else: ?>
 <div class="col-md-12 personal-info alert alert-danger">
ท่านไม่สามารถดูโปรเจ็คอื่น นอกจากโปรเจ็คของตัวท่านเองค่ะ
</div>       
<?php endif; ?>

<?php else: ?>
 <div class="col-md-12 personal-info alert alert-danger">
ท่านไม่สามารถเห็นรายละเอียดได้ค่ะ/ท่านต้องสมัครสมาชิกก่อนค่ะ
</div>
<?php endif; ?>

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
								5. หากคาดว่าจะถูกโกง กรุณาอีเมล์แจ้งมาที่ <span><a href="#">support@thailand-freelance.com</a></span> ทางทีมงานจะนำข้อความของท่านแจ้งไปยังผู้ถูกกล่าวหา และหากผู้ถูกกล่าวหาไม่ส่งอีเมล์ชี้แจงภายใน 3 วัน ทาง Thailand-freelance.com จะเพิ่มชื่อของคนๆนั้นลงใน <span><a href="#">ระบบเฝ้าระวังของทางเวบไซต์</a></span> และยกเลิกการใช้งานจนกว่าผู้ถูกกล่าวหาจะอธิบายกับทางคู่กรณีแล้วเท่านั้น
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>		
   </div>
</div>