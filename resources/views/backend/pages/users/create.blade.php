@extends('backend.layouts.master')

<!--- this is test for source tree -->
@section('title')
User Create - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .form-check-label{
      text-transform: capitalize;
   }
</style>
     <!-- Start datatable css -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')

  <!-- page title area start -->
  <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">User Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                        <li><span>Create User</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">

                @include('backend.layouts.partials.logout');

            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">

        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create New Role</h4>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter User Name">
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="exampleInputEmail1">User Email</label>
                                    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter User Email">
                                </div>
                            </div>  

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">User Password</label>
                                    <input type="password" class="form-control" id="name" name="password"  placeholder="Enter Password">
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password_confirm">User Confirm Password</label>
                                    <input type="password" class="form-control" id="email" name="password_confirmation"  placeholder="Enter Pssword">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Assing Roles</label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>        
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();
});
    </script>
@endsection
