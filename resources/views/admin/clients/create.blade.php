@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">
    <div class="main-content-header">
        {{ __('Add Client') }}
    </div>
    <form method="POST" action="{{ url( '/admin/clients' ) }}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6 col-md-12">
                <label for="name">{{ __('Name')  }}</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name" />

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
                <label for="name">{{ __('Number')  }}</label>
                <input 
                    type="text"
                    class="form-control" 
                    id="number" 
                    name="number" 
                    value="{{ old('number') }}"
                    required
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
                <label for="name">{{ __('Description') }}</label>
                <textarea 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    value="{{ old('description') }}"
                    autocomplete="description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 col-sm-12">
                <button type="submit" class="office-button-primary-auto-width">{{ __('Add Client') }}</button>
            </div>
        </div>
    </form>

</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/clients/clients-create')

</div>

@endsection