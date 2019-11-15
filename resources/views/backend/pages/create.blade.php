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
                    <span>Pages</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Create New Page</h3>
        <div class="row">
          <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit bordered">
              <div class="portlet-body form">
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error) <li> {{ $error }} </li> @endforeach
                                </ul>
                            </div>
                        @endif
                <!-- BEGIN FORM-->
                {!! Form::Open(['route'=>'pages.store','files'=>true  ,'class' =>'form-horizontal form-bordered'] ) !!}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="control-label col-md-3">Page</label>
                        <div class="col-md-3">
                          <select class="form-control" name="page_id">
                            <option value="0" >No parent</option>
                              @foreach($page as $key => $page)
                                <option value="{{$page->id}}" >{{$page->title['en']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        @foreach($langs as $lang)
                          <div class="form-group">
                            <label class="control-label col-md-3">Title {{$lang->name}}</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{old('title.'.$lang->short_code)}}">
                              </div>
                          </div>
                        @endforeach
                        @foreach($langs as $key => $lang)
                          <div class="form-group">
                            <label class="control-label col-md-3">Description {{$lang->name}}</label>
                              <div class="col-md-9">
                                <textarea class="form-control" id="editor{{$key}}" name="description[{{$lang->short_code}}]"></textarea>
                              </div>
                          </div>
                        @endforeach
                        <div class="form-group ">
                          <label class="control-label col-md-3">Have Gallary</label>
                            <div class="col-md-9">
                              <input type="radio" value="yes"  name="have_gallary"> Yes <br>
                              <input type="radio" value="no"  name="have_gallary"> No
                            </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Have Form</label>
                            <div class="col-md-9">
                              <input type="radio" value="yes"  name="have_form"> Yes <br>
                              <input type="radio" value="no"  name="have_form"> No
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Form</label>
                          <div class="col-md-3">
                            <select class="form-control" name="form">
                              <option value="" disabled selected>Select .. </option>
                                @foreach($forms as $key => $form)
                                  <option value="{{$form->id}}" >{{$form->title}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Active</label>
                            <div class="col-md-9">
                               <input type="radio" value="1"  name="status"> Active <br>
                               <input type="radio" value="0"  name="status"> Deactivate
                            </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Navbar</label>
                            <div class="col-md-9">
                              <input type="radio" value="1"  name="nav"> Nav <br>
                              <input type="radio" value="0"  name="nav"> Normal Page
                            </div>
                        </div>
                        <!-- Start Upload Image -->
                        <div class="form-group last">
                          <label class="control-label col-md-3">Upload Image</label>
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
                                  <i class="fa fa-check"></i> Submit
                                </button>
                                <a href="{{url('dashboard/pages')}}" class="btn btn-outline grey-salsa">Cancel</a>
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
<!-- Start Description Section -->
<?php $langs_count = count($langs); ?>
<!-- End Description Section -->
@endsection
@section('jsCode')
<!-- Start Description Section -->
<script> for (var i = 0; i < {{$langs_count}}; i++) {CKEDITOR.replace( 'editor'+i );} </script>
<!-- End Description Section -->
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
