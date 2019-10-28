<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Medical Premium Theme | Medicus</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-touch-fullscreen" content="yes">
    <!-- FAVICON-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('frontend/assets/favicon/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('frontend/assets/favicon/apple-touch-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('frontend/assets/favicon/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('frontend/assets/favicon/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('frontend/assets/favicon/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('frontend/assets/favicon/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('frontend/assets/favicon/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('frontend/assets/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('frontend/assets/favicon/apple-touch-icon-180x180.png')}}">
    <link rel="icon" type="image/png" href="{{url('frontend/assets/favicon/favicon-32x32.png" sizes="32x32')}}">
    <link rel="icon" type="image/png" href="{{url('frontend/assets/favicon/android-chrome-192x192.png" sizes="192x192')}}">
    <link rel="icon" type="image/png" href="{{url('frontend/assets/favicon/favicon-96x96.png" sizes="96x96')}}">
    <link rel="icon" type="image/png" href="{{url('frontend/assets/favicon/favicon-16x16.png" sizes="16x16')}}">
    <link rel="manifest" href="{{url('frontend/assets/favicon/manifest.json')}}">
    <link rel="shortcut icon" href="{{url('frontend/assets/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{url('frontend/assets/favicon/mstile-144x144.png')}}">
    <meta name="msapplication-config" content="{{url('frontend/assets/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900" rel="stylesheet" type="text/css">
    <!-- OWLSLIDER-->
    <link rel="stylesheet" href="{{url('frontend/assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.carousel.css')}}" type="text/css" media="all" data-module="owlslider">
    <link rel="stylesheet" href="{{url('frontend/assets/js/libs/owl.carousel.2.0.0-beta.2.4/css/owl.theme.default.css')}}" type="text/css" media="all" data-module="owlslider">
    <!-- ANIMATE.CSS LIBRARY-->
    <link rel="stylesheet" href="{{url('frontend/assets/css/libs/animate.min.css')}}" type="text/css" media="all">
    <!-- ICON WEB FONTS	-->
    <link rel="stylesheet" href="{{url('frontend/assets/fonts/font-awesome/css/font-awesome.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{url('frontend/assets/fonts/webfont-medical-icons/wfmi-style.css')}}" type="text/css" media="all">
    <!-- MAIN STYLESHEETS-->
    <link rel="stylesheet" href="{{url('frontend/assets/css/theme_custom_bootstrap.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{url('frontend/assets/css/style.css')}}" type="text/css" media="all">
    <!-- HEADER SCRIPTS	-->
    <script type="text/javascript" src="{{url('frontend/assets/js/libs/modernizr.custom.48287.js')}}"></script>
    <!-- Style Switcher, You propably want to remove this!-->
    <link rel="stylesheet" href="{{url('frontend/assets/css/_style-switcher.css')}}" type="text/css" media="all">
</head>
<body class="sticky_header">
<div class="overflow_wrapper">
    <!-- =========================== HEADER ==========================-->
    <div class="header">
        <div class="mainbar gradient diagonal">
            <div class="container">
                <div class="logo"><a href="{{url('/')}}" class="brand">
                  <img src="{{url('frontend/assets/images/medicus-header-logo-x64.png')}}" alt="logo"></a>
                </div>
                <div class="menu_container"><span class="close_menu">&times;</span>
                  <!-- ========================= NAVIGATION MENU ========================-->
                  <nav>
                    <ul class="menu main_menu hover_menu">
                      @foreach(App\Page::where('active',1)->where('page_id',0)->where('nav',1)->get() as $page)
                        <li class="{{count($page->childs) > 0 ? 'lihasdropdown' : ''}} two-column drop-left"><a title="more" href="{{'/'.url(app()->getLocale().'/'.$page->slug)}}">{{$page->title[app()->getLocale()] }} </a>
                          @if(count($page->childs) > 0)
                            <ul class="menu-dropdown">
                              @foreach($page->childs as $child)
                                <li><a title="{{$child->title['en']}}" href="{{url($child->slug)}}">{{$child->title['en']}} - {{trans('app.Home')}} </a></li>
                              @endforeach
                            </ul>
                          @endif
                        </li>



                      @endforeach

                      <li class="lihasdropdown drop-left"><a title="{{trans('app.Language')}}" href=""><img src="{{url('frontend/assets/images/egy.jpg')}}" width="20"> </a>
                        <ul class="menu-dropdown">
@foreach($lang as $lan)
                          <li><a class="flg_a" title="en" href="{{url('/'.$lan->short_code)}}"><img src="{{url('frontend/assets/images/us.jpg')}}"></a></li>
@endforeach
  </ul>
                      </li>



                      <li class="lihasdropdown two-column drop-left"><a title="more" href="">{{trans('app.Language') }} </a>
                          <ul class="menu-dropdown">
                            @foreach($lang as $lang)
                              <li><a title="{{$lang}}" href="{{url('/'.$lang->short_code)}}">{{$lang->name}}</a></li>
                            @endforeach
                          </ul>
                      </li>
                    </ul>
                  </nav>
                  <!-- END====================== NAVIGATION MENU ========================-->
                </div>
                <label class="mobile_collapser">MENU  </label>
                <!-- =========================== SOCIAL ICONS =========================--><a title="" href="#" class="social_links"><i class="fa fa-share-alt"></i></a>
                <div class="team_social"><a href="#"><i class="fa fa-skype"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                <!-- END======================== SOCIAL ICONS ========================= -->
            </div>
        </div>
    </div>
    <div class="brand-colors"></div>
    <!-- END======================== HEADER ==========================-->
@yield('content')
    <!-- ============================ FOOTER ============================-->
    <footer class="gradient-invert diagonal-70-invert vbottom">
        <div class="container">
            <div class="row">
                <!-- ========================== WIDGET ABOUT US ==========================-->
                <div class="col-sm-6 col-md-4">
                    <div class="widget pl_about_us_widget">
                        <p><img src="./assets/images/medicus-header-logo.png" alt="image-desc"></p>
                        <p>Premium HTML Template mainly Medical Oriented but so flexible that it can fit any Business Site!</p>
                        <p class="contact_detail"><i class="fa fa-phone"></i><span>(+30) 210 1234567</span></p>
                        <p class="contact_detail"><i class="fa fa-envelope"></i><span><a href="mailto:info@plethorathemes.com">info@plethorathemes.com</a></span></p>
                        <p class="social"><a href="https://www.facebook.com/plethorathemes"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/PlethoraThemes"><i class="fa fa-twitter"></i></a><a href="https://plus.google.com/112457016609952874702/posts"><i class="fa fa-google-plus"></i></a><a href="https://gr.linkedin.com/pub/plethora-themes/89/552/4a9"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="https://www.youtube.com/user/plethorathemes"><i class="fa fa-youtube">   </i></a>
                        </p>
                        <p class="contact_detail"><a href="https://www.google.com/maps/place/79+Folsom+Ave+San+Francisco+CA+94107" target="_blank"><i class="fa fa-location-arrow"></i></a><span>79 Folsom Ave, San Francisco, CA 94107        </span></p>
                    </div>
                </div>
                <!-- END======================= WIDGET ABOUT US ==========================-->
                <!-- ========================== LATEST NEWS =============================-->
                <div class="col-sm-6 col-md-4">
                    <div class="widget pl_latest_news_widget">
                        <h4>Latest Articles</h4>
                        <ul class="media-list">
                            <li class="media"><a href="single.html" style="background-image:url('./assets/images/video-002.jpg');" class="media-photo"></a>
                                <h5 class="media-heading"><a href="single.html">Diabetes Diet and Food Tips</a></h5><small>Dec 8</small>
                                <p>You can make a big difference with healthy lifestyle changes....</p>
                            </li>
                            <li class="media"><a href="single.html" style="background-image:url('./assets/images/pricing-004.jpg');" class="media-photo"></a>
                                <h5 class="media-heading"><a href="single.html">Prevent Asthma by changing working enviroment</a></h5><small>Dec 6</small>
                                <p>Prom preventive care and checkups, to immunizations and exams, our primary…</p>
                            </li>
                            <li class="media"><a href="single.html" class="media-photo"></a>
                                <h5 class="media-heading"><a href="single.html">Learn about Arrhythmia today</a></h5><small>Dec 7</small>
                                <p>When you visit one of our four San Francisco campus locations you can expect…</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END======================= LATEST NEWS =============================-->
                <!-- ========================== REQUEST A CHECKUP =======================-->
                <div class="col-sm-8 col-md-4">
                    <div class="widget pl_html_widget boxed black_section transparent-film wow slideInRight">
                        <h4>Request a Checkup</h4>
                        <p><img src="./assets/images/strive-test.png" width="90" alt="image-desc" class="pull-left">From preventive care and checkups, to immunizations and exams, our primary care physicians and providers you visit one of our four San Francisco campus locations you can expect to receive world class care.</p>
                        <p> <a href="health-plans.html" class="btn btn-success with-icon"><i class="fa fa-caret-right"> </i>Free Checkup</a></p>
                    </div>
                </div>
                <!-- END======================= REQUEST A CHECKUP =======================-->
            </div>
        </div>
    </footer>
    <!-- END========================== FOOTER ============================-->
    <div class="copyright secondary_section">
        <div class="secondary_section transparent-film">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">Copyright ©2015 all rights reserved</div>
                    <div class="col-sm-6 col-md-6 text-right">Designed by <a href='http://plethorathemes.com/' target='_blank'>Ahmed Hashem</a></div>
                </div>
            </div>
        </div>
    </div><a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- ==================== SCRIPTS | CONFIG ====================-->
<script type="text/javascript" src="{{url('frontend/assets/js/config.js')}}" data-module="main-configuration"></script>
<!-- ==================== SCRIPTS | GLOBAL ====================-->
<script type="text/javascript" src="{{url('frontend/assets/js/libs/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/wow.min.js')}}" data-module="wow-animation-lib"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/particlesjs/particles.min.js')}}" data-module="particles-js"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/conformity/dist/conformity.min.js')}}" data-module="equal-column-height"></script>
<!-- END====================== SCRIPTS ========================-->
<!-- =================== SCRIPTS | SECTIONS ===================-->
<script type="text/javascript" src="{{url('frontend/assets/js/newsletter.min.js')}}" data-module="newsletter"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/contact_form.min.js')}}" data-module="contact-form"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/appointment_form.min.js')}}" data-module="appointment-form"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js')}}" data-module="owlslider"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/owlslider-init.js')}}" data-module="owlslider"></script>
<script type="text/javascript" src="{{url('frontend/assets/js/libs/parallax.min.js')}}" data-module="parallax"></script>
<!-- END================ SCRIPTS | SECTIONS ===================-->
<!-- ==================== SCRIPTS | INIT ======================-->
<script type="text/javascript" src="{{url('frontend/assets/js/theme.js')}}" data-module="main-theme-js"></script>
<!-- END==================== SCRIPTS | INIT ===================-->
<!-- Style Switcher, You propably want to remove this!-->
<script type="text/javascript" src="{{url('frontend/assets/js/_style-switcher.js')}}"></script>
<!-- DYNAMIC STYLE SWITCHER -->
<script type="text/style-switcher-template" id="style-switcher-template">
    <div class="section_style_switcher">
        <div class="handler"><i class="fa fa-wrench"></i></div>
        <div class="handler downloader"><i class="fa fa-download"></i></div>
        <div class="inner_area">
            <div class="section_styles">
                <h5>Section Classes                 </h5><a class="color_section">skincolored_section</a><a class="color_section">secondary_section</a><a class="color_section">dark_section</a><a class="color_section">light_section</a><a class="color_section">black_section</a><a class="color_section">white_section                 </a><a class="color_section">transparent</a>
                <hr><a>bgimage</a><a>transparent-film</a><a>gradient-film-to-top</a><a>gradient-film-to-bottom</a>
                <hr><a>gradient</a><a>gradient-invert</a>
                <hr><a>diagonal-30</a><a>diagonal-30-invert</a><a>diagonal-30-minusangle</a><a>diagonal-30-minusangle-invert</a>
                <hr><a>diagonal-50</a><a>diagonal-50-invert</a><a>diagonal-50-minusangle</a><a>diagonal-50-minusangle-invert</a>
                <hr><a>diagonal-70</a><a>diagonal-70-invert</a><a>diagonal-70-minusangle</a><a>diagonal-70-minusangle-invert            </a>
                <hr><a>no_padding</a><a>no_top_padding</a><a>no_bottom_padding</a><a>no_cols_padding</a><a>full_width</a><a>vcenter </a><a>vbottom</a>
                <hr><a>full_height</a><a>vertical_center</a><a>vertical_bottom</a>
                <hr><a>elevate</a>
            </div>
        </div>
    </div>
</script>
<!-- END DYNAMIC STYLE SWITCHER -->
</body>
</html>
