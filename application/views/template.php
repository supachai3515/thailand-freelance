<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
	<title><?php echo $this->template->title->default("Thailand-Freelance.com สังคมฟรีแลนซ์ งานฟรีแลนซ์ คุณภาพในประเทศไทย "); ?></title>
	<!-- bootstrap 3 -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>	
	<!-- myStyles -->
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="warp">
		<?php echo $this->template->header;  ?>
		<?php echo $this->template->top_site_banner;  ?>
		<?php echo $this->template->navigation_bar;  ?>
		<div class="site-content">
		<?php if ($this->session->flashdata('msg')):?>
 			<?php echo $this->session->flashdata('msg'); ?>
		<?php endif; ?>
			<?php echo $this->template->content;  ?>				
		</div><!--site-content-->
		<?php echo $this->template->footer;  ?>
	</div><!-- /warp -->
</body>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-auto-dismiss-alert.js"></script>
</html>