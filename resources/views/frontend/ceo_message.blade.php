@section('content')
<div class="head_panel">
  <div style="background-image: url('https://orchidiapharma.com/images/pages/1513529289+1_investorsBanner.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <?php $ceo_msg = App\Component::where('component_category_id',21)->first() ?>
          <h1 style="color:black;" >{{$ceo_msg->title[app()->getLocale()]}}</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container"></div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background: white;color:black" class="vcenter no_padd1">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <img class=" pull-right img-who" src="{{url($ceo_msg->image)}}" width="400">
            {!! $ceo_msg->description[app()->getLocale()] !!}
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('frontend.layouts.app')
