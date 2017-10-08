<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-6">
          <h3 class="box-title text-center">โปรเจ็คมาใหม่</h3>
          <?php foreach ($project_list as $row): ?>
            <!-- Box Comment -->
            <div class="box box-widget">
              <div class="box-header with-border">
                <div class="user-block">
                  <div class="image-cropper">
                      <img src="<?php echo CheckUrlImg($this->config->item('url_img'), $row['member_image']) ?>" alt="<?php echo $row['member_id'] ?>">
                  </div>
                  <span class="username"><a href="<?php echo base_url("member/view/".$row['member_id']); ?>"><?php echo $row['member_name'] ?></a></span>
                  <span class="description">publicly - <?php echo get_day_name(strtotime($row['create_date'])) ?></span>
                </div>
                <!-- /.user-block -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                <!-- post text -->
                <p><strong>  <?php echo $row['name'] ?></strong> </p>
                <!-- <p><?php echo $row['description'] ?></p> -->
                <!-- Social sharing buttons -->
                <a class="btn btn-default btn-xs" href="<?php echo base_url("project/view/".$row['project_id']); ?>"><i class="fa fa-file"></i> Read more</a>
                <span class="pull-right text-muted"><?php echo $row['view'] ?> view</span>
              </div>

            </div>
              <?php endforeach; ?>
            <!-- /.box -->
          </div>
          <div class="col-md-6">
              <h3 class="box-title text-center">ประกาศรับงาน</h3>
          </div>
    </div>
    <!-- /.row (main row) -->
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Latest Members</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              <?php foreach ($member_list as $row): ?>
                <li>
                  <div class="user-block">
                      <div class="image-cropper">
                          <img src="<?php echo CheckUrlImg($this->config->item('url_img'), $row['image']) ?>" alt="<?php echo $row['firstname']; ?>" >
                      </div>
                      <span class="username text-left"><a href="<?php echo base_url("member/view/".$row['member_id']); ?>"><?php echo $row['firstname']; ?></a></span>
                      <span class="description text-left"><?php echo get_day_name(strtotime($row['create_date'])) ?></span>
                    </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Users</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
