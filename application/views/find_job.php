
		    <div id="job-list">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>งานล่าสุด</h2>
		                        <p>คลิกโปรเจคที่คุณสนใจ เพื่อดูรายละเอียดเพิ่มเติม</p>
		                    </div>
		                </div><!--col-md-12"-->
                                            <h3 id="kullanicihebir">จำนวน <?php echo number_format($total_record); ?> รายการ</h3>
		                <div class="col-md-12">
		                    <div id="job-list-area">
		                        

                                <ul id="find-free-thumb">
                                                    <?php if ($projects): ?>
                                                        <?php foreach ($projects as $project): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>job/detail/<?php echo $project['project_id']; ?>"><img src="<?php echo base_url(); ?>images_flogo_owner/<?php echo (!empty($project['owner_logo']))?$project['owner_logo']:"nopicture.gif"; ?>" class="img-responsive"></a>
                                            <div id="find-job-thumb-detail">
                                            <a href="<?php echo base_url(); ?>job/detail/<?php echo $project['project_id']; ?>"><?php echo $project['project_name']; ?></a>
                                            <div class="clearfix" id="find-job-thumb-buttom">
                                                <div class="clearfix" id="find-job-profile">
                                                   <div id="find-job-profile-img">
                                                        <img src="<?php echo base_url(); ?>images_flogo_owner/<?php echo (!empty($project['owner_logo']))?$project['owner_logo']:"nopicture.gif"; ?>">
                                                    </div>
                                                    <div id="find-job-profile-detail">
                                                        <p><?php echo $project['owner_loginname']; ?></p>
                                                        <p>งบประมาณ : <?php echo ($project['project_value_end']==0)?"-เสนอราคา-":number_format(is_numeric($project['project_value_start'])?$project['project_value_start']:0); ?></p>
                                                        <p>สิ้นสุด : <?php echo $project['project_enddate']; ?></p>
                                                        <p><span>ผู้สนใจ : <?php echo number_format($project['project_view']); ?> คน</span></p>
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