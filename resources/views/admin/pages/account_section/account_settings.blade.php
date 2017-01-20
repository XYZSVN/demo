@extends('admin.master')

@section('title', 'Account Settings')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
<!-- toastr css -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/toastr/toastr.css')}}">

@endpush         <!-- end additional css-->


<!--Start main Content-->
@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('success') }}
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('delete') }}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Assign Price</a></li>
                <li><a href="#tab_2" data-toggle="tab">Head Items</a></li>
                <li><a href="#tab_3" data-toggle="tab">Account Head</a></li>
                <li><a href="#tab_4" data-toggle="tab">Assign Item to Student</a></li>

                <!--                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Dropdown <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <form role="form" method="post" action="{{url('save-new-head')}}">
                            {{ csrf_field() }}

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="head_category" class="form-control" required="">
                                        <option selected disabled> Select Head Category </option>
                                        <option value="income"> Income </option>
                                        <option value="expense"> Expense </option>
                                        <option value="bank"> Bank </option>
                                        <option value="asset"> Asset </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="head_item" class="form-control" required="">
                                        <option selected disabled> Select Head Item </option>
                                        <option value="ict_expense"> ICT Expense </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="account_item_name" class="form-control" required="">
                                        <option selected disabled> Select Account Item Name </option>
                                        <option value="soft_cost"> Software Cost </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="class_name" class="form-control">
                                        <option selected disabled> Select Class (Optional) </option>
                                        <option value="class_one"> Class One </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <input class="form-control" name="amount" type="number" required="" placeholder="Cost / Price">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Assign Amount</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Total Students : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="view2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Item Name</th>
                                                <th>Amount</th>
                                                <th>Class</th>
                                                <th>Created By</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Item Name</td>
                                                <td>4000</td>
                                                <td>Class one</td>
                                                <td>Created by</td>
                                                <td>Date</td>
                                                <td><a href="#">Details</a></td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                                <span> pagination </span>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>

                </div>
                <!-- /.tab-pane -->
                
                <!--CLASS tab-->
                <div class="tab-pane" id="tab_2">
                    <br/>
                    <div class="row">
                        <form role="form" method="post" action="{{url('save-new-head')}}">
                            {{ csrf_field() }}

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="account_item_name" placeholder="Account Item Name">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="head_category" class="form-control" required="">
                                        <option selected disabled> Select Head Category </option>
                                        <option value="income"> Income </option>
                                        <option value="expense"> Expense </option>
                                        <option value="bank"> Bank </option>
                                        <option value="asset"> Asset </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="head_item" class="form-control" required="">
                                        <option selected disabled> Select Head Item </option>
                                        <option value="ict_expense"> ICT Expense </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add New Account Item</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box            ">
                                <div class="box-header">
                                    <h3 class="box-title">Total Students : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="view2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Head Name</th>
                                                <th>Head Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Head Name</td>
                                                <td>Category</td>
                                                <td><a href="#">Edit</a></td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                                <span> pagination </span>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>


                </div>
                <div class="tab-pane" id="tab_3">
                    <br/>
                    <div class="row">
                        <form role="form" method="post" action="{{url('save-new-head')}}">
                            {{ csrf_field() }}

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="head_name" placeholder="Add New Head">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="head_category" class="form-control" required="">
                                        <option selected disabled> Select Head Category </option>
                                        <option value="income"> Income </option>
                                        <option value="expense"> Expense </option>
                                        <option value="bank"> Bank </option>
                                        <option value="asset"> Asset </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add New Head</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box            ">
                                <div class="box-header">
                                    <h3 class="box-title">Total Students : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="view2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Head Name</th>
                                                <th>Head Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($all_head_items as $v)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$v->head_name}}</td>
                                                <td>{{$v->head_category}}</td>
                                                <td>
                                                    <a class="btn btn-info" href="#view_head_item" data-toggle="modal" onclick="view_head_item('{{$v -> id}}','{{url('/ajax-view-head-item')}}')" >
                                                        <span data-toggle="tooltip" data-placement="top" title="view" class="glyphicon glyphicon-eye-open"></span>
                                                    </a>
                                                    <a class="btn btn-warning" href="#edit_head_item" data-toggle="modal" onclick="edit_head_item('{{$v->id}}','{{url('/ajax-edit-head-item')}}')">
                                                        <span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit">
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-danger" href="#delete_head_item" data-toggle="modal" onclick="delete_head_item('{{$v->id}}','{{url('/ajax-delete-head-item-view')}}')">
                                                        <span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/ajax-view-head-item')}}">
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>


                </div>
                
                <div class="tab-pane" id="tab_4">
                    Tab 4
                </div>
                
                <!--MODALS-->                 

                    
                    <!--view Head Item modal-->
                    <div class="modal modal-info fade" id="view_head_item" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">View Head Category</h4>
                                </div>
                                <div class="modal-body" id="view_ajax_head_item">
                                    <div class="form-group">
                                        <input class="form-control  text-info" type="text" id="ajax_head_name" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control  text-info" type="text" id="ajax_head_category" disabled="">
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end view CLASS modal-->
                    <!--edit Head Item modal-->
                    <div class="modal modal-warning fade" id="edit_head_item" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit Class</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/ajax-update-head-item') }}" id="update_head_item" method="post" >
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input name="head_name" class="form-control  text-info" type="text" id="ajax_edit_head_name">
                                            <input type="hidden" name="head_id" id="ajax_edit_head_id">
                                        </div>
                                    </form>
                                    <br/><br/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline pull-left" form="update_head_item">Update</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end edit CLASS modal-->
                    <!--DELETE CLASS modal-->
                    <div class="modal modal-danger fade" id="delete_head_item" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete Head Item</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{url('/delete-head-item')}}"  id="delete_head_item_form">
                                        <h1 class="text-center">Are you sure You want to Delete !!!</h1>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" id="delete_head_item_id" >
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                                    <button type="submit" form="delete_head_item_form" class="btn btn-outline pull-right">Delete</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end Delete CLASS modal-->




                    <!--end MODALS-->       
                
                <!--end CLASS tab-->
            </div>
        </div>
    </div>
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets')}}/plugins/toastr/toastr.min.js"></script>
<!--ajax-->
<script>
function view_head_item(id, link)
{
    $.ajax({
        url: link,
        type: "GET",
        data: {"id": id},
        success: function (result) {
            //console.log(result);
            $("#ajax_head_name").val(result.head_name);
            $("#ajax_head_category").val(result.head_category);
        }
    });
}
function edit_head_item(id, link)
{
    $.ajax({
        url: link,
        type: "GET",
        data: {"id": id},
        success: function (result) {
            //console.log(result);
            $("#ajax_edit_head_name").val(result.head_name);
            $("#ajax_edit_head_id").val(result.id);
        }
    });
}
function delete_head_item(id, link)
{
    $.ajax({
        url: link,
        type: "GET",
        data: {"id": id},
        success: function (result) {
            console.log(result);
            $("#delete_head_item_id").val(result.id);
        }
    });
}

//    function view_head_item(id)
//            {
//            var view_url = $("#hidden_view").val();
//            $.ajax({
//                    url: view_url,
//                    type:"GET",
//                    data: {"id":id},
//                    success: function(result){
//                    console.log(result);
//                    $("#ajax_head_title").text(result.head_name);
//                    $("#ajax_head_category").text(result.head_category);
//                    }
//            });
//            }

function send_delete_id(id, des) {
    $(des).val(id);
}
//     function update_class()(id, link, des)
// {
//   $.ajax({
//     url: link,
//     type:"GET", 
//     data: {"id":id,
//           "class_name":
//           }, 
//     success: function(result){
//       $(des).html(result.res);
//     // toastr.error('Item Created Successfully.', 'Success Alert', {
//     //     timeOut: 2000,
//     //     progressBar: true,
//     //     closeButton: true,
//     // });
//     //     location.reload(2000);
//     }
//   });
// };

</script>
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
//    function view_head_item(id, link, des)
//    {
//      $.ajax({
//        url: link,
//        type:"GET", 
//        data: {"id":id}, 
//        success: function(result){
//          $(des).html(result.msg);
//        },
//        error: function(){
//            
//        };
//      });
//    };
    
    
$(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true
    });
});
</script>
<script type="text/javascript">
    function check_delete()
    {
        var chk = confirm("Are you sure to delete this ?");
        if (chk)
        {
            return true;
        } else {
            return false;
        }
    }
</script>
@endpush<!-- End additional Script-->
@endsection
