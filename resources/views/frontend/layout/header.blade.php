<!-- header -->
<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p>"Berikan Harga Tertinggi Anda" . <a href="/">BELI SEKARANG</a></p>
        </div>
        <div class="agile-login">
            <ul>
                @if(Auth::check() == NULL)
                <li><a href="/register"> Sign Up </a></li>
                <li><a href="/login">Sign In</a></li>
                @else

                <li>
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                
                @endif
                
            </ul>
        </div>
        @if(Auth::check())
        <div class="product_list_header" style="float:left; padding-left:2vh">
            
            <p style="float:right; color:#FFF;margin-top:1vh;margin-left:0.8vh;">{{ substr(Auth::user()->name,0,15) }}</p>
            <img src="{{ asset('image') }}/user/avatar.png" style="width:40px" alt="" style="float:left">
            
        </div>
        <div class="clearfix"> </div>
        @endif
    </div>
</div>

<div class="logo_products">
    <div class="container">
    <div class="w3ls_logo_products_left1">
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="/">LELANG  -AJA-</a></h1>
        </div>
        
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->