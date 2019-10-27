@section('content')
<div class="head_panel">
  <div style="background-image: url('http://orchidiapharma.com/assets/images/creative-thinking.jpg')" class="full_width_photo parallax-window">
    <div class="hgroup pull-right">
      <div class="title diagonal-bgcolor-trans">
        <div class="container">
          <h1>Eye tonics - Eye vitamins</h1>
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
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="post-grid masonry boxed_children">
            <div class="row">
              <!-- ======================= ARTICLE #1 ======================-->
              @foreach(App\Component::where('component_category_id',15)->get() as $sub_product)
              <div class="col-md-3 col-xs-10 ">
                <article class="post dark_section">
                  <div class="post_figure_and_info">
                     <img src="http://orchidiapharma.com/images/pages/1518363099_Ocuguard.jpg" alt="OCUGUARD" title="OCUGUARD">
                  </div>
                  <h2 class="post_title">
                    <a href="http://orchidiapharma.com/en/Products/Eye_tonics_-_Eye_vitamins/OCUGUARD">OCUGUARD </a></h2>
                  <p class="post_subtitle subtitle2">Eye tonics - Eye vitamins </p>
                  <a href="http://orchidiapharma.com/en/Products/Eye_tonics_-_Eye_vitamins/OCUGUARD" class="btn btn-primary">Read More</a>
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
