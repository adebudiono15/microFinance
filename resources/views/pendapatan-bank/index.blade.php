@extends('layouts.master')

@section('title', 'Pendapatan Bank')

@push('css')
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="content">
        <div class="panel-header bg-dark-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
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
                            <div class="row mb-5">
                                <form class="form form-vertical" method="get" enctype="multipart/form-data"
                                action="{{ url('pendapatan-bank/filter') }}">
                                @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="date" class="form-control form-control-sm"
                                                    name="awal" autocomplete="off"  id=""  style="height: 28px;" value="{{ $awal }}">
                                            </div>
                                        </div>
                                        <span style="margin-top: 17px;">Sampai</span>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                    <input type="date" class="form-control form-control-sm"
                                                    name="akhir" autocomplete="off"  id=""  style="height: 28px;" value="{{ $akhir }}">
                                            </div>
                                        </div>
                                         <div class="col-md-2">
                                             <button type="submit" class="btn btn-sm btn-primary btn-shadow" style="margin-top:12px;">Filter</button>
                                         </div>
                                    </div>
                            </form>
                            </div>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th hidden>TANGGAL</th>
                                            <th>KODE</th>
                                            <th hidden>DIVISI</th>
                                            <th>JENIS PENDAPATAN</th>
                                            <th hidden>JUMLAH PENDAPATAN</th>
                                            <th hidden>BANK</th>
                                            <th hidden>KETERANGAN</th>
                                            <th>JUMLAH</th>
                                            <th style="width: 300px" class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendapatan_bank as $e=>$item)
                                        <tr>
                                            <td hidden>{{ $item->id }}</td>
                                            <td hidden>{{ date('d F Y ', strtotime ($item->tanggal)) }}</td>
                                            <td>{{ $item->kode_pendapatan_bank }}</td>
                                            <td hidden>{{ $item->divisi }}</td>
                                            <td>{{ $item->jenis_pendapatan }}</td>
                                            <td hidden>{{ $item->jumlah_pendapatan }}</td>
                                            <td hidden>{{ $item->bank }}</td>
                                            <td hidden>{{ $item->keterangan }}</td>
                                            <td class="text-right">{{ number_format($item->jumlah_pendapatan,0) }}</td>
                                            <td class="text-center" style="width: 200px">
                                                {{--  <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-info btn-shadow mr-2 mt-2 mb-2 btn-edit">
                                                    <i class="far fa-edit"></i>
                                                    <span class="align-middle">EDIT</span>
                                                </a>  --}}

                                                <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-dark btn-shadow mr-2 mt-2 mb-2 btn-detail">
                                                    <i class="fas fa-user-alt"></i>
                                                    <span class="align-middle">DETAIL</span>
                                                </a>
                
                                                {{--  <a href="#" data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-danger btn-shadow mt-2 mb-2 swal-confirm">
                                                    <form action="{{ route('delete-pendapatan-bank', $item->id) }}"
                                                        id="delete{{ $item->id }}" method="POST">
                                                        @csrf
                                                        
                                                        @method('delete')
                                                        <i data-id="{{ $item->id }}" class="fas fa-trash-alt"></i>
                                                        <span data-id="{{ $item->id }}" class="align-middle">HAPUS
                                                    </form>
                                                </a>  --}}
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
    <div class="custom-template">
			<div class="custom-toggle" style="background:#1A2035 !important;" href="#insert" data-toggle="modal">
				<i class="fas fa-plus-circle"></i>
			</div>
    </div>
    
    {{-- Insert --}}
    <div id="insert" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">TAMBAH DATA PENDAPATAN BANK</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">×</button>
                </div>
                <form class="form form-vertical" method="post" enctype="multipart/form-data"
                    action="{{ route('save-pendapatan-bank') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal" @error('tanggal') class="text-danger" @enderror>TANGGAL @error('tanggal')
                                        | {{ $message }}
                                        @enderror</label>
                                        <input type="date"  class="form-control form-control-sm" name="tanggal" onchange="myFunctionTanggal()" id="tanggal" placeholder="Small Input">
                                        <input type="hidden" value="{{ $kode }}" name="kode_dua">
                                        <input type="text" name="kode_satu" id="kode_dua" hidden>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="keterangan" @error('keterangan') class="text-danger" @enderror>KETERANGAN @error('pengeluaran')
                                            | {{ $message }}
                                            @enderror</label>
                                            <input type="text" class="form-control form-control-sm" value="-" name="keterangan" id="smallInput" placeholder="-">
                                            <input type="hidden" name="divisi" value="{{ Auth::user()->pengguna }}" id="">
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pengeluaran" @error('pengeluaran') class="text-danger" @enderror>NAMA JENIS PENDAPATAN @error('pengeluaran')
                                        | {{ $message }}
                                        @enderror</label>
                                        <select id="jenis_pendapatan" name="jenis_pendapatan" class="js-states form-control" style="width: 100%">
                                            <option value=""></option>
                                           {{-- @foreach ($jenis_pendapatan as $item) --}}
                                            <option value="Penjualan Bank">Penjualan Bank</option>
                                            <option value="Pendapatan Lain-lain">Pendapatan Lain-lain</option>
                                            <option value="Pendapatan Piutang">Pendapatan Piutang</option>
                                           {{-- @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="jumlah_pendapatan" @error('jumlah_pendapatan') class="text-danger" @enderror>JUMLAH PENDAPATAN @error('tanggal')
                                        | {{ $message }}
                                        @enderror</label>
                                        <input type="text"   class="form-control form-control-sm" name="jumlah_pendapatan" id="rupiah" placeholder="-">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="bank" @error('bank') class="text-danger" @enderror>BANK @error('pengeluaran')
                                        | {{ $message }}
                                        @enderror</label>
                                        <select id="bank" name="bank" class="js-states form-control" style="width: 100%">
                                            <option value=""></option>
                                           @foreach ($bank as $item)
                                            <option value="{{ $item->nama_bank }}">{{ $item->nama_bank }}</option>
                                           @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-info btn-shadow">Simpan</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- last Insert --}}

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
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
       
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa             = split[0].length % 3,
        rupiah             = split[0].substr(0, sisa),
        ribuan             = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>
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
      $('.btn-edit').on('click', function() {
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/${id}/edit-pendapatan-bank`,
                method: "GET",
                success: function(data) {
                    // console.log(data)
                    $('#edit').find('.modal-body').html(data)
                    $('#edit').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

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

        $('.btn-update').on('click', function() {
            // console.log($(this).data('id'))
            let id = $('#form-edit').find('#id_data').val()
            let formData = $('#form-edit').serialize()
            console.log(formData)
            $.ajax({
                url: `/pendapatan-bank/update/${id}`,
                method: "PATCH",
                data:formData,
                success: function(data) {
                    // console.log(data)
                    $('#edit').modal('hide')
                    window.location.assign('/pendapatan-bank')
                },
                error: function(err) {
                    console.log(err.responseJSON)
                    let err_log = err.responseJSON.errors;
                    if (err.status == 422){
                        if (typeof(err_log.satuan) !== 'undefined'){
                            $('#edit').find('[name="nama_jenis_pengeluaran"]').prev().html('<span style="color:red">Jenis Pengeluaran | '+err_log.divisi[0]+'</span>')
                        }else{
                            $('#edit').find('[name="nama_jenis_pengeluaran"]').prev().html('<span>Jenis Pengeluaran</span>')
                        }
                    }
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
                url: `/${id}/detail-pendapatan-bank`,
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