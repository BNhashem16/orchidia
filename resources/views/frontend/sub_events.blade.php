@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/assets/images/news_11.png')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color: #29377d; font-size: 41px;">{{$component->title['en']}}</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container"></div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background-color: #ffffff;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <article class="post">
            <div class="post_figure_and_info news-cal">
              <div class="col-md-5 pull-right no_pad">
                  <div class="post_sub">
                    <span class="post_info post_date">
                      <i class="fa fa-calendar"></i> {{$component->created_at->format('y-m-d')}}
                    </span>
                  </div>
                  <figure>
                    <a href="{{url($component->image)}}" class="lightbox_gallery">
                      <img class="pull-right img-event-single" alt="featured image" src="{{url($component->image)}}">
                    </a>
                  </figure>
              </div>
                <p style="color: #323232;">{{$component->description['en']}}</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@extends('frontend.layouts.app')
