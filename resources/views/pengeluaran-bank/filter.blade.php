@extends('layouts.filter')

@section('title', 'Filter Pengeluaran Bank'.' Dari '.date('d-m-Y', strtotime($awal)).' Sampai '.date('d-m-Y', strtotime($akhir)))

@push('css')
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row mt-5">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2 justify-content-center">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                         <div class="row">
                             <a href="{{ route('pengeluaran-bank') }}" class="btn btn-primary btn-sm ml-3 mb-3"> Kembali </a>
                         </div>
                         <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th hidden>TANGGAL</th>
                                        <th>KODE</th>
                                        <th>DIVISI</th>
                                        <th hidden>JENIS PENGELUARAN</th>
                                        <th hidden>JUMLAH PENGELUARAN</th>
                                        <th hidden>BANK</th>
                                        <th hidden>KETERANGAN</th>
                                        <th>JUMLAH</th>
                                        <th style="width: 300px" class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengeluaran_bank as $e=>$item)
                                    <tr>
                                        <td hidden>{{ $item->id }}</td>
                                        <td hidden>{{ date('d F Y ', strtotime ($item->tanggal)) }}</td>
                                        <td>{{ $item->kode_pengeluaran_bank }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td hidden>{{ $item->jenis_pengeluaran }}</td>
                                        <td hidden>{{ $item->jumlah_pengeluaran }}</td>
                                        <td hidden>{{ $item->bank }}</td>
                                        <td hidden>{{ $item->keterangan }}</td>
                                        <td class="text-right">{{ number_format($item->jumlah_pengeluaran,0) }}</td>
                                        <td class="text-center" style="width: 200px">

                                            <a href="#" data-id="{{ $item->id }}"
                                                class="btn btn-sm btn-dark btn-shadow mr-2 mt-2 mb-2 btn-detail">
                                                <i class="fas fa-user-alt"></i>
                                                <span class="align-middle">DETAIL</span>
                                            </a>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- Edit --}}
        <div id="edit" class="modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white">EDIT DATA PENDAPATAN BANK</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">×</button>
                    </div>
                    <form class="form form-vertical" method="post" id="form-edit" enctype="multipart/form-data"
                        action="{{ route('save-pendapatan-bank') }}">
                        @csrf
                        <div class="modal-body">
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-info btn-shadow btn-update">Update</button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- last Edit --}}
    
         {{-- Detail --}}
        <div id="detail" class="modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white">DETAIL DATA PENDAPATAN BANK</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">×</button>
                    </div>
                        <div class="modal-body">
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
        {{-- last Detail --}}
    
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
     $("#jenis_pendapatan").select2({
        placeholder: "Pilih Jenis Pendapatan",
        allowClear: true
    });
     $("#divisi").select2({
        placeholder: "Pilih Divisi",
        allowClear: true
    });
     $("#bank").select2({
        placeholder: "Pilih Bank",
        allowClear: true
    });
</script>
<script>
   function myFunctionTanggal() { 
       // alert('zzzzz');
      var kode = document.getElementById("tanggal").value; 
      var satu = kode.substring(8);
      var dua = kode.substring(5,7);
      var tiga = kode.substring(2,4);
      $('#kode_dua').val("MB"+satu+dua+tiga);
     }
</script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script >
  $(document).ready(function() {
           $('#basic-datatables').DataTable({
               dom: 'Bfrtip',
               buttons: [
                   {
                       extend: 'excel',
                       exportOptions: {
                       columns: [ 1,2,3,4,5,6,7]
                   }   
                   }
               ],
                       aaSorting: [[0, 'desc']]
           });
       });
</script>
<script>
     $('.tampil-filter').on('click', function() {
           // console.log($(this).data('id'))
           let id = $(this).data('id')
           $.ajax({
               url: `/pendapatan-bank/filter`,
               method: "GET",
               success: function(data) {
                   // console.log(data)
                   $('#tampilFilter').find('.modal-body').html(data)
                   $('#tampilFilter').modal('show')
               },
               error: function(error) {
                   console.log(error)
               }
           })
       })


       @if ($errors->any()) {
           $('#insert').modal('show')
       }
       @endif

       $(".swal-confirm").click(function(e) {
           id = e.target.dataset.id;
           Swal.fire({
                   title: 'YAKIN MAU HAPUS DATA?',
                   text: "Data Akan Dihapus Permanen",
                   icon: 'warning',
                   showCancelButton: false,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'YA, HAPUS!'
                   })
               .then((result) => {
                   if (result.isConfirmed) {
                       // Swal.fire({
                       // position: 'center',
                       // icon: 'success',
                       // title: 'Data Berhasil Dihapus',
                       // showConfirmButton: false,
                       // timer: 1800
                       // })
                       $(`#delete${id}`).submit();
                   } else {
                       // swal("Data ini batal dihapus!");
                   }
               });
       });

       $('.btn-detail').on('click', function() {
           // console.log($(this).data('id'))
           let id = $(this).data('id')
           $.ajax({
               url: `/${id}/detail-pengeluaran-bank`,
               method: "GET",
               success: function(data) {
                   // console.log(data)
                   $('#detail').find('.modal-body').html(data)
                   $('#detail').modal('show')
               },
               error: function(error) {
                   console.log(error)
               }
           })
       })
</script>
@endpush