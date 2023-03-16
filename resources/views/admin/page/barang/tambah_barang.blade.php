@extends('admin.layout.app')
@section('content')
<div class="container mt-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Barang') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/tambah_data_barang" autofocus autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            
                            <label for="nama_barang" class="col-md-4 col-form-label text-md-end">{{ __('Nama Barang') }}</label>

                            <div class="col-md-6">
                                <input id="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" required>

                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="" name="image" id="image" placeholder="" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <label for="deskripsi_barang" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi Barang') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi_barang" type="text-area" class="form-control @error('deskripsi_barang') is-invalid @enderror" name="deskripsi_barang" value="{{ old('deskripsi_barang') }}" required>

                                @error('deskripsi_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="harga_awal" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga_awal" type="number" class="form-control @error('harga_awal') is-invalid @enderror" name="harga_awal" value="{{ old('harga_awal') }}" required>

                                @error('harga_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <label for="tgl" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>

                            <div class="col-md-6">
                                <input id="tgl" type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{ old('tgl') }}" required>

                                @error('tgl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
