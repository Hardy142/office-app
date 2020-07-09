@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Add Project') }}
    </div>
    <form method="POST" action="{{ url( '/admin/projects' ) }}">
        @csrf

        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Project Name') }}</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="number">{{ __('Project Number') }}</label>
                <input 
                type="text" 
                class="form-control" 
                id="number" 
                name="number" 
                value="{{ old('number') }}"
                autocomplete="number">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="description">{{ __('Project Description') }}</label>
                <textarea 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    value="{{ old('description') }}"
                    autocomplete="description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="client_id">{{ __('Client') }}</label>
                <select id="client_id" name="client_id" class="form-control">

                    @foreach($clients as $client)
                    
                        <option value="{{ $client->id }}">{{ $client->name }}</option>

                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="user_assigned">{{ __('User Assigned') }}</label>
                <select id="user_assigned" name="user_assigned" class="form-control">

                    @foreach($employees as $employee)
                    
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>

                    @endforeach

                </select>
            </div>
        </div>
 
      
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="due_date">{{ __('Project Due Date') }}</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>
            <div class="col-lg-6 col-md-12">
            </div>
        </div>
        <input type="hidden" id="user_created" name="user_created" value="{{ $user->id }}" />
        <button type="submit" class="office-button-primary-auto-width">Add Project</button>
    </form>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/projects/projects-create')

</div>

@endsection