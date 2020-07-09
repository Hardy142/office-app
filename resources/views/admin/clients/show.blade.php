@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
      {{ $client->name }}
    </div>
    <div class="sub-information-container">
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-tags"></i>
            </div>
            <div class="sub-info-text">
                {{ $client->number }}
            </div>
        </div>
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="sub-info-text">
                {{ $client->description }}
            </div>
        </div>
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div class="sub-info-text">
                @if( $client->active == 1)
                    Currently Active
                @else
                    Currently Inactive
                @endif
            </div>
        </div>
    </div>
    <div class="sub-content-header">
        Active Projects
    </div>

    @if(count( $client->projects_active ) != 0)

    <div class="office-accordion-wrapper">

        @foreach($client->projects_active as $active_project)

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
                        <a href="{{ url( '/admin/projects/' . $active_project->id ) }}" class="office-button-secondary-auto-width">View Project</a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    @else

    <p><strong>{{ $client->name }}</strong> doesn't have any active projects.</p>

    @endif

    <hr />
    <a href="/admin/clients/{{ $client->id }}/edit" class="office-button-primary-auto-width">Edit Client</a>
    <a href="/admin/clients" class="office-button-primary-auto-width">All Clients</a>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/clients/clients-show')

</div>

@endsection