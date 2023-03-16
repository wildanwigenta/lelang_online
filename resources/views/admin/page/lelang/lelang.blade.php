@extends('admin.layout.app')
@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">LELANG TABLES</h3>
            {{-- <a href="/admin/tambah_barang" class="btn btn-primary float-right">+ Tambah</a> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelelang</th>
                    <th>Nama Barang</th>
                    <th>Barang</th>
                    <th>Tanggal Lelang</th>
                    <th>Harga Awal</th>
                    <th>Harga Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($lelang as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->nama_barang }}</td>
                        <td><img src="{{ asset('image/barang/'.$row->image) }}" style="width:100px" alt=""></td>
                        <td>{{ $row->tgl_lelang }}</td>
                        <td>Rp.{{ number_format($row->harga_awal) }}</td>
                        <td>Rp.{{ number_format($row->harga_akhir) }}</td>
                        <td>
                            <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/confirm_status_barang/{{ $row->id_lelang }}" method="post">
                                @csrf
                                <button class="btn btn-{{ $row->status == 'dibuka' ? 'success' : 'danger'}} " onclick="" value="{{ $row->status }}" name="status" type="submit">{{ $row->status }}</button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
@endsection