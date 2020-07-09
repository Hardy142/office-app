@extends('layouts.app')

@section('sidebar')

    @include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Archives') }}
    </div>
    <div class="office-accordion-wrapper">

        <div class="office-accordion-item">
            <div class="office-accordion-header">
                <div class="office-accordion-header-text">
                    {{ __('Inactive Employees') }}
                </div>
                <div class="archives-badge">
                   <span>{{ count( $employees ) }}</span>
                </div>
            </div>
            <div class="office-accordion-content">
                
                @if( count( $employees ) != 0 )
                <table class="table table-dashboard">
                    <thead>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Inactive On') }}</th>
                    </thead>
                    <tbody>

                        @foreach($employees as $employee)

                            <tr class="office-row-selectable" data-id="{{ $employee->id }}" data-type='users'>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->updated_at->format('F j, Y') }}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @else

                {{ __('There are no Inactive Employees') }}

                @endif
                
            </div>
        </div>
        <div class="office-accordion-item">
            <div class="office-accordion-header">
                <div class="office-accordion-header-text">
                    {{ __('Inactive Clients') }}
                </div>
                <div class="archives-badge">
                   <span>{{ count( $clients ) }}</span>
                </div>
            </div>
            <div class="office-accordion-content">
                
                @if( count( $clients ) != 0 )
                <table class="table table-dashboard">
                    <thead>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Inactive On') }}</th>
                    </thead>
                    <tbody>

                        @foreach($clients as $client)

                            <tr class="office-row-selectable" data-id="{{ $client->id }}" data-type='clients'>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->updated_at->format('F j, Y') }}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @else

                {{ __('There are no Inactive Clients') }}

                @endif
                
            </div>
        </div>
        <div class="office-accordion-item">
            <div class="office-accordion-header">
                <div class="office-accordion-header-text">
                    {{ __('Closed Projects') }}
                </div>
                <div class="archives-badge">
                   <span>{{ count( $projects ) }}</span>
                </div>
            </div>
            <div class="office-accordion-content">
                
                @if( count( $projects ) != 0 )
                <table class="table table-dashboard">
                    <thead>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('Closed On') }}</th>
                    </thead>
                    <tbody>

                        @foreach($projects as $project)

                            <tr class="office-row-selectable" data-id="{{ $project->id }}" data-type='projects'>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->client->name }}</td>
                                <td>{{ $project->completed_at->format('F j, Y') }}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @else

                {{ __('There are no Closed Projects') }}

                @endif
                
            </div>
        </div>
    </div>
</div>

@endsection