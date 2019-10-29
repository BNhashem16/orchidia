@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Gallery Table</h3>
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                      <div class="portlet-body">
                          <div class="table-toolbar">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="btn-group">
                                  <a class="btn green" href="{{route('gallery.create')}}" >Add New
                                    <i class="fa fa-plus"></i>
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                          @if(Session::has('success'))
                            <p class="alert alert-success" > {{Session::get('success')}}</p>
                            @elseif(Session::has('error'))
                            <p class="alert alert-danger" > {{Session::get('error')}}</p>
                          @endif
                        <div class="table_change">
                          <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                              <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> attachment </th>
                                <th> Type </th>
                                <th> Edit </th>
                                <th> Delete </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($gallery as $key => $gallery)
<tr>
                                <td class="center">{{$key+1}} </td>
                                <td class="center">{{$gallery->title}}</td>
                                <td class="center"> <img width='80px' height='80px' src="{{url($gallery->attachment)}}" > </td>
                                <td class="center"><label class="btn btn-warning" style="color:black;" >{{$gallery->type}}<label>  </td>
                                <td>
                                  <a class="btn btn-info " href="{{route('pages.edit',$gallery->id)}}"> Edit </a>
                                </td>
                                <td>
                                  {!! Form::Open(['method' => 'DELETE' , 'route' => ['gallery.destroy',$gallery->id]]) !!}
                                    <button class="btn btn-danger" data-id="{{$gallery->id}}" onclick="deletefunction({{$gallery->id}},'{{url('/')}}')"> Delete </button>
                                  {!! Form::Close() !!}
                                </td></tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsCode')
    <script type="text/javascript">
        $(document).on('click','.active_change',function () {
            var url = $(this).data('url');
            var id = $(this).data('id');
            var active = $(this).data('active');
            $.ajax({
                type: "GET",
                url:url+'/dashboard/lang/change_active/'+id,
                data: {'id':id,'active':active},
                cache: false,
                success: function(result)
                {
                    $('.table_change').html(result);
                }
            });

        });
        function deletefunction(id,url) {

            $.ajax({
                type: "GET",
                url:url+'/dashboard/lang/delete_ajax/'+id,
                data: {'id':id},
                cache: false,
                success: function(result)
                {
                    $('.table_change').html(result);
                }
            });
        }
    </script>
    @endsection
@extends('backend.layouts.app')
