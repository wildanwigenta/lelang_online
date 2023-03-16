@extends('admin.layout.app')
@section('content')
@php
    use App\Models\Lelang;
@endphp
<div class="card">
        <div class="card-header">
          <h3 class="card-title">BARANG TABLES</h3>
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/tambah_barang" class="btn btn-primary float-right">+ Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="col-md-3 mb-3">
                <form action="/admin/masakan" method="post">
                    @csrf
                <select name="filter_masakan" class="form-control" id="" onchange="if(this.value != 0) {this.form.submit();}" >
                    <option value="all">All</option>
                    <option value="makanan" {{ request()->filter_masakan == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ request()->filter_masakan == 'minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
                </form>
            </div> --}}
          <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Harga Awal</th>
                    <th>Tanggal</th>
                    <th>Lelang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($barang as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_barang }}</td>
                        <td><img src="{{ asset('image/barang/'.$row->image) }}" style="width:100px" alt=""></td>
                        <td>{{ $row->deskripsi_barang }}</td>
                        <td>Rp.{{ number_format($row->harga_awal) }}</td>
                        <td>{{ $row->tgl }}</td>
                        <td>
                            @if (Lelang::where('id_barang',$row->id_barang)->get()->count() <= 0)
                            <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/tambah_barang_lelang" method="post">
                                @csrf
                                <button class="btn btn-success" name="id_barang" value="{{ $row->id_barang }}">Tambah ke Lelang</button>
                            </form>
                            @else
                                <button class="btn btn-secondary disabled" name="id_barang" value="{{ $row->id_barang }}">Barang sudah di lelang</button>
                            @endif
                        </td>
                        <td>
                            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/edit_barang/{{ $row->id_barang }}" class="btn btn-warning">Edit</a>
                            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/hapus_barang/{{ $row->id_barang }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
@endsection