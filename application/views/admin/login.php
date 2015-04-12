
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>I-PULS | PPDU Telkom University</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/typica-login.css'); ?>">
        
		<link rel="icon" type="/image/ico"  href="<?php echo base_url();?>assets/img/favicon2.ico" >
       
    </head>


<body id="back">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.html">
					<img height="50" alt="Typica - Bootstrap Awesome Template!" src="<?php echo base_url(); ?>assets/img/logo.png">
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div id="login-wraper">
				<?php 
	if($this->session->userdata('level') == "admin"){
		redirect(base_url('admin/home'));
	}else{
	if ($this->session->flashdata('pesan')) {
	echo $this->session->flashdata('pesan');
		}}?>
				<form class="form login-form" method="POST" action="<?php echo base_url('admin/proses_login');?>">
					<legend>
					
					<span><img height="50" alt="Typica - Bootstrap Awesome Template!" src="<?php echo base_url(); ?>assets/img/ppdulogo.png"></span>
					</legend>
						<div class="body">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required>
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
							
								<div class="footer">
									<label class="checkbox inline">
									<input id="inlineCheckbox1" type="checkbox" value="option1">
									Remember me
									</label>
									<button class="btn btn-success" type="submit">Login</button>
								</div>
						</div>

				</form>
			</div>
		</div>
		
		<footer class="white navbar-fixed-bottom">
			Don't have an account yet?
		<button type="button" class="btn btn-black" data-toggle="modal" data-target="#myModal">Register</button>
						</footer>
				
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Belum punya akun?</h4>
			      </div>
			      <div class="modal-body">
			        Silahkan hubungi admin PPDU anda
			      </div>
			      
			    </div>
			  </div>
			</div>


		</body>

        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
   

    </body>
</html>
