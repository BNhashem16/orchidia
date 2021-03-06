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
                <!-- BEGIN FORM-->
                {!! Form::model($gallery,['route' => ['gallery.update',$gallery->id], 'method' => 'PATCH', 'files' => true ,'class' =>'form-horizontal form-bordered'] ) !!}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="control-label col-md-3">Page</label>
                        <div class="col-md-3">
                          <select class="form-control" name="page_id">
                            <option value="0"  @if($page->id == 0) selected @endif >No parent</option>
                            @foreach($page_get as $key => $page_get)
                              <option  value="{{$page_get->id}}" @if($page->page_id == $page_get->id) selected @endif > {{$page_get->title['en']}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        @foreach($langs as $lang)
                          <div class="form-group">
                            <label class="control-label col-md-3">Title {{$lang->name}}</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{$page->title[$lang->short_code]}}">
                              </div>
                          </div>
                        @endforeach
                        @foreach($langs as $key => $lang)
                          <div class="form-group">
                            <label class="control-label col-md-3">Description {{$lang->name}}</label>
                              <div class="col-md-9">
                                <textarea class="form-control" id="editor{{$key}}" name="description[{{$lang->short_code}}]">{{$page->description[$lang->short_code]}}</textarea>
                              </div>
                          </div>
                        @endforeach
                        <div class="form-group ">
                          <label class="control-label col-md-3">Have Gallary</label>
                            <div class="col-md-9">
                              <input type="radio" value="yes" @if($page->have_gallary == 'yes') checked @endif name="have_gallary"> Yes <br>
                              <input type="radio" value="no"  @if($page->have_gallary == 'no' ) checked @endif name="have_gallary"> No
                            </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Have Form</label>
                            <div class="col-md-9">
                              <input type="radio" value="yes" @if($page->have_form == 'yes') checked @endif  name="have_form"> Yes <br>
                              <input type="radio" value="no"  @if($page->have_form == 'no') checked @endif name="have_form"> No
                            </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Active</label>
                            <div class="col-md-9">
                               <input type="radio" value="1" @if($page->active == 1) checked @endif name="status"> Active <br>
                               <input type="radio" value="0" @if($page->active == 0) checked @endif name="status"> Deactivate
                            </div>
                        </div>
                        <div class="form-group ">
                          <label class="control-label col-md-3">Navbar</label>
                            <div class="col-md-9">
                              <input type="radio" value="1" @if($page->nav == 1) checked @endif  name="nav"> Nav <br>
                              <input type="radio" value="0" @if($page->nav == 0) checked @endif  name="nav"> Normal Page
                            </div>
                        </div>
                        <!-- Start Upload Image -->
                        <div class="form-group last">
                          <label class="control-label col-md-3">Upload Image</label>
                            <div class="col-md-9">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                  <img id="preview"  src="{{url($page->image)}}" alt="" />
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
