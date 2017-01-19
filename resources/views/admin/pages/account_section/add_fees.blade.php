@extends('admin.master')

@section('title', 'Add Fees')


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
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Fee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/save-fees') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fee Title</label>
                        <input type="text" name="fee_title" class="form-control" id="exampleInputEmail1" placeholder="fee title">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" name="fee_amount" placeholder="fee amount" class="form-control">
                        <span class="input-group-addon">.00</span>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets/plugins/toastr/toastr.min.js')}}"></script>
<!--ajax-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin_assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->

@endpush<!-- End additional Script-->
@endsection
