@section('content')
<div class="head_panel">
  <div style="background-image: url('https://orchidiapharma.com/images/pages/1512319495+1_Factory.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color:black;" >{{$whoWeAre->title[app()->getLocale()]}}</h1>
        </div>
      </div>
      <div class="subtitle body-bg_section">
        <div class="container"></div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <section style="background:white; color:black" class="vcenter no_padd1">
    <div class="container">
      <div class="row">
                <div class="col-sm-8 col-md-8">
                  <img class=" pull-right img-who" src="{{url($whoWeAre->image)}}" width="400">
                    {!! $whoWeAre->description[app()->getLocale()] !!}
                </div>
        <div class=" col-sm-4 col-xs-10 col-md-4">
        	<div class="wpb_widgetised_column wpb_content_element">
          	<!-- ============================ TEXT WIDGET ==========================-->
          	<aside class="widget widget_text">
          	  <div class=" panel-group" id="accordion">
          	    <div class="panel panel-default">
          	      <div class="panel-heading hd_accor">
          	        <p class="panel-title">
          	      	  <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#s" >Related Links</a>
          	        </p>
          	      </div>
          	      <div id="0" class="panel-collapse collapse in">
          	        <div class="panel-body">
          			       <ul class="list-inline">
                         @foreach(App\Page::where('active',1)->where('page_id',0)->where('nav',1)->get() as $page)
                         @foreach($page->childs as $child)
          							<li class="col-md-6 col-xs-6 ">
          					     <a href="{{url('/'.app()->getLocale().'/'.$child->slug)}}">{{$child->title[app()->getLocale()]}}</a>
                         @endforeach
                         @endforeach
          				      </li>
          						</ul>
          		      </div>
          	      </div>
          	    </div>
          	  </div>
          	</aside>
        	</div>
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('frontend.layouts.app')
