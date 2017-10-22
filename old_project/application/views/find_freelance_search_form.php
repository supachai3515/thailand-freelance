		    <div class="clearfix" id="find-freelance-search">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12">
                            <div id="find-freelance-area">
		                        <div class="panel panel-default">
                              <div class="panel-heading">ค้นหาฟรีแลนซ์</div>
                              <div class="panel-body">
                                <form class="form-horizontal" action="<?php echo base_url(); ?>freelance/search/"  method="post">
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">คำค้นหา :</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="freelance-name" name="search_name"  value="<?php echo $search_name; ?>" placeholder="กรอกคำค้นหา ...">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">ค้นหาประเภท :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="search_typeid">
                                      <option value="0" <?php echo ($search_typeid=="0")?"selected":""; ?>>เลือกประเภทค้นหา</option>
                                      <option value="1" <?php echo ($search_typeid=="1")?"selected":""; ?>>ชื่อ-นามสกุล</option>
                                      <option value="2" <?php echo ($search_typeid=="2")?"selected":""; ?>>นามแฝง</option>
                                      <option value="3" <?php echo ($search_typeid=="3")?"selected":""; ?>>อีเมลล์</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="freelance-name" class="col-sm-2 control-label">ค้นหาประเภทงาน :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="freelance_categoryid">
                                    <?php if ($freelance_category): ?>
                                      <option value="">เลือก Freelance</option>
                                      <?php foreach($freelance_category as $key=>$val): ?>
                                      <option value="<?php echo $key; ?>" <?php echo ($key==$freelance_categoryid)?"selected":""; ?>><?php echo $val; ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
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