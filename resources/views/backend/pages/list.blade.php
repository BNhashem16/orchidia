@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Page Table</h3>
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                      <div class="portlet-body">
                          <div class="table-toolbar">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="btn-group">
                                  <a class="btn green" href="{{route('pages.create')}}" >Add New
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
                                <th> Image </th>
                                <th> Have Gallery</th>
                                <th> Page </th>
                                <th> Status</th>
                                <th> Navbar or Main page</th>
                                <th> Edit </th>
                                <th> Delete </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($page as $key => $page)
                              <tr class="id{{$page->id}}" >
                                <td class="center">{{$key+1}} </td>
                                <td class="center">{{$page->title['en']}}</td>
                                <td class="center">@if(empty($page->image )) <label class="btn btn-danger" >No Image</label> @else<img width="100px" height="100px" src="{{url($page->image)}}" >@endif  </td>
                                <td class="center">
                                  @if($page->have_gallary == 'yes')
                                    <label class="btn btn-primary active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">Yes</label>
                                    @else
                                    <label class="btn btn-danger active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">No</label>
                                  @endif
                                </td>
                                <td class="center">
                                  @if($page->page_id ==0)
                                    <label class="btn btn-primary active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">No Parent</label>
                                    @else
                                    @foreach($page->childs as $child)
                                    <label class="btn btn-danger active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">{{$child->title['en']}}</label>
                                    @endforeach
                                  @endif
                                </td>

                                <td class="center">
                                  @if($page->active ==1)
                                    <label class="btn btn-primary active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">Active</label>
                                    @else
                                    <label class="btn btn-danger active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">Inactive</label>
                                  @endif
                                </td>

                                <td class="center">
                                  @if($page->nav ==1)
                                    <label class="btn btn-primary active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">Navbar</label>
                                    @else
                                    <label class="btn btn-danger active_change" data-id="{{$page->id}}" data-url='{{url('/')}}' data-active="{{$page->active}}">Main Page</label>
                                  @endif
                                </td>
                                <td>
                                  <a class="btn btn-info " href="{{route('pages.edit',$page->id)}}"> Edit </a>
                                </td>
                                <td>
                                  <meta name="csrf-token" content="{{ csrf_token() }}">
                                  <button class="deleteRecord btn btn-danger" data-id="{{$page->id}}" > Delete </button>
                                  </td>
                                </tr>
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

        $(".deleteRecord").click(function(){
          var id = $(this).data("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url: "/dashboard/pages/"+id,
            type: 'DELETE',
            data: { "id": id, "_token": token },
            success: function (data){
                $('tbody tr.id'+id).remove();
            }});
        });
    </script>
    @endsection
@extends('backend.layouts.app')
