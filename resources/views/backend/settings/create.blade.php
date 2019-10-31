@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Forms </span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Create New Setting</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        {!! Form::Open(['route'=>'setting.store','files'=>true  ,'class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">

                                          @foreach($langs as $lang)
                                              <div class="form-group">
                                                  <label class="control-label col-md-3">Title {{$lang->name}}</label>
                                                  <div class="col-md-9">
                                                      <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{old('title.'.$lang->short_code)}}">
                                                  </div>
                                              </div>
                                          @endforeach

                                          <div class="form-group ">
                                            <label class="control-label col-md-3">Links Target</label>
                                              <div class="col-md-9">
                                                <input type="radio" value="_blank"  name="target"> Open in new Page <br>
                                                <input type="radio" value=""  name="target"> Open in the same Page
                                              </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Links</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="href" value="{{old('type')}}">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                          <label class="control-label col-md-3">related Icon</label>
                                            <div class="col-md-9">
                                              <input type="radio" value="info"  name="related_icon"> Info Icon <br>
                                              <input type="radio" value="social"  name="related_icon"> Social Icon
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-md-3">Link</label>
                                            <div class="col-md-3">
                                              <select class="form-control" name="class">
                                                <option value="fa fa-phone" >Phone Number</option>
                                                <option value="fa fa-envelope" >Message</option>
                                                <option value="fa fa-location-arrow" >Address</option>
                                                <option value="fa fa-facebook" >Facebook</option>
                                                <option value="fa fa-youtube" >Youtube</option>
                                                <option value="fa fa-instagram" >Instagram</option>
                                                <option value="fa fa-twitter" >twitter</option>
                                                <option value="fa fa-whatsapp" >Whatsapp</option>
                                                <option value="fa fa-linkedin-in" >Linkedin</option>
                                                <option value="fa fa-google-plus-g" >google plus</option>
                                                </select>
                                              </div>
                                            </div>

                                            <!-- Start Upload Image -->
                                            <div class="form-group last">
                                              <label class="control-label col-md-3">Upload Logo </label>
                                                <div class="col-md-9">
                                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img id="preview"  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                    </div>
                                                    <div>
                                                      <span class="btn default btn-file">
                                                      <input id="img" type="file" name="image"> </span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <!-- End Upload Image -->
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{url('dashboard/setting')}}" class="btn btn-outline grey-salsa">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        {!! Form::Close() !!}
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<?php $langs_count = count($langs); ?>
<!-- END CONTENT -->
@endsection
@section('jsCode')
    <script> for (var i = 0; i < {{$langs_count}}; i++) {CKEDITOR.replace( 'editor'+i );} </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img").change(function() {
            readURL(this);
        });
    </script>
@endsection
@extends('backend.layouts.app')
