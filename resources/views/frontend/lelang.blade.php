@extends('frontend.layout.app')
@section('content_f')
	
	<!-- main-slider -->
    <ul id="demo1">
        <li>
            <img src="{{ asset('web') }}/images/11.jpg" alt="" />
            <!--Slider Description example-->
            <div class="slide-desc">
                <h3>cari barang yang anda butuhkan bersama kami</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('web') }}/images/22.jpg" alt="" />
              <div class="slide-desc">
                <h3>Bid secepatnya online bersama kami</h3>
            </div>
        </li>
        
        <li>
            <img src="{{ asset('web') }}/images/44.jpg" alt="" />
            <div class="slide-desc">
                <h3>kami siap melayani anda</h3>
            </div>
        </li>
    </ul>
<!-- //main-slider -->

    <div class="top-brands">
        <div class="container">
        <h2>Galeri Lot Lelang</h2>
            <div class="grid_3 grid_5">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <div class="text-center" id="expeditions-tab" style="background-color:#fe9126;color:#FFF;text-transform: uppercase;font-size:20px;padding:10px 0px;font-weight:600;">Barang Lelang</div>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
                            <div class="agile-tp">
                                <h5>Update Barang Setiap Minggu</h5>
                                <p class="w3l-ad" style="color:rgb(255, 145, 0);">--- Kami Mengupdate Maksimal 6 Barang per Minggunya ---</p>
                            </div>
                            <div class="agile_top_brands_grids">

                                @foreach ($b_lelang->take(6) as $row)

                                    <div class="col-md-4 top_brand_left mt-2">
                                        <div class="hover14 column">
                                            <div class="agile_top_brand_left_grid">
                                                <div class="agile_top_brand_left_grid1">
                                                    <figure>
                                                        <div class="snipcart-item block" >
                                                            <div class="snipcart-thumb">
                                                                <div class="text-center">
                                                                    <img title=" " alt=" " src="{{ asset('image/barang/'.$row->image) }}"  style="width:80%"/>		
                                                                </div>
                                                                <p>{{ $row->nama_barang }}</p>
                                                                <h4>Rp.{{ number_format($row->harga_awal) }}</h4>
                                                            </div>
                                                            <div class="snipcart-details top_brand_home_details">
                                                                <a href="/detail_lelang/{{ $row->id_lelang }}" class="btn btn-primary">Lelang</a>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach

                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
