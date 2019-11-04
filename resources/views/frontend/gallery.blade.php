@section('content')
<div class="head_panel">
  <div style="background-image: url('https://orchidiapharma.com/assets/images/slider-4.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1>الأستديو</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container"></div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 section_header fancy centered"></div>
        <div class="col-md-12">
          <!-- ======================= PORTFOLIO ======================-->
          <div class="portfolio_grid">
            <ul id="filt_medicus" class="portfolio_filters">
              <li><a href="#" data-filter="*" class="">Show All</a></li>
              <li><a href="#" data-filter=".148" class="active">Photos</a></li>
              <li><a href="#" data-filter=".149" class="">Videos</a></li>
            </ul>
            <div id="cont_medicus" class="row isotope_portfolio_container isotope">
              <!-- ======================= Images ======================-->
              @foreach($image as $image)
              <div class="148 col-xs-12 col-sm-6 col-md-6">
                <div class="portfolio_item stretchy-wrapper ratio_2-1"><a href="{{url($image->attachment)}}" class="lightbox_gallery">
                  <div style="background-image:url({{url($image->attachment)}})" class="figure"></div>
                    <div class="portfolio_title skincolored_section">
                      <h3>
                        <i class="fa fa-image"></i> (مبادرة (عنيك فى عنينا
                      </h3>
                    </div>
                    <div class="portfolio_description skincolored_section degrade">
                      <p></p>
                    </div></a></div>
              </div>
              @endforeach
              <!-- ======================= Images ======================-->
              <!-- ======================= videos ======================-->
              @foreach($video as $video)
              <div class="149 col-xs-12 col-sm-6 col-md-6">
                <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/yHI3pABLEuI" frameborder="0" allowfullscreen></iframe> -->
                <div class="portfolio_item stretchy-wrapper ratio_2-1">
                  <a href="https://www.youtube.com/watch?v=sa2SNoUStKs" class="lightbox_gallery">
                    <div style="background-image:url({{url($video->attachment)}})" class="figure"></div>
                      <div class="portfolio_title skincolored_section">
                        <h3>
                          <i class="fa fa-youtube"></i>رؤية  أوركيدي
                        </h3>
                      </div>
                      <div class="portfolio_description skincolored_section degrade">
                        <p>أن يكون نموذجا لقوة الصيدلانية مع التركيز على الأعمال المتخصصة، التي تحقق التغلغل الإقليمي من خلال نهج يحركه الناس بطريقة سليمة.</p>
                      </div>
                  </a>
                </div>
              </div>
              @endforeach
              <!-- ======================= videos ======================-->
            </div>
          </div>
          <!-- END==================== PORTFOLIO ======================-->
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('frontend.layouts.app')
