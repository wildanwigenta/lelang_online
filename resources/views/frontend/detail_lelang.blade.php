@extends('frontend.layout.app')
@section('content_f')

<div class="top-brands">
    <div class="container">
    <h2>Detail Lelang</h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Detail Barang</a></li>
                    <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Peserta Lelang</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
                        <div class="agile_top_brands_grids">

                                <div class="col-12 col-md-3 top_brand_left mt-2">
                                    <img src="{{ asset('image/barang/'.$detail_lelang->image) }}" alt="" srcset="" style="width:100%">
                                </div>
                                <div class="col-12 col-md-1 top_brand_left mt-2">
                                </div>
                                <div class="col-12 col-md-8 top_brand_left mt-2">
                                    <h4>Nama Barang</h4>
                                    <p>{{ $detail_lelang->nama_barang }}</p><br>
                                    <h4>Harga Awal Lelang</h4>
                                    <p>Rp.{{ number_format($detail_lelang->harga_awal) }}</p><br>
                                    <h4>Penawaran Tertinggi</h4>
                                    <p>Rp.{{ number_format($detail_lelang->harga_akhir) }}</p><br>
                                    <h4>Deskripsi</h4>
                                    <p>{{ $detail_lelang->deskripsi_barang }}</p><br>

                                    <form action="/tawar_harga/{{ $detail_lelang->id_lelang }}" method="post">
                                        @csrf
                                        <label for="">Masukan Harga</label>
                                        <input id="" type="number" class="form-control" name="harga_akhir" value="" required>
                                        <button type="submit" class="btn btn-primary " style="margin-top: 1vh">
                                            {{ __('Ikut Lelang') }}
                                        </button>
                                    </form>
                                    
                                </div>
                                <div class="clearfix"> </div>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab" >
                        <div class="agile-tp">
                            <h5>Pelelang</h5>
                        </div>
                        <div  style="overflow: scroll;max-height:500px;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelelang</th>
                                        <th>Nama Barang</th>
                                        <th>Tawaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pelelang as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td>Rp.{{ number_format($row->penawaran_harga) }}</td>
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

@endsection
