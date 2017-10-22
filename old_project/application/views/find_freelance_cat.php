 <div id="find-freelance">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
                                <h2>ค้นหาฟรีแลนซ์ตามประเภท</h2>
		                    </div>
		                </div><!--col-md-12-->
		                <div class="col-md-12">
		                    <div id="find-freelance-area">
		                        <ul id="find-free-ul">

		                        <?php if ($cat): ?>
		                        	<?php foreach ($cat as $rs_cat): ?>
		                            <li>
		                                <p><i class="<?php echo $rs_cat['font_icon']; ?>" id="<?php echo $rs_cat['style_color']; ?>"></i></p>
		                                <a href="<?php echo base_url(); ?>freelance/search/?freelance_categoryid=<?php echo $rs_cat['freelance_categoryid']; ?>"><?php echo $rs_cat['freelance_category_name']; ?></a>
		                            </li>
		                        <?php endforeach; ?>
		                        <?php endif; ?>
		                            
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div><!--container-->
		    </div><!--find-freelance-->