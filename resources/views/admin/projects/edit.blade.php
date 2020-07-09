@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Edit Project') }}
    </div>
    <form method="POST" action="{{ url( '/admin/projects/' . $project->id ) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Project Name') }}</label>
                <input 
                    type="text" 
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ $project->name }}"
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
                <label for="number">{{ __('Project Number') }}</label>
                <input 
                    type="text"
                    class="form-control"
                    id="number"
                    name="number"
                    value="{{ $project->number }}"
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
                <label for="description">{{ __('Project Description') }}</label>
                <textarea 
                    class="form-control"
                    id="description"
                    name="description"
                    aurocomplete="description">{{ $project->description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 col-sm-12">
                <button type="submit" class="office-button-primary-auto-width">Submit</button>
            </div>
        </div>
        </form>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/projects/projects-edit')

</div>

@endsection