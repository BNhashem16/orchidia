@section('content')
    <div class="head_panel">
        <!-- ============================ SLIDER ==========================-->
        <div class="slider_wrapper">
            <div id="head_panel_slider" class="owl-carousel">
                <!-- ============================ SLIDE ==========================-->
                @foreach(App\Slider::where('slider',1)->get() as $slider)
                <div class="stretchy-wrapper ratio_slider" >
                    <div style="background-image: url({{$slider->image}});" aria-hidden="true" class="item">
                        <div class="container">
                            <div class="caption caption-right caption-fancy">
                                <div class="inner animated bounceInUp">
                                    <div class="t1">{{$slider->big_header['en']}}</div>
                                    <div class="t2 uppercase">{{$slider->title['en']}}</div>
                                    <div class="t3 uppercase">{{$slider->small_header['en']}}</div>
                                    <p class="desc hidden-xxs">{{$slider->paragraph['en']}} </p>
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
                        <div class="entry skincolored_section"><a href="services.html">
                                <div style="background-image:url('frontend/assets/images/News.jpg');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">News</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry secondary_section"><a href="knowledgebase.html">
                                <div style="background-image:url('frontend/assets/images/events.png');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">Events</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry skincolored_section"><a href="#contact_panel">
                                <div style="background-image:url('frontend/assets/images/calendar.png');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">calender</div></a></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="entry secondary_section"><a href="portfolio.html">
                                <div style="background-image:url('frontend/assets/images/gallery.jpg');" class="entry_photo stretchy-wrapper ratio_15-9"></div>
                                <div class="entry_text">Gallary</div></a></div>
                    </div>
                    <!-- END====================== ENTRY ========================-->
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section_header fancy centered">
                        <h2 style="color: #29377D">Our Products</h2>
                        <p style="color: #323856" class="uppercase">An integrated intelligent portfolio</p>
                    </div>
                    <!-- ========================= SERVICES ========================-->
                    <div class="col-sm-6 col-md-3">
                        <div class="teaser_box centered same_height_col white_section boxed boxed-special">
                            <div class="figure"><img src="./assets/images/strive-test.png" height="100" alt="service"></div>
                            <div class="content">
                                <div class="hgroup">
                                    <h4>Daily Checkups</h4>
                                </div>
                                <div class="desc">
                                    <p>
                                        Big and impressive Photography is an essential part of this design's success.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ==================== SERVICE BOX ===================-->
                    <div class="col-sm-6 col-md-3">
                        <div class="teaser_box centered same_height_col white_section boxed boxed-special">
                            <div class="figure"><a href="services.html"><img src="./assets/images/strive-lungs.png" height="100" alt="service"></a></div>
                            <div class="content">
                                <div class="hgroup">
                                    <h4>Prevent Asthma</h4>
                                </div>
                                <div class="desc">
                                    <p>So every item has its own custom-post that you can fill in with useful information. </p>
                                </div>
                                <div class="link"><a href="services.html" class="btn btn-sm btn-primary"><strong>MORE</strong>  </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END================= SERVICE BOX ===================-->
                    <!-- ==================== SERVICE BOX ===================-->
                    <div class="col-sm-6 col-md-3">
                        <div class="teaser_box centered same_height_col white_section boxed boxed-special">
                            <div class="figure"><a href="services.html"><img src="./assets/images/strive-cardiology.png" height="100" alt="service"></a></div>
                            <div class="content">
                                <div class="hgroup">
                                    <h4>Cardiology Dep</h4>
                                </div>
                                <div class="desc">
                                    <p>Then all you have to do is setup the "Team Grid" shortcode and add it in a row with the Visual Builder. </p>
                                </div>
                                <div class="link"><a href="services.html" class="btn btn-sm btn-primary"><strong>DETAILS</strong>  </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END================= SERVICE BOX ===================-->
                    <!-- ==================== SERVICE BOX ===================-->
                    <div class="col-sm-6 col-md-3">
                        <div class="teaser_box centered same_height_col white_section boxed boxed-special">
                            <div class="figure"><img src="./assets/images/strive-dna.png" height="100" alt="service"></div>
                            <div class="content">
                                <div class="hgroup">
                                    <h4>DNA Testing</h4>
                                </div>
                                <div class="desc">
                                    <p>Make sure you balance these text descriptions to maintain the strict visual rhythm of the grid. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END================= SERVICE BOX ===================-->
                    <!-- END========================= SERVICES ========================-->
                </div>
            </div>
        </section>
        <section style="background-image: url('./assets/images/hands.jpg')" class="secondary_section transparent-film parallax-window vcenter">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <!-- ========================= CALL TO ACTION ========================-->
                        <div class="section_header fancy"><img src="./assets/images/icon-tester-o.png" alt="image-desc">
                            <h3><small>Need Top Health Care?</small>Call now (600) 123-4567</h3>
                            <p>Top Quality Healthcare in your City</p><a href="health-plans.html" class="btn btn-secondary with-icon">Request Plan<i class="fa fa-caret-right"></i></a>
                        </div>
                        <!-- ========================= /CALL TO ACTION ========================-->
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="pricing_plan black_section transparent transparent-film">
                            <div class="stretchy-wrapper ratio_2-1">
                                <div style="background-image:url('./assets/images/pricing-004.jpg');" class="pricing_plan_photo"></div>
                            </div>
                            <div class="plan_title skincolored_section transparent transparent-film">
                                <h3>FAMILY</h3>
                                <p>All Inclusive Plan</p>
                            </div>
                            <div class="the_price">$49.99<small>/year            </small></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact_panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 light_section boxed same_height_col" style="height: auto; min-height: 445px;">
                        <h3 class="col_header centered">Contact us</h3>
                        <!-- =========================  QUICK CONTACT FORM ========================-->
                        <div class="contact-quick">
                            <div class="screen-reader-response"></div>
                            <form id="contact_form" name="contact_form" method="post" action="http://orchidiapharma.com/en/Messages/quick">
                                <input type="hidden" name="type" value="4" class="contact_type">
                                <span class="your-name">
                      <input type="text" name="name" required="" size="40" aria-required="true" aria-invalid="false" placeholder="Name" class="name form-control">
                    </span>
                                <span class="your-phone">
                      <input type="text" name="phone" placeholder="Phone Number" size="40" aria-required="true" aria-invalid="false" class="phone form-control">
                    </span>
                                <span class="your-email">
                      <input type="email" name="email" placeholder="Email" size="40" aria-required="true" aria-invalid="false" class="email form-control">
                    </span>
                                <span class="your-subject">
                      <input type="text" name="subject" placeholder="Subject" size="40" aria-required="true" aria-invalid="false" class="subject form-control">
                    </span>
                                <span class="your-message">
                      <textarea name="message" cols="40" rows="4" aria-invalid="false" class="message form-control" placeholder="Message"></textarea>
                    </span>
                                <!-- <div class="captcha">
                                  <div style="background-image:url('http://orchidiapharma.com/assets/php/contact/captcha.php')" class="captcha-code"></div>
                                  <input type="text" name="captchainput" value="Enter Code" aria-required="true" aria-invalid="false" class="captchainput form-control">
                                </div> -->
                                <input type="submit" value="Send" class=" btn btn-primary">
                                <!-- <div class="notice btn btn-metro alert alert-warning alert-dismissable hidden"></div><img src="http://orchidiapharma.com/assets/images/ajax-loader.gif" alt="Sending ..." class="ajax-loader not_visible"> -->
                            </form>
                        </div>
                        <!-- /.contact-quick-->
                        <!-- =========================  QUICK CONTACT FORM ========================-->
                    </div>
                    <div class="col-md-4 secondary_section boxed elevate" id="appoin">
                        <h3 class="col_header centered">Apply for job</h3>
                        <!-- ========================= APPOINTMENT FORM ========================-->
                        <div class="appointment">
                            <form id="appointment_form" name="appointment_form" method="post" action="http://orchidiapharma.com/Messages/appointment" enctype="multipart/form-data">

                                <input type="hidden" name="type" value="1">
                                <select name="department" class="department" required="">
                                    <option selected="" disabled="">Department</option>
                                    <option value="Sales department">Sales department</option>
                                    <option value="Production department">Production department</option>
                                    <option value="Supply chain instead of purchasing department ">Supply chain instead of purchasing department </option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Business development">Business development</option>
                                    <option value="Export">Export</option>
                                    <option value="Purchases">Purchases</option>
                                    <option value="Staff">Staff</option>
                                    <option value="QC">QC</option>
                                    <option value="QA">QA</option>
                                    <option value="R&amp;D">R&amp;D</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <input type="text" name="name" required="" placeholder="Full Name" size="40" aria-required="true" class="name form-control">

                                <input type="date" name="birthdate" required="" placeholder="Date of Birth" size="40" aria-required="true" aria-invalid="false" class="birthdate form-control">

                                <select name="sex" class="sex" required="">
                                    <option value="">Gender</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>

                                <input type="text" name="phone" required="" placeholder="Phone Number" size="40" aria-required="true" aria-invalid="false" class="phone form-control">

                                <input type="email" name="email" placeholder="Email" size="40" aria-required="true" aria-invalid="false" class="email form-control" required="">


                                <label id="labl_cv">Attach Resume</label>
                                <input id="cv_inpt" type="file" name="resume" placeholder="Attach resume" size="40" aria-required="true" aria-invalid="false" class="appointment_date form-control " required="">

                                <!-- <input type="file" name="cover_letter" placeholder="Appointment Date" size="40" aria-required="true" aria-invalid="false" class="appointment_date form-control" required>
                                <label>Cover letter</label> -->

                                <div class="clearfix"></div>
                                <!-- <div class="captcha">
                                  <div style="background-image:url('./assets/php/contact/captcha.php')" class="captcha-code"></div>
                                  <input type="text" name="captchainput" value="Enter Code" aria-required="true" aria-invalid="false" class="captchainput form-control">
                                </div> -->
                                <input type="submit" value="Send" class=" btn btn-primary">
                                <div class="notice btn btn-primary alert alert-warning alert-dismissable hidden"></div><img src="./assets/images/ajax-loader.gif" alt="Sending" class="ajax-loader not_visible">
                            </form>
                        </div>
                        <!-- END====================== APPOINTMENT FORM ========================-->
                    </div>                    <div class="col-md-4 skincolored_section boxed same_height_col centered">
                        <!--h3.col_header.centered Medicus--><img src="http://orchidiapharma.com//assets/images/orchidia-logo-01.jpg" alt="logo" height="33">
                        <h4 class=""><strong>Address</strong></h4>
                        <p class="">Al-Obour city – Industrial Zone, Area 14,15, Block no.12011, Cairo, Egypt.</p>
                        <h4 class=""><strong class="">Email Contact</strong></h4>
                        <p class=""> info@orchidiapharmaceutical.com</p>
                        <h4 class=""><strong class="">Phones</strong></h4>
                        <p class="">+20 2 44891580<br></p><!-- <a href="#" class="btn btn-secondary">EMAIL US</a> -->
                        <h4 class=""><strong>Fax</strong></h4>
                        <p class="">+ 20 2 44891235<br></p><br><!-- <a href="#" class="btn btn-secondary">EMAIL US</a> -->
                    </div>
                </div>
            </div>
        </section>

@endsection
@extends('frontend.layouts.app')
