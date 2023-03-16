@extends('admin.layout.app')
@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">USER TABLES</h3>
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/tambah_user" class="btn btn-primary float-right">+ Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-3 mb-3">
                <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/user" method="post">
                    @csrf
                    <select name="filter_level" class="form-control" id="" onchange="if(this.value != 0) {this.form.submit();}" >
                        <option value="all">All User</option>
                        <option value="admin" {{ request()->filter_level == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ request()->filter_level == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="masyarakat" {{ request()->filter_level == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                    </select>
                </form>
            </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Level</th>
                    <th>Nama</th>
                    <th>No Telpon</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($user as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->level }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->no_telp }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/edit_user/{{ $row->id }}" class="btn btn-warning">Edit</a>
                            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/hapus_user/{{ $row->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
@endsection