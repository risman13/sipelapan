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
		<h5 class="panel-title">Daftar Data Pekerjaan</h5>
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
				<th>Nama Jenis Pekerjaan</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no = 0; foreach ($data_pekerjaan as $key => $value_pekerjaan): $no++;?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $value_pekerjaan->nama_pekerjaan ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li>
									<a href="#" data-toggle="modal" data-target="#modal-edit-<?= $value_pekerjaan->id_pekerjaan ?>">
										<i class="icon-pencil4"></i> Edit
									</a>
								</li>
								<li>
									<a href="#" onclick="sweet_combine()"">
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

<!-- modal tambah data -->
<div id="model-tambah" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Tambah Data Pekerjaan</h5>
			</div>

			<form action="<?=base_url('master/data_pekerjaan_tambah')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label>Nama Jenis Pekerjaan</label>
								<input type="text" name="nama_pekerjaan" placeholder="isi nama pekerjaan" class="form-control" required="true">
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

<!-- modal edit data -->
<?php foreach ($data_pekerjaan as $key => $modal): ?>
	<div id="modal-edit-<?= $modal->id_pekerjaan ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Tambah Data Pekerjaan</h5>
				</div>

				<form action="<?=base_url('master/data_pekerjaan_edit')?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Nama Jenis Pekerjaan</label>
									<input type="text" name="nama_pekerjaan" placeholder="isi nama pekerjaan" class="form-control" required="true" value="<?= $modal->nama_pekerjaan ?>">

									<input type="hidden" name="id" value="<?= $modal->id_pekerjaan ?>">
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
<?php endforeach ?>
<!-- /modal edit data -->

<script type="text/javascript">
	function sweet_combine() {
		swal({
            title: "Ingin hapus data ini?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: "Your imaginary file has been deleted.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
	}
</script>