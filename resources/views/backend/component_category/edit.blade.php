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
                    <span>Language</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Edit Language</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        {!! Form::model($lang,['route' => ['lang.update',$lang->id], 'method' => 'PATCH'] , ['class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$lang->name}}" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$lang->short_code}}" name="short_code">
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label class="control-label col-md-3">Active</label>
                                    <div class="col-md-9">
                                             <input type="radio" value="1" @if($lang->active == 1) checked @endif  name="status"> Active <br>
                                             <input type="radio" value="0" @if($lang->active == 0) checked @endif name="status"> Deactivate
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="Submit" class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{url('dashboard/lang')}}" class="btn btn-outline grey-salsa">Cancel</a>
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
<!-- END CONTENT -->
@endsection
@extends('backend.layouts.app')
