@section('content')
<div class="head_panel">
  <div style="background-image: url('https://orchidiapharma.com/images/pages/1518513066+1_CME-01.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color:black;" >{{$cme->title[app()->getLocale()]}}</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container"></div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background: white;color:black;" class="vcenter no_padd1">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <iframe class=" pull-right" width="500" height="300" src="{{url($cme->image)}}" frameborder="0" allowfullscreen></iframe>
            {!! $cme->description[app()->getLocale()] !!}
        </div>
      </div>
    </div>
  </section>
  <section class="instanat no_padd2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- ======================= PORTFOLIO ======================-->
          <div class="portfolio_grid">
            <ul id="filt_medicus" class="portfolio_filters"></ul>
            <div id="cont_medicus" class="row isotope_portfolio_container isotope">
                            <!-- ================= PORTFOLIO ITEM #1 (Image) ================-->
              <div class="images col-xs-12 col-sm-6 col-md-6">
                <div class="portfolio_item stretchy-wrapper ratio_2-1"><a href="https://orchidiapharma.com/images/pages/1512307708_0U9A7598.jpg" class="lightbox_gallery">
                    <div style="background-image:url(https://orchidiapharma.com/images/pages/1512317994+1_1512307708_0U9A7598.jpg)" class="figure"></div>
                    <div class="portfolio_title skincolored_section">
                      <h3> <i class="fa fa-image"></i> Great Mind Wave 3 </h3>
                    </div>
                    <div class="portfolio_description skincolored_section degrade">
                      <p>Great Mind 3 was made in Alexandria</p>
                    </div></a></div>
              </div>

            </div>
          </div>
          <!-- END==================== PORTFOLIO ======================-->
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@extends('frontend.layouts.app')
