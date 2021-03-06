@section('content')
<div class="head_panel">
        <!-- ============================ SLIDER ==========================-->
        <div class="slider_wrapper">
          <div id="head_panel_slider" class="owl-carousel">
          	 <!-- ============================ SLIDE  ==========================-->
             <?php $component_cat = App\Component_category::first();  ?>
             @foreach(App\Component::where('component_category_id',$component_cat->id)->get() as $slider)
            <div class="stretchy-wrapper ratio_slider">
              <div style="background-image: url({{$slider->image}});" aria-hidden="true" class="item">
                <div class="container">
                  <div class="caption caption-left caption-fancy">
                    <div class="inner black_section transparent-film animated bounceInUp">
                      <div class="t1 uppercase">{{$slider->title[$app->getLocale()]}}</div>
                      <div class="t2 uppercase">{{$slider->sub_title[$app->getLocale()]}}</div>
                      <div class="t3 uppercase">{{$slider->extra[$app->getLocale()]}}</div>
                      <div class="desc"><p> {!! $slider->description[$app->getLocale()] !!}</p></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- END========================= SLIDE ==========================-->
          </div>
        </div>
        <!-- END========================= SLIDER ==========================-->
      </div>
    <!--include templates/headpanel-slider-full-height-->
    <div class="main">
        <section class="no_padding no_cols_padding transparent elevate">
            <div class="container">
                <div class="row">
                    <!-- ========================= ENTRY ========================-->
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry skincolored_section"><a href="{{url('/'.app()->getLocale().'/news')}}">
                                <div style="background-image:url('frontend/assets/images/News.jpg');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">{{trans('app.News')}}</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry secondary_section"><a href="{{url('/'.app()->getLocale().'/'.'events')}}">
                                <div style="background-image:url('frontend/assets/images/events.png');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">{{trans('app.Events')}}</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry skincolored_section"><a href="{{url(app()->getLocale().'/Calender')}}">
                                <div style="background-image:url('frontend/assets/images/calendar.png');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">{{trans('app.calender')}}</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry secondary_section"><a href="{{url(app()->getLocale().'/images')}}">
                                <div style="background-image:url('frontend/assets/images/gallery.jpg');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">{{trans('app.gallary')}}</div></a></div>
                    </div>
                    <!-- END====================== ENTRY ========================-->
                </div>
            </div>
        </section>
        <section style="background:white;" >
          <div class="container">
            <div class="row">
              <div class="col-md-12 section_header fancy centered">
                <h2>{{trans('app.Our Products')}}</h2>
              </div>
              <!-- ==================== SERVICE BOX ===================-->
              @foreach(App\Page::where('active',1)->where('nav',0)->where('page_id',0)->get() as $product)
                <div class="col-sm-6 col-md-3">
                  <div class="teaser_box centered same_height_col white_section boxed boxed-special cat_box" style="height: auto; min-height: 361px;">
                    <div class="figure">
                      <a  href="{{url(app()->getLocale().'/Products/'.$product->slug)}}">
                        <img src="{{url($product->image)}}" alt="service" height="195">
                      </a>
                    </div>
                    <div class="content cat_content">
                      <div class="hgroup">
                        <h4 style="font-size: 11px;" class="tit_product">{{$product->title[app()->getLocale()]}}</h4>
                      </div>
                      <div class="link"><a href="{{url(app()->getLocale().'/Products/'.$product->slug)}}" class="btn btn-sm btn-primary"><strong>{{trans('app.Details')}}</strong>  </a></div>
                    </div>
                  </div>
                </div>
              @endforeach
              <!-- END================= SERVICE BOX ===================-->
              <!-- END========================= SERVICES ========================-->
              <div class="clearfix"></div>
                <div class="text-center">
                  <a href="{{url(app()->getLocale().'/Products')}}" class="btn btn-secondary with-icon">{{trans('app.READ MORE')}}<i class="fa fa-caret-right"></i></a>
                </div>
            </div>
          </div>
        </section>
                <!-- ========================= CALL TO ACTION ========================-->
                <section style="background-image: url('frontend/assets/images/Wetlap.jpg')" class="secondary_section transparent-film parallax-window vcenter">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-8 col-sm-8">
                        <!-- ========================= CALL TO ACTION ========================-->
                        <div class="section_header fancy">
                          <h3><small>{!! $component->title[app()->getLocale()]  !!}</small></h3>
                          <p>{!! $component->description[app()->getLocale()]  !!}</p>
                        </div>
                        <!-- ========================= /CALL TO ACTION ========================-->
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="pricing_plan black_section transparent transparent-film">
                          <div class="stretchy-wrapper ratio_2-1">
                            <div style="background-image:url({{$component->image}});" class="pricing_plan_photo"></div>
                          </div>
                          <div class="plan_title skincolored_section transparent transparent-film">
                            <h3>{{$component->title[app()->getLocale()]}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
        <section id="contact_panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 light_section boxed same_height_col" style="height: auto; min-height: 445px;">
                        <h3 class="col_header centered">{{trans('app.CONTACT US')}}</h3>
                        <!-- =========================  QUICK CONTACT FORM ========================-->
                        <div class="contact-quick">
                            <div class="screen-reader-response"></div>
                            {!! Form::Open() !!}
                                  @foreach(App\Form::where('component_category_id' , 20)->get() as $form)
                                  @if($form->field['type'] == 'textarea')
                                    <span class="your-message">
                                      <textarea name="{{$form->field['name']}}" cols="40" rows="4" aria-invalid="false" class="message form-control" placeholder="Message"></textarea>
                                    </span>
                                  @elseif($form->field['type'] == 'submit')
                                    <input type="{{$form->field['type']}}" value="{{$form->title[app()->getLocale()]}}" class=" btn btn-primary">
                                  @else
                                    <input type="{{$form->field['type']}}" name="{{$form->field['name']}}" required="" size="40" aria-required="true" aria-invalid="false" placeholder="{{$form->title[app()->getLocale()]}}" class="name form-control">
                                  @endif
                                  @endforeach
                                {!! Form::Close() !!}
                        </div>
                        <!-- =========================  QUICK CONTACT FORM ========================-->
                    </div>
                    <div class="col-md-4 secondary_section boxed elevate" id="appoin">
                        <h3 class="col_header centered">{{trans('app.APPLY FOR JOB')}}</h3>
                        <!-- ========================= APPOINTMENT FORM ========================-->
                        <div class="appointment">
                          {!! Form::Open(['files' => true , 'id' => 'appointment_form' , 'name' => 'appointment_form']) !!}
                            @foreach(App\Form::where('component_category_id' , 26)->get() as $form)
                              @if($form->field['type'] == 'file')
                                  <label id="labl_cv">{{$form->title[app()->getLocale()]}}</label>
                                  <input id="cv_inpt" type="{{$form->field['type']}}" name="{{$form->field['name']}}" placeholder="{{$form->title[app()->getLocale()]}}" size="40" aria-required="true" aria-invalid="false" class="appointment_date form-control " required="">
                                @elseif($form->field['type'] == 'submit')
                                  <input type="{{$form->field['type']}}" value="{{$form->title[app()->getLocale()]}}" class=" btn btn-primary">
                                @elseif($form->field['type'] == 'email')
                                    <input type="{{$form->field['type']}}" name="{{$form->field['name']}}" placeholder="{{$form->title[app()->getLocale()]}}" size="40" aria-required="true" aria-invalid="false" class="email form-control" required="">
                                @elseif($form->field['type'] == 'selector')
                                  <select name="{{$form->field['name']}}" class="department" required="">
                                    <option selected="" disabled="">{{$form->title[app()->getLocale()]}}</option>
                                    @if($form->field['type'] == "selector")
                                      @foreach($form->extra[app()->getLocale()] as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                      @endforeach
                                    @endif
                                  </select>
                                @else
                                <input type="{{$form->field['type']}}" name="{{$form->field['name']}}" placeholder="{{$form->title[app()->getLocale()]}}" required="" size="40" aria-required="true" aria-invalid="false" class="name form-control">
                              @endif
                            @endforeach
                                <div class="clearfix"></div>
                                <div class="notice btn btn-primary alert alert-warning alert-dismissable hidden"></div><img src="./assets/images/ajax-loader.gif" alt="Sending" class="ajax-loader not_visible">
                            <!-- </form> -->
                            {!! Form::Close() !!}
                        </div>
                        <!-- END====================== APPOINTMENT FORM ========================-->
                    </div>
                    <div class="col-md-4 skincolored_section boxed same_height_col centered">
                      <?php $setting = App\Setting::where('id' , 31)->first() ?>
                      <img src="http://orchidiapharma.com//assets/images/orchidia-logo-01.jpg" alt="logo" height="33">
                        <h4 class=""><strong>{{trans('app.Address')}}</strong></h4>
                        <p class="">{{$setting->title[app()->getLocale()]}}</p>
                        <h4 class=""><strong class="">{{trans('app.Email Contact')}}</strong></h4>
                        <p class=""> {{$setting->extra['email']}}</p>
                        <h4 class=""><strong class="">{{trans('app.PHONES')}}</strong></h4>
                        <p class="">{{$setting->extra['phone_number']}}<br></p>
                        <h4 class=""><strong>{{trans('app.Fax')}}</strong></h4>
                        <p class="">{{$setting->extra['fax']}}<br></p><br>
                    </div>
                </div>
            </div>
        </section>

@endsection
@extends('frontend.layouts.app')
