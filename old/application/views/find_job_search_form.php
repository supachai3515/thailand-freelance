<div class="clearfix" id="find-freelance-search">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
                            <div id="find-freelance-area">
		                        <div class="panel panel-default">
                              <div class="panel-heading">ค้นหางาน</div>
                              <div class="panel-body">
                                <form class="form-horizontal" action="<?php echo base_url(); ?>job/search/"  method="post">
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">คำค้นหา :</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="search-name" name="search_name" value="<?php echo $search_name; ?>" placeholder="กรอกคำค้นหา ...">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">ค้นหาตามประเภทโปรเจ็ค :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="search_projecttype">
                                     <option value="">เลือกประเภท</option>
                                      <option value="1" <?php echo ($search_projecttype=="1")?"selected":""; ?>>งานฟรีแลนซ์</option>
                                      <option value="3" <?php echo ($search_projecttype=="2")?"selected":""; ?>>งานประจำ</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">ค้นหาตามงบประมาณ :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="search_budget">
                                     <option value="">เลือกงบประมาณ</option>
                                      <option value="1" <?php echo ($search_budget=="1")?"selected":""; ?>>0-10000</option>
                                      <option value="2" <?php echo ($search_budget=="2")?"selected":""; ?>>10001-20000</option>
                                      <option value="3" <?php echo ($search_budget=="3")?"selected":""; ?>>20001-30000</option>
                                      <option value="4" <?php echo ($search_budget=="4")?"selected":""; ?>>30001-40000</option>
                                      <option value="5" <?php echo ($search_budget=="5")?"selected":""; ?>>มากกว่า 40000</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">ค้นหาตามสถานะ :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="project_status">
                                     <option value="">ทั้งหมด</option>
                                      <option value="1"  <?php echo ($project_status=="1")?"selected":""; ?>>เปิด</option>
                                      <option value="2"  <?php echo ($project_status=="2")?"selected":""; ?>>ปิด</option>
                                    </select>
                                    </div>
                                  </div>                                  
                                  <input type="submit" id="find-freelance-btn" value="ค้นหา">
                                </form>
                              </div>
                            </div>
                            </div>
		                </div>
		            </div>
		        </div>
		    </div><!--find-freelance-search-->