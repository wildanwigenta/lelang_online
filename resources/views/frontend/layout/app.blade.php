<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>LelangAja</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //for-mobile-apps -->
<link href="{{ asset('web') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('web') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ asset('web') }}/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ asset('web') }}/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('web') }}/js/move-top.js"></script>
<script type="text/javascript" src="{{ asset('web') }}/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

{{-- online--}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

</head>
	
<body>
<!-- header -->
	@include('frontend.layout.header')
<!-- //header -->

<!-- navigation -->
    @include('frontend.layout.navigation')
<!-- //navigation -->

	<!-- //top-header and slider -->

	<!-- top-brands -->
	    @yield('content_f')
    <!-- //top-brands -->

<!-- //footer -->
<div class="footer">
		<div class="footer-copy">
			<div class="container">
				<p>© 2023 LelangAja. All rights reserved | Design by <a href="/">LelangAja</a></p>
			</div>
		</div>
</div>	
<!-- //footer -->	

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('web') }}/js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{ asset('web') }}/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="{{ asset('web') }}/js/skdslider.min.js"></script>
<link href="{{ asset('web') }}/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':4000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    @if ($message = Session::get('delete'))
        Swal.fire({
            title: 'App said:',
            text: '{{ $message }}',
            icon: 'error',
        });
    @endif
    @if ($message = Session::get('success'))
        Swal.fire({
            title: 'App said:',
			
            text: '{{ $message }}',
            icon: 'success',
        });
    @endif
    @if ($message = Session::get('warning'))
        Swal.fire({
            title: 'App said:',
            text: '{{ $message }}',
            icon: 'warning',
        });
    @endif
    </script>
<!-- //main slider-banner --> 
</body>
</html>