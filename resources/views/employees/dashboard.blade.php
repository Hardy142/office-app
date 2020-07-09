@extends('layouts.app')

@section('sidebar')

    @include('employees.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">

<div class="main-content-header">
        {{ __('Welcome ') . $user->name }}
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-col-wrapper">
               <div class="dashboard-header">
                    {{ __('Project Messages') }}
               </div>
               <div class="dashboard-content">
                    
               @foreach($all_projects as $project)

                @if( count($project->get_conversation->unread_messages) != 0 )

                    <a href="{{ url( '/projects/' . $project->id ) }}" class="dashboard-messages-link">
                        {{ $project->name }}
                        <span>{{ count($project->get_conversation->unread_messages) }}</span>                        
                    </a>

                @endif

                @endforeach

               </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-col-wrapper">
            <div class="dashboard-header">
                    {{ __('Projects Records') }}
               </div>
               <div class="dashboard-content">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Open
                        </div>
                        <div class="dashboard-card-content">
                            {{ $open_projects }}
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Closed
                        </div>
                        <div class="dashboard-card-content">
                            {{ $closed_projects }}
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Total
                        </div>
                        <div class="dashboard-card-content">
                            {{ count( $total_projects  ) }}
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection