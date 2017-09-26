<div id="register-freelance-page">
	<div class="container">
		<div class="row">

<div class="col-md-12">
		   					<div class="page-header" id="content-head">
		   						<h1>รายละเอียด Freelance</h1>
		   					</div>
		   				</div>

<div class="row">
<!-- left column -->
	<div class="col-md-2">
		<div class="text-center">
			<div class="thumbnail">
				<?php if (!empty($freelance_flogo)): ?>
				<img alt="<?php echo $freelance_loginname; ?>" src="<?php echo base_url(); ?>images_flogo/<?php echo $freelance_flogo; ?>">
			<?php else: ?>
				<img alt="<?php echo $freelance_loginname; ?>" src="<?php echo base_url(); ?>images_flogo/nopicture.gif">
			<?php endif; ?>	
				<div class="caption">
					<h3><?php echo $freelance_loginname; ?></h3>
				</div>
			</div> 
      		</div>
    	</div>
    <!-- edit form column -->
    <div class="col-md-10 personal-info">
     
      <form class="form-horizontal" role="form">

        <div class="form-group">
          <label class="col-lg-2 control-label">รหัส Freelance ID : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_id_show; ?></label>
          </div>
        </div>
       
        <div class="form-group">
          <label class="col-lg-2 control-label">ประเภท Freelance : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_category_name; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">ความสามารถ :</label>
          <div class="col-lg-10">

<?php if(!empty($freelance_knowhow)): ?>
<?php 
$freelance_knowhow  = substr($freelance_knowhow,1); 
$arr_freelance_knowhow =explode(",", $freelance_knowhow);
?>	
<?php if ($arr_freelance_knowhow): ?>
            <?php foreach($arr_freelance_knowhow as $cat_id): ?>
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


<?php if  ((isset($this->session->userdata['logged_in'])) && ($this->session->userdata['logged_in']['member_type']=="2")): ?>

<?php if(in_array($this->session->userdata['logged_in']['login_name'],$this->config->item('supper_owner'))) : ?>

        <div class="form-group">
          <label class="col-lg-2 control-label">เพศ : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_sex; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">อายุ : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_age; ?> ปี</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">จัหวัด : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_city; ?></label>
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-2 control-label">รหัสไปรษณีย์ : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_postcode; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">ประเทศ : </label>
          <div class="col-lg-10">
	<label class="control-label">ไทย</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_phone; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ มือถือ : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_mobile; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรสาร : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_fax; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">email : </label>
          <div class="col-lg-10">
	<label class="control-label"><?php echo $freelance_email; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">Rank : </label>
          <div class="col-lg-10">
	<label class="control-label">1 <?php echo $freelance_category_name; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Feedback rating : </label>
          <div class="col-lg-10">
	<label class="control-label">
		
		<div id="stars-existing" class="starrr" data-rating="5">
			<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
			<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
			<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
			<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
			<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		</div>

	</label>
          </div>
        </div>


         <div class="form-group">
          <label class="col-lg-2 control-label">รายละเอียดส่วนตัว : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
	<?php echo $freelance_personal; ?>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">ความสามารถอื่นๆ : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
	<?php echo $freelance_knowhowspecial; ?>
          </div>
        </div>

   <?php else: ?>
   
   <div class="col-md-12 personal-info alert alert-danger">
ท่านไม่สามารถเห็นรายละเอียดได้ค่ะ/ท่านต้องสมัครสมาชิกก่อนค่ะ <a href="<?php echo base_url(); ?>fee/">ดูรายละเอียดได้ที่</a>
</div>

   <?php endif; ?>     

<?php elseif  ((isset($this->session->userdata['logged_in'])) && ($this->session->userdata['logged_in']['member_type']=="1")): ?>

<?php if($this->session->userdata['logged_in']['login_name']==$freelance_loginname) : ?>



    <div class="form-group">
          <label class="col-lg-2 control-label">เพศ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_sex; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">อายุ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_age; ?> ปี</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">จัหวัด : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_city; ?></label>
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-2 control-label">รหัสไปรษณีย์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_postcode; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">ประเทศ : </label>
          <div class="col-lg-10">
  <label class="control-label">ไทย</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_phone; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">โทรศัพท์ มือถือ : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_mobile; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">โทรสาร : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_fax; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">email : </label>
          <div class="col-lg-10">
  <label class="control-label"><?php echo $freelance_email; ?></label>
          </div>
        </div>        

                <div class="form-group">
          <label class="col-lg-2 control-label">Rank : </label>
          <div class="col-lg-10">
  <label class="control-label">1 <?php echo $freelance_category_name; ?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Feedback rating : </label>
          <div class="col-lg-10">
  <label class="control-label">
    
    <div id="stars-existing" class="starrr" data-rating="5">
      <span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
      <span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
      <span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
      <span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
      <span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
    </div>

  </label>
          </div>
        </div>


         <div class="form-group">
          <label class="col-lg-2 control-label">รายละเอียดส่วนตัว : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
  <?php echo $freelance_personal; ?>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">ความสามารถอื่นๆ : </label>
          <div class="col-lg-10 form-control-static" style="font-size: 16px;">
  <?php echo $freelance_knowhowspecial; ?>
          </div>
        </div>




<?php else: ?>
<div class="col-md-12 personal-info alert alert-danger">
ท่านไม่สามารถดูข้อมูลคนอื่น นอกจากข้อมูลของตัวท่านเองค่ะ
</div>

<?php endif; ?>


<?php else: ?>

<div class="col-md-12 personal-info alert alert-danger">
ท่านไม่สามารถเห็นรายละเอียดได้ค่ะ/ท่านต้องสมัครสมาชิกก่อนค่ะ <a href="<?php echo base_url(); ?>register/">ดูรายละเอียดได้ที่</a>
</div>


<?php endif; ?>






      </form>

    </div>
  </div>

</div>


<div class="row">



	<div class="col-md-12 form-group page-header">
	<label class="col-lg-2 control-label">Portfolio : </label>
	</div>
	</div>


<div class="row">



	<div class="col-md-12">
		                    <div id="freelance-list-area">
		                        <ul id="find-free-thumb">

		                        <?php if ($portfolios): ?>
		                        	<?php foreach($portfolios as $rs_portfolio): ?>
		                            <li>
		                            <?php if (!empty($rs_portfolio['portfolio_images'])): ?>
		                                <a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"><img src="<?php echo base_url(); ?>images_portfolio/<?php echo $rs_portfolio['portfolio_images']; ?>" class="img-responsive"></a>
		                              <?php else: ?> 
		                              <a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"><img src="<?php echo base_url(); ?>assets/img/jobbid-thumb.jpg" class="img-responsive"></a> 
		                          <?php endif; ?>
		                                <div id="find-free-thumb-detail">
		                                    <a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"><?php echo $rs_portfolio['portfolio_name']; ?></a>
		                                    <div class="clearfix" id="find-free-thumb-buttom">
                                                <div class="clearfix" id="find-free-profile">
                                                   <div id="find-free-profile-img">





			<?php if (!empty($freelance_flogo)): ?>
				<img alt="<?php echo $freelance_loginname; ?>" src="<?php echo base_url(); ?>images_flogo/<?php echo $freelance_flogo; ?>">
			<?php else: ?>
				<img alt="<?php echo $freelance_loginname; ?>" src="<?php echo base_url(); ?>images_flogo/nopicture.gif">
			<?php endif; ?>






                                                    </div>
                                                    <div id="find-free-profile-detail">
                                                        <p><a href="<?php echo base_url(); ?>freelance/detail/<?php echo $freelance_id; ?>"><?php echo $rs_portfolio['freelance_loginname']; ?></a></p>
                                                    </div>
                                                </div>
		                                    </div>
		                                </div>
		                            </li>
		                       <?php endforeach; ?>
		                       <?php endif; ?>

		                        </ul>
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