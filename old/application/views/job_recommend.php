<div id="job-recom">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="page-header" id="content-head">
		                        <h2>โปรเจ็คมาใหม่ ล่าสุด</h2>
		                    </div>
		                </div><!--col-md-12"-->
		                <div class="col-md-12">
						
						
						
						
					
						
						
						
							<table class="table table-hover">
								<thead>
								  <tr>
									<th>ผู้โพส</th>
									<th>โปรเจ็คใหม่ล่าสุด</th>
									<th class="text-center">สถานะ</th>
									<th class="text-center">วันที่</th>
								  </tr>
								</thead>
								<tbody>					
								
							<?php if ($projects): ?>

								<?php foreach ($projects as $project): ?>						
								
								<tr>
									<td>                                                
									<div class="clearfix">
										<img class="image-profile" src="<?php echo base_url(); ?>images_flogo_owner/<?php echo (!empty($project['owner_logo']))?$project['owner_logo']:"nopicture.gif"; ?>">
									</div>
									</td>
								
									<td class="list-newproject"><a href="<?php echo base_url(); ?>job/detail/<?php echo $project['project_id']; ?>"><?php echo $project['project_name']; ?></a></td>
									<td class="list-newproject text-center"><?php echo ($project['project_value_end']==0)?"-เสนอราคา-":'฿'.number_format(is_numeric($project['project_value_start'])?$project['project_value_start']:0); ?></td>
									<td class="list-newproject text-center"><?php echo $project['project_cratedate']; ?></td>
								</tr>
														
								
								<?php endforeach; ?>
							<?php endif; ?>						
																				
								</tbody>
							</table>						
						

		                </div><!--col-md-12"-->
		            </div>
		        </div>
		    </div>