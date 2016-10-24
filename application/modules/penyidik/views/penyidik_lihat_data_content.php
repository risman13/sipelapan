<?php if ($this->session->flashdata()): ?>
<div class="alert bg-<?= $this->session->flashdata('ResponColor'); ?> alert-styled-left">
	<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
	<strong><?= $this->session->flashdata('ResponTitle'); ?></strong>
	<br><?= $this->session->flashdata('ResponMesage'); ?>
</div>
<?php endif ?>

<!-- daftar data pekerjaan -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Daftar Penyidik</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="reload"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		<a href="<?=base_url('penyidik/tambah_data')?>" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus3"></i></b> Tambah Data</a>
	</div>

	<!-- table -->
	<table class="table" id="table">
		<thead>
			<tr>
				<th>ID Penyidik</th>
				<th>Nama Penyidik / NRP</th>
				<th>Pangkat</th>
				<th>Jabatan</th>
				<th>Satuan</th>
				<th>Pendidikan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- /table -->

</div>
<!-- /daftar data pekerjaan -->

<script type="text/javascript" src="<?= base_url('assets/js/modules/penyidik.dt.min.js') ?>"></script>