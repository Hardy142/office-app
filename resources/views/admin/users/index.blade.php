@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
  <div class="main-content-header">
      {{ __('Employees') }}
  </div>
  <table class="table office-table">
  <thead>
      <th>{{ __('Avatar') }}</th>
      <th>{{ __('Name') }}</th>
      <th>{{ __('User Role') }}</th>
      <th class="office-table-projects-header">{{ _('Active Projects') }}</th>
  </thead>
  <tbody>

      @foreach( $employees as $employee )

      <tr class="office-row-selectable" data-id="{{ $employee->id }}" data-type='users'>

        <td>
          <div class="user-assigned-col-container">
            <div class="user-assigned-col-avatar" style="background:url('{{ $employee->settings->avatar }}')">
            </div>
          </div>
        </td>

        <td>{{ $employee->name }}</td>

        <td>{{ $employee->role->name }}</td>

        <td class="office-table-col-progress">
          
         @if(count( $employee->activeAssignedProjects ) <= 2)

          <div class="office-progress-container office-progress-container-good">

         @elseif(count( $employee->activeAssignedProjects ) >= 3 && count( $employee->activeAssignedProjects ) < 5)

          <div class="office-progress-container office-progress-container-warning">

         @else

          <div class="office-progress-container office-progress-container-danger">

         @endif

            <span class="office-progress-data office-progress-data-users" data-active="" data-total="">Open Projects&nbsp;&nbsp;{{ count( $employee->activeAssignedProjects ) }}</span>
            <div class="office-progress-fill"></div>
          </div>
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
  <div class="office-pagination-cotnainer">
    {{ $employees->links() }}
  </div>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/users/users') 

</div>

@endsection