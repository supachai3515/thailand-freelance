<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
  <!-- Main content -->
  <section class="content">

    <div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>Thailand</b>Freelance</a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign In</p>
    <?php $this->load->helper('form'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
    </div>
    <?php
    $this->load->helper('form');
    $error = $this->session->flashdata('error');
    if($error)
    {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error; ?>
        </div>
    <?php }
    $success = $this->session->flashdata('success');
    if($success)
    {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $success; ?>
        </div>
    <?php } ?>

    <form action="<?php echo base_url("login/authen"); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>  -->
        </div><!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
        </div><!-- /.col -->
      </div>
    </form>

    <a href="<?php echo base_url() ?>forgotPassword">Forgot Password</a><br>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
