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
<body class="sticky_header" >
<div class="overflow_wrapper" >
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
                        <li class="{{count($page->childs) > 0 ? 'lihasdropdown' : ''}} two-column drop-left"><a title="more" href="{{('/'.app()->getLocale().'/'.$page->slug)}}">{{$page->title[app()->getLocale()] }} </a>
                          @if(count($page->childs) > 0)
                            <ul class="menu-dropdown">
                              @foreach($page->childs as $child)
                                <li><a title="{{$child->title['en']}}" href="{{url($child->slug)}}">{{$child->title['en']}} - {{trans('app.Home')}} </a></li>
                              @endforeach
                            </ul>
                          @endif
                        </li>
                      @endforeach
                      <li class="lihasdropdown drop-left">
                        <a href="">
                          @if(app()->getLocale() == 'ar') <img src="{{url('frontend/assets/images/egy.jpg')}}" width="20">
                          @else <img src="{{url('frontend/assets/images/us.jpg')}}" width="20">
                          @endif
                        </a>
                        <ul class="menu-dropdown">
                          @foreach( App\Language::where('active' , 1)->get() as $lan)
                          <li>
                            <a class="flg_a" title="{{$lan->short_code}}" href="{{url('/'.$lan->short_code)}}">
                              <img src="{{url($lan->image)}}">
                            </a>
                          </li>
                          @endforeach
                        </ul>
                      </li>
                    </ul>
                  </nav>
                  <!-- END====================== NAVIGATION MENU ========================-->
                </div>
                <!-- =========================== SOCIAL ICONS =========================-->
                <a title="" href="#" class="social_links"><i class="fa fa-share-alt"></i></a>
                <div class="team_social">
                  @foreach(App\Setting::where('related_icon' , 'social')->get() as $social)
                    <a target="{{$social->link['target']}}" href="{{$social->link['href']}}"><i class="{{$social->link['class']}}"></i></a>
                  @endforeach
                  </div>
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
                @foreach(App\Setting::where('logo' , '!=' , null)->get() as $logo)
                <p><img src="{{url($logo->logo)}}" alt="image-desc"></p>
                @endforeach
                @foreach(App\Setting::where('related_icon' , 'info')->orderBy('id' , 'DESC')->get() as $info)
                @if(empty ( $info->link['href'] ))
                <p ><i class="{{$info->link['class']}}"></i><span>{{$info->title[app()->getLocale()]}}</span></p>
                @else
                <p ><a href="{{$info->link['href']}}" target="_blank"><i class="{{$info->link['class']}}"></i></a><span>{{$info->title[app()->getLocale()]}} </span></p>
                @endif
                @endforeach

                <p>
                  @foreach(App\Setting::where('related_icon' , 'social')->get() as $social)
                  <a target="{{$social->link['target']}}" href="{{$social->link['href']}}"><i class="{{$social->link['class']}}"></i></a>
                  @endforeach
                </p>
              </div>
            </div>
            <!-- END======================= WIDGET ABOUT US ==========================-->
            <!-- ========================== LATEST NEWS =============================-->
            <div class="col-sm-6 col-md-4">
              <div class="widget pl_latest_news_widget">
                <h4>Latest News</h4>
                <ul class="media-list">
                  <?php $count = 0; ?>
                  @foreach (App\Component::where('component_category_id' , 12)->get() as $new)
                      <?php if($count == 3) break; ?>
                      <li class="media">
                        <a href="{{app()->getLocale().'/'.'News/'.$new->link}}" style="background-image:url({{$new->image}});" class="media-photo"></a>
                        <h5 class="media-heading">
                          <a href="{{'News/'.$new->link}}">{{$new->title[$app->getLocale()]}}</a><br>
                            <span>{{ $new->created_at->format('y-m-d') }} </span>
                        </h5>
                          <p>{!! substr($new->sub_title[$app->getLocale()] , 0 , 40)  !!}</p>
                      </li>
                      <?php $count++; ?>
                    @endforeach
                </ul>

              </div>
            </div>
            <!-- END======================= LATEST NEWS =============================-->
          <!-- ========================== REQUEST A CHECKUP =======================-->
          <div class="col-sm-8 col-md-4 right-tex">
            <div class="widget pl_html_widget boxed black_section transparent-film wow slideInRight">
              @foreach(App\Component::where('component_category_id' , 21)->get() as $message  )
              <h4>{{$message->title[app()->getLocale()]}}</h4>
                <div>
                  <img src="https://orchidiapharma.com/images/pages/1508169297_1507740938_OSAMA_ABBAS.png" width="90" alt="image-desc" class="pull-left img-ceo">
                    <p>{!! substr($message->description[app()->getLocale()] , 0 ,285) !!}</p>
                      <a href="{{url(app()->getLocale().'/'.$message->link)}}" class="btn btn-primary">Read More</a>
                      @endforeach
                </div>
            </div>
          </div>
          <!-- END======================= REQUEST A CHECKUP =======================-->
        </div>
      </div>
    </footer>
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
