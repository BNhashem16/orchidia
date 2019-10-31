@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/images/pages/1507837998+1_11111.png')" class="full_width_photo parallax-window">
    <!-- <img src=""> -->
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1 style="color: #29377d;font-size: 41px;">events</h1>
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
        <div class="col-sm-12 col-md-12 ">
          <div class="post-grid classic">
            <div class="row">
              @foreach(App\Component::where('component_category_id',13)->get() as $event)
              <div class="col-md-4">
                <article class="post">
                  <h2 style="font-weight: 900;font-size: 20px;font-family: 'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif;" class="post_title post_title2 high"><a href="http://orchidiapharma.com/events/Great_Minds_wave_4">{{$event->title['en']}}</a></h2>
                    <div class="post_figure_and_info">
                      <div class="post_sub">
                        <span class="post_info post_date">
                          <i class="fa fa-calendar"></i> {{$event->created_at->format('m-d-Y')}}
                        </span>
                      </div>
                        <figure class="stretchy-wrapper ratio_12-5">
                          <a href="{{url('Events/'.$event->link)}}" title="Great Minds wave 4" style="background-image: url({{$event->image}})"></a>
                        </figure>
                  </div>
                    <p style="color:black;" class="desc hight" >{{substr($event->description['en'], 0, 90)}}....</p>
                      <a href="{{url('/'.app()->getLocale().'/'.'Events/'.$event->link)}}" class="btn btn-primary">Read More</a>
                </article>
              </div>
                            <!-- ======================= ARTICLE #2 ======================-->
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
