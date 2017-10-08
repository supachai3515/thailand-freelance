<!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo base_url("member"); ?>">Member</a></li>
          <li class="active">View info</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(<?php echo CheckUrlImg($this->config->item('url_img'), $member_info['cover_image'],"cover") ?>) center center;">
              <h3 class="widget-user-username"><?php echo $member_info["firstname"] ?></h3>
              <h5 class="widget-user-desc"><?php echo $member_info["description"] ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo CheckUrlImg($this->config->item('url_img'), $member_info['image']) ?>" alt="<?php echo $member_info["firstname"] ?>">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo number_format($member_info["count_selling"]) ?></h5>
                    <span class="description-text">ขายงาน (Freelance)</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo number_format($member_info["count_project"]) ?></h5>
                    <span class="description-text">ประกาศงาน (Project)</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo number_format($member_info["count_portfolio"]) ?></h5>
                    <span class="description-text">ผลงาน (Portfolio)</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        </div>
        <!-- /.row (main row) -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
