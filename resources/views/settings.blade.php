@extends('layouts.app')

@section('sidebar')

    @if(Auth::user()->role_id == 3)

        @include('employees.partials.sidebar')

    @else

        @include('admin.partials.sidebar')

    @endif

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Account Settings') }}
    </div>
    <form method="POST" action="{{ url( '/settings/update/' . $user->id ) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-md-12">
                <div class="settings-profile-avatar">
                    <div class="user-settings-icon" style="background:url('{{ $user->settings->avatar }}')"></div>
                    <div class="upload-overlay">
                        Upload New Avatar
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <label>{{ __('First Name') }}</label>
                <input 
                    id="first_name" 
                    type="text" 
                    class="form-control @error('first_name') is-invalid @enderror" 
                    name="first_name" 
                    value="{{ $user->settings->first_name }}" 
                    autocomplete="first_name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <label>{{ __('Last Name') }}</label>
                <input 
                    id="last_name" 
                    type="text" 
                    class="form-control @error('last_name') is-invalid @enderror" 
                    name="last_name" 
                    value="{{ $user->settings->last_name }}" 
                    autocomplete="last_name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 sm-12">
                <button type="submit" class="office-button-primary-auto-width">{{ __('Save Settings') }}</button>
            </div>
        </div>
    </form>
</div>

<div class="sidebar-right-container">

  

</div>

<div class="office-upload-container">
    <form action="{{route('settings.fileupload')}}" class='dropzone'>
        @csrf
    </form>
</div>

@endsection