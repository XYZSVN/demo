@extends('admin.master')

@section('title', 'Account Settings')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
<!-- toastr css -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/toastr/toastr.css')}}">

<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/iCheck/all.css')}}">

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
    <div class="col-md-6" style="background-color: white; padding: 10px; border-radius: 5px">
        <form action="{{ url('/update-invoice-item') }}" id="ajaxUpdateInvoiceForm" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <select name="account_item_name" class="form-control">
                    @foreach($account_item_info as $v)
                    <option value="{{$v->id}}"> {{ $v->account_item_name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input name="account_item_status" value="{{ $invoice_info->status }}" class="form-control  text-info" type="text" id="ajaxEditInvoiceAccountItemStatus">
            </div>
            <div class="form-group">
                <input name="account_item_note" value="{{ $invoice_info->note }}" class="form-control  text-info" type="text" id="ajaxEditInvoiceAccountItemNote">
            </div>
            <div class="form-group">
                    <button class="btn btn-success" name="btn" type="submit">Submit</button>
            </div>
            <input type="hidden" value="{{ $invoice_info->id }}" name="invoice_id" id="ajaxEditInvoiceId">
        </form>

    </div>
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets')}}/plugins/toastr/toastr.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/iCheck/icheck.min.js"></script>

<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->

@endpush<!-- End additional Script-->
@endsection


