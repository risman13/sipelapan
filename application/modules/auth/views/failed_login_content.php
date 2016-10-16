<?php
//print_r($this->session->tempdata());

//echo $this->input->ip_address();
?>
<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="<?=base_url('assets/images/sipelapan-logo.png')?>" alt=""></a>

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

					<div class="alert bg-danger alert-styled-left">
						<button type="button" class="close" data-dismiss="alert">
							<span>×</span><span class="sr-only">Close</span>
						</button>
						<strong>Access Forbidden! </strong>
						<br>Anda 5 kali gagal login, demi keamanan silahkan akses kembali halaman ini 3 menit dari sekarang.
				    </div>

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