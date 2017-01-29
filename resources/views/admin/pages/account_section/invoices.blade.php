@extends('admin.master')

@section('title', 'Student Invoices')


@section('main-content')    


@push('css')     <!-- additional css-->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
@endpush         <!-- end additional css-->


<!--Start main Content-->

<div class="row">
    <div class="callout callout-success">
        <h2 class="text-center">Student Invoices</h2>
    </div>    
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Total Students : {{ $invoices->count() }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="view2" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Account Item Name</th>
                            <th>Item Price</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>
                                <a href="{{url('/student-details/'.$v->user_id)}}">
                                    <?php
                                    $user = DB::table('students')->where('id', $v->user_id)->first();
                                    echo $user->first_name . ' ' . $user->last_name;
                                    ?>
                                </a>
                            </td>
                            <td>{{ $v->account_item->account_item_name }}</td>
                            <td>{{ $v->note }}</td>
                            <td>{{ $v->account_item->account_item_price }}</td>
                            <td><?php $status = $v->status; ?> @if($status) Paid @else Unpaid @endif</td>
                            <td> {{ $v->invoice_created_by }} </td>
                            <td> {{ $v->note }} </td>
                            <td class="text-center">
                                <!--view_head_item('{{$v -> id}}','{{url('/ajax-view-head-item')}}')-->
<!--                                <a class="btn btn-info" href="#view_invoice_item" data-toggle="modal" onclick="" >
                                    <span data-toggle="tooltip" data-placement="top" title="view" class="glyphicon glyphicon-eye-open"></span>
                                </a>-->
                                <a class="btn btn-warning" href="{{url('/edit-student-invoice-item/'.$v->id)}}" >
                                    <span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a class="btn btn-danger" href="{{url('/delete-invoice-item/'.$v->id)}}" onclick="return confirm('Are Your Sure to Delete Invoice Item?')" >
                                    <span data-toggle="tooltip" data-placement="top" title="trash" class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>              
</div>

<!--MODALS-->                 


<!--view Head Item modal-->
<div class="modal modal-info fade" id="view_invoice_item" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Invoice Item</h4>
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
<!--edit Head Item modal-->
<!--<div class="modal modal-warning fade" id="edit_invoice_item" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Invoice Item</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/ajax-update-invoice-item') }}" id="ajaxUpdateInvoiceForm" method="post" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="account_item_name" class="form-control  text-info" type="text" id="ajaxEditInvoiceAccountItemName">
                    </div>
                    <div class="form-group">
                        <input name="account_item_status" class="form-control  text-info" type="text" id="ajaxEditInvoiceAccountItemStatus">
                    </div>
                    <div class="form-group">
                        <input name="account_item_note" class="form-control  text-info" type="text" id="ajaxEditInvoiceAccountItemNote">
                    </div>
                    <input type="hidden" name="invoice_id" id="ajaxEditInvoiceId">
                </form>
                <br/><br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline pull-left" form="ajaxUpdateInvoiceForm">Update</button>
            </div>
        </div>
         /.modal-content 
    </div>
     /.modal-dialog 
</div>-->
<!--end edit CLASS modal-->

<!--DELETE CLASS modal-->
<div class="modal modal-danger fade" id="delete_invoice_item" role="dialog">
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


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->

<!--Ajax Script-->
<script>
//function delete_invoice_item(id, link){
//    $.ajax({
//    url: link,
//            type: "GET",
//            data: {"id": id},
//            success: function (result) {
//            //console.log(result);
//            $(des).html(result.res);
//            }
//    });
//}

function edit_invoice_item(id, link){
    $.ajax({
    url: link,
            type: "GET",
            data: {"data": id},
            success: function (result) {
            //console.log(result);
            $("#ajaxEditInvoiceAccountItemName").val(result.account_item_id);
            $("#ajaxEditInvoiceAccountItemStatus").val(result.status);
            $("#ajaxEditInvoiceAccountItemNote").val(result.note);
            $("#ajaxEditInvoiceId").val(result.id);
            //$("#ajax_edit_head_id").val(result.id);
            }
    });
}

</script>


<script>
  $(function () {
    $("#view1").DataTable();
    $('#view2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });
</script>
@endpush            <!-- End additional Script-->
@endsection
