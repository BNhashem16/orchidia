@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/images/pages/1507838740+1_news_11.png')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
            <h1 style="color: #29377d;font-size: 41px;" >News</h1>
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
  <section style="background-color: #ffffff;">
    <div class="container">
      <div  class="row">
        <div class="col-sm-12 col-md-12 ">
          <div class="post-grid compact">
            <div  class="row">
              <!-- ======================= ARTICLE #1 ======================-->
              @foreach(App\Component::where('component_category_id',12)->get() as $new)
              <div class="col-md-10">
                <article class="post news_posts">
                  <div class="col-md-2 col-sm-2 col-xs-2">
                    <img src="{{url($new->image)}}" class="" alt="Now in Egyptian Market" title="Now in Egyptian Market" >
                  </div>
                  <div style="color:black;" class="col-md-6 col-sm-6 col-xs-6">
                    <h2 style="font-weight: 900;font-size: 20px;font-family: 'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif;" class="post_title post_title2"><a href="{{url('News/'.$new->link)}}">{{$new->title['en']}}</a></h2>
                      <h3 style="font-size: 20px; margin-bottom: 0px; margin-top: 0px; font-family: 'Raleway', 'Helvetica Neue' ,Arial, sans-serif; font-weight: normal; line-height: 1.1;"  class="post_title2">{{$new->created_at->format('m-d-Y')}}</h3>
                        <div style="margin-bottom: 20px; margin-top: 10px;font-size: 15px;font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;" class="desc desc_news">{{substr($new->description['en'], 0, 90)}}....</div>
                          <p><a href="{{url('News/'.$new->link)}}" class="btn btn-primary">Read More</a></p>
                  </div>
                </article>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
@extends('frontend.layouts.app')
