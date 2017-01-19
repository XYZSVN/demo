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
            <form role="form" method="POST" action="{{ url('generate-invoice') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label>Select Class</label>
                        <select name="selected_class" class="form-control">
                            <option value="" disabled selected >Select Class</option>
                            @foreach($class as $v)
                            <option value="{{$v->class_name}}">{{$v->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label> Fee Included </label> <br/>
                        @foreach($fee as $v)
                        <input name="{{$v->id}}" type="checkbox" class="minimal" >
                        <label>{{$v->fee_title}}</label> 
                        <input value="{{$v->fee_amount}}" disabled  class="minimal" >
                        <br/>
                        @endforeach
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
<script src="{{asset('publ  ic/admin_assets/plugins/toastr/toastr.min.js')}}"></script>
<!--ajax-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin_assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->

@endpush<!-- End additional Script-->
@endsection
