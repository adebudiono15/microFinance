    <input type="hidden" name="id" value="{{ $pendapatan_bank->id }}" id="id_data" />
    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>KODE TRANSAKSI</b></h6>
            <h6>{{ $pendapatan_bank->kode_pendapatan_bank }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>TANGGAL</b></h6>
            <h6>{{ date('d F Y', strtotime ($pendapatan_bank->tanggal)) }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>JENIS PENDAPATAN</b></h6>
            <h6>{{ $pendapatan_bank->jenis_pendapatan }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>JUMLAH PENDAPATAN</b></h6>
            <h6>Rp. {{ number_format($pendapatan_bank->jumlah_pendapatan,0) }},-</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>DIVISI</b></h6>
            <h6>{{ $pendapatan_bank->divisi }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>BANK</b></h6>
            <h6>{{ $pendapatan_bank->bank }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-6 mt-3">
            <h6><b>KETERANGAN</b></h6>
            <h6>{{ $pendapatan_bank->keterangan }}</h6>
        </div>
    </div>
