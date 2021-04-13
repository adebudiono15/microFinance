    <input type="hidden" name="id" value="{{ $pendapatan_tunai->id }}" id="id_data" />
    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>KODE TRANSAKSI</b></h6>
            <h6>{{ $pendapatan_tunai->kode_pendapatan_tunai }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>TANGGAL</b></h6>
            <h6>{{ date('d F Y', strtotime ($pendapatan_tunai->tanggal)) }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>JENIS PENDAPATAN</b></h6>
            <h6>{{ $pendapatan_tunai->jenis_pendapatan }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>JUMLAH PENDAPATAN</b></h6>
            <h6>Rp. {{ number_format($pendapatan_tunai->jumlah_pendapatan,0) }},-</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>DIVISI</b></h6>
            <h6>{{ $pendapatan_tunai->divisi }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>KETERANGAN</b></h6>
            <h6>{{ $pendapatan_tunai->keterangan }}</h6>
        </div>
    </div>