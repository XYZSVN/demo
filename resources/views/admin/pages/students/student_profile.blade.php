@extends('admin.master')

@section('title', 'Student Profile')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
@endpush         <!-- end additional css-->

<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="col-xs-6">
                    <img src="{{asset('public/'.$student_info->image)}}" alt="Profile Picture" class="img-responsive img-rounded">
                </div>
                <div class="col-xs-4">
                    <h3>Student Name: {{ $student_info->first_name.' '.$student_info->last_name }} </h3>
                    <h3>Student ID : {{ $student_info->sid }}</h3>
                    <table class="table">
                        <?php
                        $all_receivalbe = 0;
                        $all_paid_taka = 0;
                        foreach ($invoices as $v) {
                            $all_receivalbe += $v->account_item->account_item_price;
                            $all_paid_taka += $v->paid_taka;
                        }
                        ?>
                        <tr>
                            <th>Total Receivable: </th>
                            <td><span style="color: blue"> {{ $all_receivalbe }} </span> TK </td>
                        </tr>
                        <tr>
                            <th>Total Paid : </th>
                            <td><span style="color: green"> {{ $all_paid_taka }} </span> TK </td>
                        </tr>
                        <tr>
                            <th>Total Due :</th>
                            <td><span style="color: red"> {{ $all_receivalbe - $all_paid_taka }} </span> TK </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>SL</th>
                        <th>Transaction Date</th>
                        <th>Created By</th>
                        <th>Account Item Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Due</th>
                        <th>Others</th>
                    </tr>
                    @foreach($invoices as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <?php $date = strtotime($v->created_at); echo date('d-F-Y',$date); ?>
                        </td>
                        <td>{{ $v->invoice_created_by }}</td>
                        <td> {{ $v->account_item->account_item_name }} </td>
                        <td> {{ $v->account_item->account_item_price }} </td>
                        <td><span class="label label-success">Status</span></td>
                        <td> Due </td>
                        <td> Others </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>



<!--Start main Content-->

<!--<div class="row">
    <div class="col-md-3">

         Profile Image 
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/'.$student_info->image)}}" alt="Student Profile Picture">

                <h3 class="profile-username text-center">{{ $student_info->first_name.' '. $student_info->last_name }}</h3>

                <p class="text-center"> {{ $student_info->class }} <span class="text-muted">{{ $student_info->academic_year }}</span> </p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
             /.box-body 
        </div>
         /.box 

         About Me Box 
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
             /.box-header 
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
             /.box-body 
        </div>
         /.box 
    </div>
    <div class="col-md-9">
        <div class="container-fluid" style="background-color: white; padding: 20px; border-radius: 5px;">
            <table id="view2" class="table table-bordered table-striped table-hover">
                <a href="#addNewInvoice" data-toggle="modal" onclick="account_item_from_ajax('{{ url('/ajax-each-student-invoice-item-create') }}','#addInvoiceModalAccountItemsInfo')" class="btn btn-success"> Add New Invoice </a>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Account Item Name</th>
                    <th>Note</th>
                    <th>Item Price</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->account_item->account_item_name }}</td>
                    <td>{{ $v->note }}</td>
                    <td>{{ $v->account_item->account_item_price }}</td>
                    <td>status</td>
                    <td><a href="#">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
     /.col 
</div>-->
<!-- /.row -->

<!--Add Invoice Modal Start-->
<div class="modal fade" id="addNewInvoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Invoice Modal</h4>
            </div>
            <div class="modal-body" >
                <seclect class="form-control" id="addInvoiceModalAccountItemsInfo">
                    <option selected disabled> Select Account Item </option>
                </seclect>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Invoice</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Add Invoice Modal End-->



<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
function account_item_from_ajax(link, des)
{
    $.ajax({
        url: link,
        type: "GET",
        success: function (result) {
            //console.log(result);
            $(des).html(result.response);
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
