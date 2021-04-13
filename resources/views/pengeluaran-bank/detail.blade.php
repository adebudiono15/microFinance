    <input type="hidden" name="id" value="{{ $pengeluaran_bank->id }}" id="id_data" />
    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>KODE TRANSAKSI</b></h6>
            <h6>{{ $pengeluaran_bank->kode_pengeluaran_bank }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>TANGGAL</b></h6>
            <h6>{{ date('d F Y', strtotime ($pengeluaran_bank->tanggal)) }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>JENIS PENGELUARAN</b></h6>
            <h6>{{ $pengeluaran_bank->jenis_pengeluaran }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-4 mt-3">
            <h6><b>JUMLAH PENGELUARAN</b></h6>
            <h6>Rp. {{ number_format($pengeluaran_bank->jumlah_pengeluaran,0) }},-</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>DIVISI</b></h6>
            <h6>{{ $pengeluaran_bank->divisi }}</h6>
        </div>
        <div class="col-md-4 mt-3">
            <h6><b>BANK</b></h6>
            <h6>{{ $pengeluaran_bank->bank }}</h6>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-6 mt-3">
            <h6><b>KETERANGAN</b></h6>
            <h6>{{ $pengeluaran_bank->keterangan }}</h6>
        </div>
    </div>
