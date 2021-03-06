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
                {!! Form::Open(['route'=>'gallery.store','files'=>true  ,'class' =>'form-horizontal form-bordered'] ) !!}
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

                          <div class="form-group">
                            <label class="control-label col-md-3">Title</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="title" value="">
                              </div>
                          </div>


                        <div class="form-group ">
                          <label class="control-label col-md-3">Type</label>
                            <div class="col-md-9">
                              <input type="radio" value="video"  name="type"> Video <br>
                              <input type="radio" value="image"  name="type"> image
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
                                <a href="{{url('dashboard/gallery')}}" class="btn btn-outline grey-salsa">Cancel</a>
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

@endsection
@section('jsCode')

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
