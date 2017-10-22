
		    <div id="freelance-list">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>ค้นหาฟรีแลนซ์ </h2>
		                        <p>คลิกที่ฟรีแลนซ์ที่คุณสนใจเพื่อดูรายละเอียดและ ผลงานต่างๆ</p>
		                    </div>
		                </div><!--col-md-12"-->
			<h3 id="kullanicihebir">จำนวน <?php echo number_format($total_record); ?> รายการ</h3>
		                <div class="col-md-12">
                    
		                    <div id="freelance-list-area">
		                        <ul id="find-free-thumb">

                                                    <?php if ($freelances): ?>

                                                        <?php foreach ($freelances as $freelance): ?>

		                            <li>
		                                <a href="<?php echo base_url(); ?>freelance/detail/<?php echo $freelance['freelance_id']; ?>"><img src="<?php echo base_url(); ?>images_flogo/<?php echo (!empty($freelance['freelance_flogo']))?$freelance['freelance_flogo']:"nopicture.gif"; ?>" class="img-responsive"></a>
		                                <div id="find-free-thumb-detail">
		                                   <!-- <a href="#"><?php //echo (!empty($freelance['freelance_knowhow']))?substr($freelance['freelance_knowhow'],1):"..."; ?></a>-->
		                                    <div class="clearfix" id="find-free-thumb-buttom">
                                                <div class="clearfix" id="find-free-profile">
                                                   <div id="find-free-profile-img">
                                                        <img src="<?php echo base_url(); ?>images_flogo/<?php echo (!empty($freelance['freelance_flogo']))?$freelance['freelance_flogo']:"nopicture.gif"; ?>">
                                                    </div>
                                                    <div id="find-free-profile-detail">
                                                        <p><a href="<?php echo base_url(); ?>freelance/detail/<?php echo $freelance['freelance_id']; ?>"><?php echo $freelance['freelance_loginname']; ?></a></p>
                                                        <p><?php echo $freelance['freelance_id']; ?></p>
                                                        <p><span>Rating  n/a</span></p>
                                                    </div>
                                                </div>
		                                    </div>
		                                </div>
		                            </li>

                                            <?php endforeach; ?>
                                            <?php endif; ?>



		                          
		                        </ul>
		                    </div>
				<div id="page-nav-area">
				<nav aria-label="Page navigation">
					<?php echo $pagination; ?>
				</nav>
				</div>
		                </div><!--col-md-12"-->
		            </div>
		        </div>
		    </div><!--job-recom-->