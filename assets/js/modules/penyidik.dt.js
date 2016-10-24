	$('#table').DataTable({
		processing: true,
        serverSide: true,
        "ajax": {
            "url": DT_DATA_PATH + "penyidik/ajax_list",
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

	$('.dataTables_filter input[type=search]').attr('placeholder','Ketik untuk pencarian...');

	$('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });