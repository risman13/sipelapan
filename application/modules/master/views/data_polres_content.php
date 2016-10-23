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
		<h5 class="panel-title">Daftar Data POLRES</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="reload"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		<button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#modal-tambah"><b><i class="icon-plus3"></i></b> Tambah Data</button>
	</div>

	<!-- table -->
	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>#</th>
				<th>Grup Wilayah</th>
				<th>Nama POLRES</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no = 0; foreach ($data_polres as $key => $value_polres): $no++;?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $value_polres->nama_grup_wilayah ?></td>
				<td><?= $value_polres->nama_polres ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li>
									<a href="#" data-toggle="modal" data-target="#modal-edit-<?= $value_polres->id_polres ?>">
										<i class="icon-pencil4"></i> Edit
									</a>
								</li>
								<li>
									<a href="#" onclick="hapus<?= $value_polres->id_polres ?>()">
										<input type="hidden" name="id_polres" 
											id="id_polres-<?= $value_polres->id_polres ?>" value="<?= $value_polres->id_polres ?>">
										<i class="icon-trash"></i> Hapus
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<!-- /table -->

</div>
<!-- /daftar data pekerjaan -->

<script type="text/javascript">
	// Basic initialization
	$('.datatable-basic').DataTable({
		autoWidth: true,
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
	    language: {
	        search: '<span>Filter:</span> _INPUT_',
	        lengthMenu: '<span>Show:</span> _MENU_',
	        paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
	    },
	    drawCallback: function () {
	        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
	    },
	    preDrawCallback: function() {
	        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
	    }
	});

	$('.dataTables_filter input[type=search]').attr('placeholder','Ketik untuk pencarian...');

	$('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
</script>

<!-- script select2  -->
<script type="text/javascript">
	$(function() {
		$('.select-search').select2();
	})
</script>
<!-- /script select2  -->

<!-- modal tambah data -->
<div id="modal-tambah" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Tambah Data POLRES</h5>
			</div>

			<form action="<?=base_url('master/data_polres_tambah')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Grup Wilayah</label>
						<select name="grup_wilayah" class="select-search" required="true">
							<option value="">-- Pilih Grup Wilayah --</option>
							<?php foreach ($data_grup_wilayah as $key => $value_grup_wilayah): ?>
								<option value="<?= $value_grup_wilayah->id_grup_wilayah ?>"><?= $value_grup_wilayah->nama_grup_wilayah ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label>Nama POLRES</label>
								<input type="text" name="nama_polres" placeholder="isi nama POLRES" class="form-control" required="true">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /modal tambah data -->

<?php foreach ($data_polres as $key => $modal): ?>
	<!-- modal edit data -->
	<div id="modal-edit-<?= $modal->id_polres ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Edit Data POLRES</h5>
				</div>

				<form action="<?=base_url('master/data_polres_edit')?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Grup Wilayah</label>
							<select name="grup_wilayah" class="select-search" required="true">
								<option value="">-- Pilih Grup Wilayah --</option>
								<?php 
								foreach ($data_grup_wilayah as $key => $value_grup_wilayah): 
									if ($modal->id_grup_wilayah == $value_grup_wilayah->id_grup_wilayah) {
										$selected = 'selected';
									} else {
										$selected = '';
									}
								?>
									<option <?= $selected ?> value="<?= $value_grup_wilayah->id_grup_wilayah ?>"><?= $value_grup_wilayah->nama_grup_wilayah ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Nama POLRES</label>
									<input type="text" name="nama_polres" placeholder="isi nama POLRES" class="form-control" 
										required="true" value="<?= $modal->nama_polres ?>">

									<input type="hidden" name="id" value="<?= $modal->id_polres ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /modal edit data -->

<script type="text/javascript">
	function hapus<?= $modal->id_polres ?>() {
		swal({
            title: "Ingin hapus data '<?= $modal->nama_polres ?>' ?",
            text: "Data anda akan dihapus secara permanen",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Ya, hapus data",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function() {
        	var id_polres = document.getElementById('id_polres-<?= $modal->id_polres ?>').value;
        	//console.log(id_polres);
        	$.ajax({
        		type: "POST",
        		url: "<?=base_url('master/data_polres_hapus')?>",
        		data: {
        			id_polres: id_polres
        		},
        		success: function(result) {
        			var data_parsed = JSON.parse(result);

        			swal({
        				title: data_parsed.return_title,
        				text: data_parsed.return_mesage,
        				type: data_parsed.return_status
        			},
        			function() {
        				window.location.href = '<?=base_url('master/data_polres')?>';
        			});
        		},
        		error: function() {
        			swal("Error!", "Terjadi kesalahan request", "error");
        		}
        	});
        	//swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
        });
	}
</script>
<?php endforeach ?>