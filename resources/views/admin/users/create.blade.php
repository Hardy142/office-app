@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Add New User') }}
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Name') }}</label>
                <input 
                    id="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autocomplete="name" 
                    autofocus>

                    @error('name')

                        <div class="error-container">
                            <ul>
                                <li>{{ $message }}</li>
                            <ul>
                        </div>

                    @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Email') }}</label>
                <input 
                    id="email" 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email">

                @error('email')

                    <div class="error-container">
                        <ul>
                            <li>{{ $message }}</li>
                        <ul>
                    </div>

                @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Employee Role') }}</label>
                <select id="user_role" name="user_role" class="form-control @error('user_role') is-invalid @enderror" required>
                    <option value="2">Admin</option>
                    <option value="3" selected>Employee</option>
                </select>

                @error('user_role')

                    <div class="error-container">
                        <ul>
                            <li>{{ $message }}</li>
                        <ul>
                    </div>

                @enderror
            </div>
            <div class="col-lg-6 col-md-12">

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="password">{{ __('Password') }}</label>
                <input 
                    id="password" 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" 
                    required 
                    autocomplete="new-password">

                    @error('password')
                    
                        <div class="error-container">
                            <ul>
                                <li>{{ $message }}</li>
                            <ul>
                        </div>

                    @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input 
                    id="password-confirm" 
                    type="password" 
                    class="form-control" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 sm-12">
                <button type="submit" class="office-button-primary-auto-width">{{ __('Add Employee') }}</button>
            </div>
        </div>
    </form>
</div>

<div class="sidebar-right-container">

    @include('/admin/partials/sidebar-right/users/users-create')

</div>

@endsection