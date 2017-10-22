<div id="top10-freelance">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>ฟรีแลนซ์แนะนำ</h2>
		                    </div>
		                    <div id="top10-free-area">
		                        <ul id="top10-free-ul">
		                        <?php if ($top_freelance): ?>
		                        	<?php foreach($top_freelance as $rs_top_freelance): ?>	
		                            <li>
		                                <div id="top10-free-img">
											<img src="<?php echo base_url(); ?>images_flogo/<?php echo (!empty($rs_top_freelance['freelance_flogo']))?$rs_top_freelance['freelance_flogo']:"nopicture.gif"; ?>">
		                                </div>
		                                <div id="top10-free-detail">
		                                    <p>ชื่อ : <?php echo $rs_top_freelance['freelance_loginname']; ?></p>
		                                    <p>ผลงานทั้งหมด : - งาน</p>
		                                    <a href="<?php echo base_url(); ?>freelance/detail/<?php echo $rs_top_freelance['freelance_id']; ?>">ติดต่องาน</a>
		                                </div>
		                            </li>
		                            	<?php endforeach; ?>
		                        <?php endif; ?>
		                            
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>