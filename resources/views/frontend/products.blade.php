@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/images/pages/1517407216+1_Products.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color: #29377d;" >Product Categories</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container">
          <p style="color: black;" class="lowercase">Click to know the products of each Category</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background:white;" class="no_top_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section_header thin">
          <h2></h2>
          <p></p>
        </div>
        <div class="col-md-12">
          <div class="team_members_grid row">
              @foreach(App\Component::where('component_category_id',14)->get() as $product)
            <div class="col-sm-6 col-md-4">
                <div class="teaser_box centered white_section" >
                  <div style="background-color: #ffffff;" class="figure boxed skincolored_section no_pad">
                    <img src="{{url($product->image)}}" wdith="360" height="271px">
                  </div>
                  <div class="content">
                  <div class="desc desc2">
                      <p><strong>{{$product->title['en']}}</strong></p>
                  </div>
                  <div class="link"><a href="{{url('Products/'.$product->link)}}" class="btn btn-sm btn-primary"><strong>Details</strong>    </a></div>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@extends('frontend.layouts.app')
