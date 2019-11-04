@section('content')
<div class="head_panel">
        <div style="background-image: url('http://orchidiapharma.com/images/pages/1512581751+1_Travonorm.jpg')" class="full_width_photo parallax-window">
          <div class="hgroup pull-right">
            <div class="title diagonal-bgcolor-trans">
              <div class="container">
                <h1 style="color: #29377d;" >{{$single_product->title[app()->getLocale()]}}</h1>
              </div>
            </div>
            <div class="subtitle body-bg_section">
              <div class="container">
                <p class="lowercase"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main">
        <section style="background:white;color:black" class="vcenter">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <img class="col-md-3 pull-right img-who" src="{{url($single_product->image)}}" >
                <div class="col-md-9"></div>
                <p style="color: #323232;"> {!! $single_product->description['en'] !!} </p>
              </div>
                <a target="blank" href="http://orchidiapharma.com/images/pages/1512629905_Travonorm.pdf" class="a_prod" > <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Insert </a>  <br>
            </div>
          </div>
        </section>
      </div>
      @endsection
      @extends('frontend.layouts.app')
