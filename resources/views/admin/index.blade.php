@extends('admin.layout.app')
@section('content')
@php
    use App\Models\User;
    use App\Models\Barang;
    use App\Models\Lelang;
@endphp
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mt-2">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">All User</span>
                    <span class="info-box-number">
                        {{ User::all()->count() }}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box-open"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Barang Lelang</span>
                    <span class="info-box-number">
                        {{ Barang::all()->count() }}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box-open"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Barang Lelang Dibuka</span>
                    <span class="info-box-number">
                        {{ Lelang::where('status','dibuka')->count() }}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
                <div class="col-12 col-md-4 mt-4">
                    <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                        <h4><b><a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/laporan_lelang" style="color: black;">Laporan Lelang</a></b></h4>
                    </div>  
                    </div>
                </div>
        </div>

    </div>
@endsection