/**
 * 
 */
$(document).ready(function(){
	$('#dataTables-list').DataTable({
		language: {
			"search": "Cari:",
			"emptyTable":     "Tidak ada data pada tabel",
			"infoEmpty":      "Menampilkan 0 data",
			"info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
			"infoFiltered":   "(Disortir dari _MAX_ total data)",
			"lengthMenu":     "Menampilkan _MENU_ data",
			"loadingRecords": "Memuat...",
			"processing":     "Memproses...",
			"zeroRecords":    "Pencarian tidak ditemukan",
			"paginate": {
				"first":      "Pertama",
				"last":       "Terakhir",
				"next":       "Selanjutnya",
				"previous":   "Sebelumnya"
			},
			"aria": {
				"sortAscending":  ": Mensortir kolom secara ascending",
				"sortDescending": ": Mensortir kolom secara descending"
			}
		},
		responsive:true,
		scrollX:true
	});
    
});