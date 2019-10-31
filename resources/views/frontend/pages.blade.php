@section('content')
<div class="head_panel maps">
        <div id="map" class="map" style="width: 100%; height: 100%;">
          <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBfL6B7MGZg4uigea53J-_9TgR0b46Eu14
              &q=Orchidia+Factory&zoom=9" allowfullscreen>
          </iframe>
        </div>
</div>
  <div class="main">
    <section style="background:white" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 light_section boxed same_height_col">
              <h3 class="col_header centered">Contact us</h3>
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
                          <input type="{{$form->field['type']}}" value="Send" class=" btn btn-primary">
                        @else
                          <input type="{{$form->field['type']}}" name="{{$form->field['name']}}" required="" size="40" aria-required="true" aria-invalid="false" placeholder="{{$form->title[app()->getLocale()]}}" class="name form-control">
                        @endif
                        @endforeach
                      {!! Form::Close() !!}
                </div>
                <!-- /.contact-quick-->
                <!-- =========================  QUICK CONTACT FORM ========================-->
              </div>
                <div class="col-md-6 skincolored_section boxed same_height_col centered">
                  <!--h3.col_header.centered Medicus--><img src="https://orchidiapharma.com//assets/images/orchidia-logo-01.jpg" alt="logo" height="33">
                                                      <h4><strong>Address</strong></h4>
                  <p>Al-Obour city – Industrial Zone, Area 14,15, Block no.12011, Cairo, Egypt.</p>
                                                      <h4><strong>Email Contact</strong></h4>
                  <p> info@orchidiapharmaceutical.com</p>
                                                      <h4><strong>Phones</strong></h4>
                  <p class="num_dir">+20 2 44891580<br></p><!-- <a href="#" class="btn btn-secondary">EMAIL US</a> -->
                                                      <h4><strong>Fax</strong></h4>
                  <p class="num_dir">+ 20 2 44891235<br></p><br><!-- <a href="#" class="btn btn-secondary">EMAIL US</a> -->

                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
      @endsection
      @extends('frontend.layouts.app')
