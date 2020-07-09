@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
  <div class="main-content-header">
      {{ __('Clients') }}
  </div>
  <table class="table office-table">
    <thead>
        <th>{{ __('Name') }}</th>
        <th class="office-table-projects-header">{{ __('Active Projects') }}</th>
    </thead>
  <tbody>

      @foreach( $clients as $client )

      <tr class="office-row-selectable" data-id="{{ $client->id }}" data-type='clients'>
        <td>{{ $client->name }}</td>

        <td class="office-table-col-progress">

          @if(count( $client->projects_active ) <= 2)

          <div class="office-progress-container office-progress-container-good">

          @elseif(count( $client->projects_active ) >= 3 && count( $client->projects_active ) < 5)

          <div class="office-progress-container office-progress-container-warning">

          @else

          <div class="office-progress-container office-progress-container-danger">

          @endif

            <span class="office-progress-data office-progress-data-clients">Open Projects&nbsp;&nbsp;{{ count( $client->projects_active ) }}</span>
            <div class="office-progress-fill"></div>
          </div>
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
  <div class="office-pagination-cotnainer">
    {{ $clients->links() }}
  </div>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/clients/clients')

</div>

@endsection