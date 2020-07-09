@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
  <div class="main-content-header">
        {{ __('Projects') }}
    </div>
  <table class="table office-table">
    <thead>
        <th>Number</th>
        <th>Name</th>
        <th>Client</th>
        <th>User Assigned</th>
        <th>Progress</th>
    </thead>
    <tbody>
      
      @foreach( $projects as $project )

          <tr class="office-row-selectable" data-id="{{ $project->id }}" data-type="projects">
              
              <td>{{ $project->number }}</td>

              <td>{{ $project->name }}</td>

              <td>{{ $project->client->name }}</td>

              <td>
                <div class="user-assigned-col-container">
                  <div class="user-assigned-col-avatar" style="background:url('{{ $project->assigned_user->settings->avatar }}')">
                  </div>
                  <div class="user-assigned-col-name">
                      {{ $project->assigned_user->settings->first_name }}<br>
                      {{ $project->assigned_user->settings->last_name }}
                  </div>
                </div>
              </td>
              <td>
                <div class="user-project-progress">
                      <span class="user-project-data" data-created-at="{{ $project->created_at }}" data-due-date="{{ $project->due_date }}"></span>
                      <div class="user-project-progress-fill"></div>
                  </div>
              </td>
          </tr>

      @endforeach

    </tbody>
  </table>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/projects/projects')

</div>

@endsection