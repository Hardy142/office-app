@extends('layouts.app')

@section('sidebar')

    @include('admin.partials.sidebar')

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

                        <a href="{{ url( '/admin/projects/' . $project->id  )}}" class="dashboard-messages-link">
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
                    {{ __('Projects') }}
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
                            {{ count( $all_projects ) }}
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-col-wrapper">
               <div class="dashboard-header">
                    {{ __('Employees') }}
               </div>
               <div class="dashboard-content">
                    <table class="table table-dashboard">
                        <thead>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Last Logged On') }}</th>
                            <th class="table-dashboard-icon-col">{{ __('Online') }}</th>
                        </thead>
                        <tbody>

                            @foreach($employees as $employee)

                                <tr class="office-row-selectable" data-id="{{ $employee->id }}" data-type='users'>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->last_logged_in->format('F j, Y') }}</td>
                                    <td class="table-dashboard-icon-col">

                                        @if($employee->logged_in)

                                            <span class="dashboard-user-table-icon"></span>

                                        @endif

                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-col-wrapper">
            <div class="dashboard-header">
                    {{ __('Clients') }}
               </div>
               <div class="dashboard-content">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Active
                        </div>
                        <div class="dashboard-card-content">
                            {{ $active_clients }}
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Inactive
                        </div>
                        <div class="dashboard-card-content">
                            {{ $inactive_clients }}
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            Total
                        </div>
                        <div class="dashboard-card-content">
                            {{ $total_clients }}
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection