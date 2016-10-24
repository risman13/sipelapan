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

		<form action="<?= base_url('penyidik/tambah_data_act') ?>" method="post" enctype="multipart/form-data">
			<fieldset class="content-group">
				<legend class="text-bold">Form Entry</legend>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Nama Penyidik: </label>
	                    	<input type="text" class="form-control " name="nama_penyidik" placeholder="isi nama penyidik" 
	                    		required="true">
						</div>
	        		</div>

	        		<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Jabatan: </label>
	                    	<input type="jabatan" class="form-control " name="jabatan" placeholder="isi jabatan" required="true">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Pangkat: </label>
	                    	<select name="pangkat" class="select-search " required="true">
							<option value="">-- Pilih Pangkat --</option>
							<?php foreach ($data_pangkat as $key => $value_pangkat): ?>
								<option value="<?= $value_pangkat->id_pangkat ?>"><?= $value_pangkat->nama_pangkat ?></option>	
							<?php endforeach ?>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">NRP: </label>
	                    	<input type="number" class="form-control " name="nrp" placeholder="isi nrp (format angka)" required="true">
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">No. HP: </label>
	                    	<input type="text" class="form-control " name="no_hp" placeholder="isi no. hp (ex: 085764974553 | format angka)" required="true">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Grup Wilayah: </label>
	                    	<select name="grup_wilayah" id="grup_wilayah" class="select-search " required="true" onchange="viewPolres()">
							<option value="">-- Pilih Grup Wilayah --</option>
							<?php foreach ($data_grup_wilayah as $key => $value_grup_wilayah): ?>
								<option value="<?= $value_grup_wilayah->id_grup_wilayah ?>"><?= $value_grup_wilayah->nama_grup_wilayah ?></option>	
							<?php endforeach ?>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Polres: </label>
	                    	<select name="polres" id="polres" class="select-search " required="true" onchange="viewSatuan()">
							
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Satuan: </label>
	                    	<select name="satuan" id="satuan" class="select-search " required="true">
						</select>
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Strata Pendidikan: </label>
	                    	<select name="pendidikan_terakhir" class="select-search " required="true">
							<option value="">-- Pilih Pendidikan --</option>
							<?php foreach ($data_pendidikan_terakhir as $key => $value_pendidikan_terakhir): ?>
								<option value="<?= $value_pendidikan_terakhir->id_pendidikan_terakhir ?>"><?= $value_pendidikan_terakhir->nama_pendidikan_terakhir ?></option>	
							<?php endforeach ?>
						</select>
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Tahun Ijazah: </label>
							<input type="text" name="tahun_ijazah" class="form-control" placeholder="isi tahun (ex: 1994)">
						</div>
	        		</div>

	        		<div class="col-md-4">
						<div class="form-group">
							<label class="text-bold">Gelar: </label>
	                    	<input type="text" class="form-control " name="gelar" placeholder="isi gelar">
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Alamat Email: </label>
	                    	<input type="email" class="form-control " name="email" placeholder="isi alamat email yang valid" required="true">
						</div>
	        		</div>

	        		<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Nama Perguruan Tinggi: </label>
							<textarea class="form-control" name="perguruan_tinggi" rows="3" cols="3" placeholder="isi nama perguruan tinggi"></textarea>
						</div>
	        		</div>
				</div><hr>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="text-bold">Upload Foto: </label>
							<input type="file" name="foto" class="file-styled">
						</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="form-group">
							<label class="text-bold">Status Aktif: </label><br>
							<input type="checkbox" name="status_aktif"  data-on-text="YA" data-off-text="TIDAK" class="switch" 
								checked="checked" data-on-color="primary" data-off-color="danger">
						</div>
	        		</div>
				</div><hr>

				<div class="text-right">
					<button type="submit" class="btn btn-success">Simpan <i class="icon-floppy-disk position-right"></i></button>
					<a href="" class="btn btn-danger">Batal <i class="icon-cancel-circle2 position-right"></i></a>
				</div>
			</fieldset>
		</form>

	</div>

</div>
<!-- /daftar data pekerjaan -->

<!-- script ajax request  -->
<script type="text/javascript">
	function viewPolres() {
		var id_grup_wilayah = document.getElementById('grup_wilayah').value;
		//console.log(id_grup_wilayah);
		$.ajax({
			url: "<?=base_url('penyidik/getPolresByGrupWilayah/')?>"+id_grup_wilayah,
			success: function (response) {
				$('#polres').html(response)
			},
			dataType: 'html'
		});

		return false;
	}

	function viewSatuan() {
		var id_polres = document.getElementById('polres').value;
		//console.log(id_grup_wilayah);
		$.ajax({
			url: "<?=base_url('penyidik/getSatuanByPolres/')?>"+id_polres,
			success: function (response) {
				$('#satuan').html(response)
			},
			dataType: 'html'
		});

		return false;
	}
</script>
<!-- /script ajax request  -->

<!-- script select2  -->
<script type="text/javascript">
	$(function() {
		$('.select-search').select2();

		$(".file-styled").uniform({
			fileButtonHtml: '<i class="icon-plus2"></i>'
		});

		// Switchery
	    // ------------------------------

	    // Initialize multiple switches
	    if (Array.prototype.forEach) {
	        var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	        elems.forEach(function(html) {
	            var switchery = new Switchery(html);
	        });
	    }
	    else {
	        var elems = document.querySelectorAll('.switchery');
	        for (var i = 0; i < elems.length; i++) {
	            var switchery = new Switchery(elems[i]);
	        }
	    }

	    // Checkboxes/radios (Uniform)
	    // ------------------------------

	    // Default initialization
	    $(".styled, .multiselect-container input").uniform({
	        radioClass: 'choice'
	    });

	    // File input
	    $(".file-styled").uniform({
	        wrapperClass: 'bg-blue',
	        fileButtonHtml: '<i class="icon-file-plus"></i>'
	    });

	    // Bootstrap switch
	    // ------------------------------
	    $(".switch").bootstrapSwitch();

	    // formater
	    $('[name="no_hp"]').formatter({
	        pattern: '{{9999}} {{9999}} {{9999}}'
	    });

	    $('[name="tahun_ijazah"]').formatter({
	        pattern: '{{9999}}'
	    });
	})
</script>
<!-- /script select2  -->