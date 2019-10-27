@section('content')
<div class="head_panel">
        <div style="background-image: url('http://orchidiapharma.com/images/pages/1512581751+1_Travonorm.jpg')" class="full_width_photo parallax-window">
          <div class="hgroup pull-right">
            <div class="title diagonal-bgcolor-trans">
              <div class="container">
                <h1>{{$single_product->title['en']}}</h1>
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
        <section class="vcenter">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                                <img class="col-md-3 pull-right img-who" src="{{url($single_product->image)}}" >
                <div class="col-md-9">
                  <ul>
	<li><strong>Composition</strong></li>
</ul>

<p>Each ml contains: 40 ug/ml Travoprost (0.004%) preserved with 0.015% Benzalkonium Chloride &nbsp;</p>

<ul>
	<li><strong>Indications</strong></li>
</ul>

<p>Travonorm is indicated for the reduction of intraocular pressure (IOP) in patients with primary open angle glaucoma or Ocular Hypertension.</p>

<ul>
	<li><strong>How supplied</strong></li>
</ul>

<p>5 ml dropper bottle.</p>
                </div>

                <br>
                                <a target="blank" href="http://orchidiapharma.com/images/pages/1512629905_Travonorm.pdf" class="a_prod" > <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Insert </a>  <br>


              </div>
              <!-- <div class="col-sm-12 col-md-6 pull-right" style="top: 0">
                <div class="video_iframe stretchy-wrapper ratio_16-9">
                  <img src="http://orchidiapharma.com/images/pages/1518449075_Travonorm.jpg">
                </div>
              </div> -->
            </div>
          </div>
        </section>



      </div>
      @endsection
      @extends('frontend.layouts.app')
