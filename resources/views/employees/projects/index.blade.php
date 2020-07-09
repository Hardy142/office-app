@extends('layouts.app')

@section('sidebar')

    @include('employees.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">

<div class="main-content-header">
        {{ __('Your Active Projects') }}
    </div>

    @if(count( $user->activeAssignedProjects ) != 0)

    <div class="office-accordion-wrapper">

        @foreach($user->activeAssignedProjects as $active_project)

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
                        <a href="{{ url( '/projects/' . $active_project->id ) }}" class="office-button-secondary-auto-width">View Project</a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    @else

    <p><strong>{{ $user->name }}</strong>, you have no active Projects, relax...</p>

    @endif

</div>

@endsection