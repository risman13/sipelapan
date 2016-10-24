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

<script type="text/javascript">
	// Basic initialization
	var dt = $('#table').DataTable({
		processing: true,
        serverSide: true,
        "ajax": {
            "url": "<?= base_url('penyidik/ajax_list') ?>",
            "type": "POST"
        },
        columns: [
        	{ data: "A.id_penyidik", "width": "5%" },
	        { data: "$.nama_penyidik" },
	        { data: "C.nama_pangkat" },
	        { data: "A.jabatan" },
	        { data: "B.nama_satuan" },
	        { data: "D.nama_pendidikan_terakhir" },
	        {
	        	data: "A.id_penyidik",
	        	orderable: false,
	        	render: function (data, type, row) {
	        		return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" data-toggle="modal" data-target="#modal-edit-'+data+'"><i class="icon-pencil4"></i> Edit</a></li><li><a href="#" onclick="hapus()"><input type="hidden" name="id_agama" id="id_agama-" value=""><i class="icon-trash"></i> Hapus</a></li></ul></li></ul>'
	        	}
	        }
        ],
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