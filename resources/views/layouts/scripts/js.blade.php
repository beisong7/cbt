<!-- modernizr css -->
<script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<!-- all js here -->
<!-- jquery latest version -->
<script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- tether js -->
<script src="{{ asset('assets/js/tether.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- owl.carousel js -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- meanmenu js -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- jquery-ui js -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!-- easypiechart js -->
<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
<!-- particles js -->
<!-- wow js -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- smooth-scroll js -->
<script src="{{ asset('assets/js/smooth-scroll.min.js') }}"></script>
<!-- plugins js -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/echarts-en.min.js') }}"></script>
<script src="{{ asset('assets/js/echarts-liquidfill.min.js') }}"></script>
<script src="{{ asset('assets/js/vc_round_chart.min.js') }}"></script>
<script src="{{ asset('assets/js/videojs-ie8.min.js') }}"></script>
<script src="{{ asset('assets/js/video.js') }}"></script>
<script src="{{ asset('assets/js/Youtube.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


<script>
    function isNumberKey(evt) {
        let k = evt.key;
        if(isNaN(k)){
            if(k==="."){
                return true;
            }
            return false;
        }else{
            if(k===" "){
                return false;
            }
            return true;
        }
    }

//    let caro = $('.carousel');
//    caro.carousel({
//        interval: 4000,
//    });
</script>