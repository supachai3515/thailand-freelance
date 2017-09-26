<div id="portfolio-list">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>Freelance Portfolio</h2>
		                        <p>ผลงานต่างๆของ Freelance จาก thailand-freelance.com</p>
		                    </div>
		                </div><!--col-md-12"-->

			<div class="col-md-12">
		                    <div id="freelance-list-area">
		                        <ul id="find-free-thumb">

		                        <?php if ($portfolios): ?>
		                        	<?php foreach($portfolios as $rs_portfolio): ?>
		                           <li>
		                            <?php if (!empty($rs_portfolio['portfolio_images'])): ?>
		                            	<a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"><img src="<?php echo image(base_url()."images_portfolio/".$rs_portfolio['portfolio_images'], "square"); ?>" /></a>
		                              <?php else: ?> 
		                             <a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"> <img src="<?php echo base_url(); ?>assets/img/jobbid-thumb.jpg" class="img-responsive"></a>
		                          <?php endif; ?>
				<div id="portfolio-thumb-detail">
				<div class="clearfix" id="portfolio-thumb-buttom">
				    <div class="clearfix" id="portfolio-profile">
				       <div id="portfolio-profile-img">
			<?php if (!empty($freelance_flogo)): ?>
				<img alt="<?php echo $freelance_loginname; ?>" src="<?php echo base_url(); ?>images_flogo/<?php echo $freelance_flogo; ?>">
			<?php else: ?>
				<img alt="" src="<?php echo base_url(); ?>images_flogo/nopicture.gif">
			<?php endif; ?>
				        </div>
				        <div id="portfolio-profile-detail">
				            <p>ชื่อผลงาน : <a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $rs_portfolio['portfolio_id']; ?>"><?php echo $rs_portfolio['portfolio_name']; ?></a></p>
				            <p>โดย : <a href="<?php echo base_url(); ?>freelance/detail/<?php echo $rs_portfolio['freelance_id']; ?>"><?php echo $rs_portfolio['freelance_loginname']; ?></a></p>
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
		                </div>


		            </div>
		        </div>
		    </div><!--job-recom-->