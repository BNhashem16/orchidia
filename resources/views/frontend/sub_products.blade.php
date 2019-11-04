@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/assets/images/creative-thinking.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color: #29377d;" >{{$page->title['en']}}</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background:white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="post-grid masonry boxed_children">
            <div class="row">
              <!-- ======================= ARTICLE #1 ======================-->
              @foreach($page->childs as $sub_product)
              <div class="col-md-3 col-xs-10 ">
                <article class="post dark_section">
                  <div class="post_figure_and_info">
                     <img src="{{url($page->image)}}" alt="OCUGUARD" title="OCUGUARD">
                  </div>
                  <h2 class="post_title">
                    <a href="{{url(app()->getLocale().'/'.'Products/'.$page->slug.'/'.$sub_product->slug)}}">{{$sub_product->title[app()->getLocale()]}} </a></h2>
                  <p class="post_subtitle subtitle2">{{$page->title[app()->getLocale()]}}</p>
                  <a href="{{url(app()->getLocale().'/'.'Products/'.$page->slug.'/'.$sub_product->slug)}}" class="btn btn-primary">Read More</a>
                </article>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@extends('frontend.layouts.app')
