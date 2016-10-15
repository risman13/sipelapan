<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?=base_url('assets/images/sipelapan-logo.png')?>" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="fa fa-globe"></i> <span class="visible-xs-inline-block position-right"> Halaman depan</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

				<?php if ($this->session->flashdata()): ?>
					<div class="alert bg-<?= $this->session->flashdata('ResponColor'); ?> alert-styled-left">
						<button type="button" class="close" data-dismiss="alert">
							<span>×</span><span class="sr-only">Close</span>
						</button>
						<strong><?= $this->session->flashdata('ResponTitle'); ?></strong>
						<br><?= $this->session->flashdata('ResponMesage'); ?>
				    </div>					
				<?php endif ?>

					<!-- Simple login form -->
					<form method="post" action="<?=base_url('login/auth')?>">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<img src="<?=base_url('assets/images/Lambang_Polda_Sumsel.png')?>" height="150">
								<h5 class="content-group">Login ke akun anda <small class="display-block">Masuk dengan username dan password anda</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Masuk <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted">
						<?= getFooter() ?>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->