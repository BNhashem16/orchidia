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
        <h3 class="page-title">Create New Form</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        {!! Form::Open(['route'=>'form.store','files'=>true  ,'class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Category</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="component_category_id">
                                                    @foreach($component_category as $key => $component_category)
                                                        <option value="{{$component_category->id}}" @if($form->component_categories->id == $component_category->id ) selected @endif >{{$component_category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                          @foreach($langs as $lang)
                                              <div class="form-group">
                                                  <label class="control-label col-md-3">Title {{$lang->name}}</label>
                                                  <div class="col-md-9">
                                                      <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{$form->title[$lang->short_code]}}">
                                                  </div>
                                              </div>
                                          @endforeach
                                          @foreach($langs as $key=>$lang)
                                              <div class="form-group" >
                                                  <label class="control-label col-md-3">option {{$lang->name}}</label>
                                                  <div class="col-md-7" id="newElementId{{$lang->short_code}}">
                                                    <input type="text" class="form-control" name="extra[{{$lang->short_code}}][{{$key}}]" value="{{old('title.'.$lang->short_code)}}">
                                                  </div>
                                                  <div class="col-md-2" id="dynamicCheck">
                                                     <input type="button" value="Create Element" onclick="createNewElement('{{$lang->short_code}}');"/>
                                                  </div>
                                              </div>
                                          @endforeach
                                          <div class="form-group">
                                                  <label class="control-label col-md-3">Type</label>
                                                  <div class="col-md-3">
                                                      <select class="form-control" name="type">
                                                              <option value="text" @if($form->field['type'] == 'text' ) selected @endif >Text</option>
                                                              <option value="date" @if($form->field['type'] == 'date' ) selected @endif>Date</option>
                                                              <option value="selector" @if($form->field['type'] == 'selector' ) selected @endif>Selector</option>
                                                              <option value="email" @if($form->field['type'] == 'email' ) selected @endif>Email</option>
                                                              <option value="password" @if($form->field['type'] == 'password' ) selected @endif>Password</option>
                                                              <option value="number" @if($form->field['type'] == 'number' ) selected @endif>number</option>
                                                              <option value="file" @if($form->field['type'] == 'file' ) selected @endif>file</option>
                                                              <option value="submit" @if($form->field['type'] == 'submit' ) selected @endif >Submit</option>
                                                      </select>
                                                  </div>
                                              </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mendatory</label>
                                            <div class="col-md-1">
                                                <input type="checkbox" class="form-control" name="mendatory" value="1" @if($form->field['mendatory'] == 1) checked @endif>
                                            </div>
                                        </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>
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
<?php $langs_count = count($langs); ?>
<!-- END CONTENT -->
@endsection
@section('jsCode')
<script type="text/JavaScript">
// function createNewElementar() {
//     // First create a DIV element.
// 	var txtNewInputBox = document.createElement('div');
//
//     // Then add the content (a new input box) of the element.
// 	txtNewInputBox.innerHTML = "<input type='text' class='form-control' id='newInputBox' name='extra[ar]' >";
//
//     // Finally put it where it is supposed to appear.
// 	document.getElementById("newElementId").appendChild(txtNewInputBox);
// }
</script>

<script type="text/JavaScript">
var key=0;
function createNewElement(lan) {
    // First create a DIV element.
  key++;
	var txtNewInputBox = document.createElement('div');

    // Then add the content (a new input box) of the element.
	txtNewInputBox.innerHTML = "<input type='text' class='form-control' id='newInputBox' name='extra["+lan+"]["+key+"]'>";

    // Finally put it where it is supposed to appear.
	document.getElementById("newElementId"+lan).appendChild(txtNewInputBox);

}
</script>

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
