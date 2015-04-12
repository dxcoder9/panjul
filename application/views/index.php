
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
				<form class="form login-form" method="POST" action="<?php echo base_url('account/login'); ?>">
					<legend>
					Sign in to
					<span><img height="50" alt="Typica - Bootstrap Awesome Template!" src="<?php echo base_url(); ?>assets/img/logo.png"></span>
					</legend>
					<?php 
                                   if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }else{
                                        echo validation_errors();
                                    } 
                                ?>
						<div class="body">
							<label>Username</label>
							<input type="text" class="form-control" name="username" >
							<label>Password</label>
							<input type="password" class="form-control" name="password" >
							
								<div class="footer">
									<label class="checkbox inline">
									<input id="inlineCheckbox1" type="checkbox" value="option1">
									Remember me
									</label>
									<input value="Login" class="btn btn-success" type="submit">
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
                   </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('account/registrasi');?>

                                   
                                        
                                        
                                        <div class="form-group">
                                            <label >Nama lengkap</label>
                                            <input type="text" class="form-control"  name="nama_lengkap" placeholder="Nama lengkap">
                                        </div>
                                         <div class="form-group">
                                            <label >NIM</label>
                                            <input type="text" class="form-control"  name="nim" placeholder="NIM">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label >Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label >Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label >Laboratorium</label>
                                             <select class="form-control" name="lab">
                                                <option>-- Pilih Laboratorium --</option>
                                                <?php

                                                foreach ($ambil as $key) {
                                                    ?>

                                                    <option value="<?php echo $key->id_lab ?>"><?php echo $key->n_lab; ?></option>

                                                    <?php
                                                }

                                                ?>

                                              
                                             </select>
                                        </div>

                                        <div class="form-group">
                                            <label >Kode Lab</label>
                                            <input type="text" class="form-control" name="kode_lab" placeholder="Kode lab">
                                        </div>
                                       
                                       
                                        
                                        
                                    
                                    <div class="box-footer">
                                        <input type="submit" value="submit" class="btn btn-primary">
                                    </div>
                                </form>

                   
                  </div>
                  
                </div>
              </div>
            </div>



		</body>

		

        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
   
</html>
