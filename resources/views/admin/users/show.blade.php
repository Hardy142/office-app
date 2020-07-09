@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ $employee->name }}
    </div>
    <div class="user-single-avatar-container">
        <div class="user-single-avatar" style="background:url('{{ $employee->settings->avatar }}')"></div>
    </div>
    <div class="sub-information-container">
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <a href="mailto:{{ $employee->email }}"><i class="fas fa-envelope-open-text"></i></a>
            </div>
            <div class="sub-info-text">
                <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
            </div>
        </div>
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-user-tag"></i>
            </div>
            <div class="sub-info-text">
                {{ $employee->role->name }}
            </div>
        </div>
    </div>
    <div class="sub-content-header">
        Active Projects
    </div>

    @if(count( $employee->activeAssignedProjects ) != 0)

    <div class="office-accordion-wrapper">

        @foreach($employee->activeAssignedProjects as $active_project)

            <div class="office-accordion-item">
                <div class="office-accordion-header">
                    <div class="office-accordion-header-text">
                        {{ $active_project->name }}
                    </div>
                    <div class="office-accordion-header-progress-container">
                        <div class="user-project-progress">
                            <span class="user-project-data" data-created-at="{{ $active_project->created_at }}" data-due-date="{{ $active_project->due_date }}"></span>
                            <div class="user-project-progress-fill"></div>
                        </div>
                    </div>
                </div>
                <div class="office-accordion-content">
                    {{ $active_project->description }}
                    <div class="accordion-button-container">
                        <a href="/admin/projects/{{ $active_project->id }}" class="office-button-secondary-auto-width">View Project</a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    @else

    <p><strong>{{ $employee->name }}</strong> doesn't have any active projects.</p>

    @endif

    <hr />
    <form method="POST" action="/admin/users/{{ $employee->id }}">
        @csrf
        @method('PUT')

        @if($employee->active == 0)

            <button type="submit" class="office-button-danger">Activate Employee</button>

        @else

            <button type="submit" class="office-button-danger">Deactivate Employee</button>

        @endif

        <a href="/admin/users" class="office-button-primary-auto-width">All Employees</a>
    </form>
</div>

<div class="sidebar-right-container">

    @include('/admin/partials/sidebar-right/users/users-create')

</div>

@endsection