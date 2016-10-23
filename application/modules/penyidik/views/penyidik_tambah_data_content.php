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
		<h5 class="panel-title">Tambah Data Penyidik</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="reload"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">

		<form action="#">
			<fieldset class="content-group">
				<legend class="text-bold">Form Entry</legend>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Nama Penyidik: </label>
	                    	<input type="text" class="form-control border-teal border-lg text-teal" name="nama_penyidik" 
	                    		placeholder="isi nama penyidik">
						</div>
	        		</div>

	        		<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Jabatan: </label>
	                    	<input type="jabatan" class="form-control border-teal border-lg text-teal" name="nama_penyidik" 
	                    		placeholder="isi jabatan">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Pangkat: </label>
	                    	<select name="pangkat" class="select-search border-teal border-lg text-teal" required="true">
							<option value="">-- Pilih Pangkat --</option>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">NRP: </label>
	                    	<input type="number" class="form-control border-teal border-lg text-teal" name="nrp" 
	                    		placeholder="isi nrp (format angka)">
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">No. HP: </label>
	                    	<input type="text" class="form-control border-teal border-lg text-teal" name="no_hp" 
	                    		placeholder="isi no. hp (ex: 085764974553 | format angka)">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Grup Wilayah: </label>
	                    	<select name="grup_wilayah" class="select-search border-teal border-lg text-teal" required="true">
							<option value="">-- Pilih Grup Wilayah --</option>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Polres: </label>
	                    	<select name="polres" class="select-search border-teal border-lg text-teal" required="true">
							<option value="">-- Pilih POLRES --</option>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Satuan: </label>
	                    	<select name="satuan" class="select-search border-teal border-lg text-teal" required="true">
							<option value="">-- Pilih Satuan --</option>
						</select>
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Strata Pendidikan: </label>
	                    	<select name="grup_wilayah" class="select-search border-teal border-lg text-teal" required="true">
							<option value="">-- Pilih Grup Wilayah --</option>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Tahun Ijazah: </label>
	                    	<input type="number" class="form-control border-teal border-lg text-teal" name="tahun_ijazah" 
	                    		placeholder="isi tahun ijazah">
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Gelar: </label>
	                    	<input type="text" class="form-control border-teal border-lg text-teal" name="gelar" 
	                    		placeholder="isi tahun gelar">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Alamat Email: </label>
	                    	<input type="email" class="form-control border-teal border-lg text-teal" name="email" 
	                    		placeholder="isi alamat email yang valid">
						</div>
	        		</div>

	        		<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Nama Perguruan Tinggi: </label>
							<textarea class="form-control" rows="3" cols="3" placeholder="isi nama perguruan tinggi"></textarea>
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Upload Foto: </label>
							<input type="file" class="form-control border-teal border-lg text-teal file-styled">
						</div>
	        		</div>

	        		<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Status Aktif: </label>
							<input type="checkbox" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" checked="checked">
						</div>
	        		</div>
				</div><hr>
			</fieldset>
		</form>

	</div>

</div>
<!-- /daftar data pekerjaan -->

<!-- script select2  -->
<script type="text/javascript">
	$(function() {
		$('.select-search').select2();
	})
</script>
<!-- /script select2  -->