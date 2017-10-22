		    <div id="site-reviews">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>ส่วนหนึ่งของลูกค้าที่ใช้งาน</h2>
		                    </div>
		                </div>
		                <div class="col-md-12">
		                    <div id="reviews-area">
		                        <ul id="reviews-ul">
								<?php if ($site_reviews): ?>
									<?php foreach($site_reviews as $review): ?>
								
		                            <li>
		                                <div id="reviews-img">
											<img src="<?php echo base_url(); ?>images_flogo_owner/<?php echo (!empty($review['owner_logo']))?$review['owner_logo']:"nopicture.gif"; ?>">
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