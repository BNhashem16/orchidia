@section('content')
<div class="head_panel">
  <div style="background-image: url('https://orchidiapharma.com/images/pages/1517407216+1_Products.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color:black;" >Product Categories</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section"></div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background:white" class="no_top_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section_header thin"></div>
        <div class="col-md-12">
          <!-- ============================ TEAM MEMBERS ============================-->
          <div class="team_members_grid row">
            @foreach(App\Page::where('active',1)->where('nav',0)->where('page_id',0)->get() as $product)
            <div class="col-sm-6 col-md-4">
                <div class="teaser_box centered white_section" >
                  <div class="">
                    <img src="{{url($product->image)}}" wdith="360" height="271px"></div>
                  <div class="content">

                    <div class="desc desc2">
                      <p><strong>{{$product->title['en']}}</strong></p>
                    </div>
                    <div class="link"><a href="{{url(app()->getLocale().'/Products/'.$product->slug)}}" class="btn btn-sm btn-primary"><strong>Details</strong>    </a></div>
                  </div>
                </div>
              </div>
              @endforeach


          </div>
          <!-- END========================= TEAM MEMBERS ============================-->
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@extends('frontend.layouts.app')
