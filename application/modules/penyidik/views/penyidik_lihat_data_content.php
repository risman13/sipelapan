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
		<h5 class="panel-title">Daftar Data Agama</h5>
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
	<table class="table" id="table">
		<thead>
			<tr>
				<th>ID Pekerjaan</th>
				<th>Nama Agama</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- /table -->

</div>
<!-- /daftar data pekerjaan -->

<script type="text/javascript">
	// Basic initialization
	var dt = $('#table').DataTable({
		"processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('penyidik/ajax_list') ?>",
            "type": "POST"
        },
        columns: [
        	{ data: "A.id_pekerjaan" },
	        { data: "A.nama_pekerjaan" },
	        {
	        	data: "A.id_pekerjaan",
	        	render: function (data, type, row) {
	        		return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" data-toggle="modal" data-target="#modal-edit-'+data+'"><i class="icon-pencil4"></i> Edit</a></li><li><a href="#" onclick="hapusA.id_pekerjaan()"><input type="hidden" name="id_agama" id="id_agama-A.id_pekerjaan" value="A.id_pekerjaan"><i class="icon-trash"></i> Hapus</a></li></ul></li></ul>'
	        	}
	        }
        ],
		autoWidth: true,
		scrollY: 450,
	    scroller: true,
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

	$('#myTable').on( 'click', 'tr', function () {
	    var id = table.row( this ).id();
	 
	    alert( 'Clicked row id '+id );
	} );

	$('.dataTables_filter input[type=search]').attr('placeholder','Ketik untuk pencarian...');

	$('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
</script>

<!-- modal tambah data -->
<div id="modal-tambah" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Tambah Data Agama</h5>
			</div>

			<form action="<?=base_url('master/data_agama_tambah')?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label>Nama Agama</label>
								<input type="text" name="nama_agama" placeholder="isi nama agama" class="form-control" required="true">
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