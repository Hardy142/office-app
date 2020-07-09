@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Edit Client') }}
    </div>
    <form method="POST" action="{{ url( '/admin/clients/' . $client->id ) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Client Name') }}</label>
                <input type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $client->name }}"
                        autocomplete="name">
                
                @error('name')

                    <div class="error-container">
                        <ul>

                        @foreach($errors->get('name') as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                        </ul>
                    </div>

                @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Client Number') }}</label>
                <input type="text"
                        class="form-control"
                        id="number"
                        name="number"
                        value="{{ $client->number }}"
                        autocomplete="number">
                
                @error('number')

                    <div class="error-container">
                        <ul>

                        @foreach($errors->get('number') as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                        </ul>
                    </div>

                @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label>{{ __('Description') }}</label>
                <textarea class="form-control"
                            id="description"
                            name="description"
                            autocomplete="description">{{ $client->description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label>{{ __('Toggle Status') }}</label>
                <select id="client_status" class="form-control" name="active">

                    @if( $client->active == 1 )

                    <option value="1" selected>Active</option>

                    @else

                    <option value="1">Active</option>

                    @endif

                    @if( $client->active == 0 )

                    <option value="0" selected>Inactive</option>>

                    @else

                    <option value="0">Inactive</option>

                    @endif

                </select>
            </div>
            <div class="col-md-6 col-sm-12"></div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 col-sm-12">
                <button type="submit" class="office-button-primary-auto-width">Update</button>
            </div>
        </div>
    </form>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/clients/clients-edit')

</div>

@endsection