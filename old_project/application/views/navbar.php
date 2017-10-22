		<navbar>
		    <nav class="navbar navbar-inverse">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="<?php echo ($active=="home")?"active":""; ?>"><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
                    <li class="<?php echo ($active=="findfreelance")?"active":""; ?>"><a href="<?php echo base_url(); ?>find-freelance">ค้นหาฟรีแลนซ์</a></li>
                    <li class="<?php echo ($active=="findjob")?"active":""; ?>"><a href="<?php echo base_url(); ?>find-job">ค้นหาโปรเจ็ค</a></li>
                    <li class="<?php echo ($active=="portfolio")?"active":""; ?>"><a href="<?php echo base_url(); ?>portfolio">รวมผลงานฟรีแลนซ์</a></li>
					<li class="<?php echo ($active=="help")?"active":""; ?>"><a href="<?php echo base_url(); ?>help">วิธีการใช้งาน</a></li>
                    <li class="<?php echo ($active=="contact")?"active":""; ?>"><a href="<?php echo base_url(); ?>contact">ติดต่อสอบถาม</a></li>                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
		</navbar>