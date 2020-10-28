@extends('backend.layouts.master')

<!--- this is test for source tree -->
@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
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
                    <h4 class="page-title pull-left">Role Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All rols</span></li>
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
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Role Name">
                                
                                </div>

                                <div class="form-group">
                                <label for="name">Permission</label>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  id="checkPermissionAll"  value="1">
                                     <label class="form-check-label" for="checkPermissionAll">All</label>
                                 </div>

                                 <hr/>
                                 @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)

                                <div class="row">
                                    <div class="col-3">
                                       <div class="form-check">
                                       <input type="checkbox" class="form-check-input" name="permissions[]" id="{{ $i }}Management"  value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                          <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                       </div>
                                    </div>
                                 <div class="col-9 role-{{ $i }}-management-checkbox">
                                       @php
                                          $permissions = App\User::getpermissionsByGroupName($group->name);
                                          $j =1;
                                       @endphp
                                       @foreach ($permissions as $permission)
                                          <div class="form-check">
                                             <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}"  value="{{ $permission->name }}">
                                             <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                          </div>
                                          @php $j++; @endphp
                                       @endforeach
                                          <br>
                                    </div>
                                </div>
                                @php $i++; @endphp
                                    
                                @endforeach
                               
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                            </form>
                         
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>        
    </div>
@endsection

@section('scripts')

<script>
   $("#checkPermissionAll").click(function(){
      if($(this).is(':checked')){
         //check all the check
         $('input[type=checkbox]').prop('checked', true);
      }else{
         //un check all the check
         $('input[type=checkbox]').prop('checked', false);
      }
   })

   function checkPermissionByGroup(className, checkThis){
      const groupIdName = $("#"+checkThis.id);
      const  classCheckBox = $('.'+className+' input');

      if(groupIdName.is(':checked')){
         classCheckBox.prop('checked', true);
      }else{
         classCheckBox.prop('checked', false);
      }

   }
</script>
    
@endsection
