@extends('layouts.master')

@section('title', 'Dashboard')

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
                            {{--  Pendapatan  --}}
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="icon-logout"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pendapatan Bank</p>
                                                        <h4 class="card-title">{{ number_format($pendapatan_bank,0) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pendapatan Tunai</p>
                                                        <h4 class="card-title">{{ number_format($pendapatan_tunai,0) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pendapatan Piutang</p>
                                                        <h4 class="card-title">xxxxxxxx</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  Pengeluaran  --}}
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-arrows-1"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pengeluaran Bank</p>
                                                        <h4 class="card-title">{{ number_format($pengeluaran_bank,0) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pengeluaran Tunai</p>
                                                        <h4 class="card-title">xxxxxxxx</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-danger card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pengeluaran Hut</p>
                                                        <h4 class="card-title">xxxxxxxx</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
@endsection