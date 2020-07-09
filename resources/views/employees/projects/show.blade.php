@extends('layouts.app')

@section('sidebar')

    @include('employees.partials.sidebar')

@endsection

@section('content')

<div class="main-content-wrapper">

    <div class="main-content-header">
        {{ $project->name }}
    </div>
    <div class="sub-information-container">
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-tags"></i>
            </div>
            <div class="sub-info-text">
                {{ $project->number }}
            </div>
        </div>
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="sub-info-text">
                {{ $project->description }}
            </div>
        </div>
    </div>
    <div class="project-single-upload-wrapper row">
        <div class="col-md-6 col-sm-12" style="padding-top:15px;padding-bottom:15px;">
            <p><strong>Project Files</strong></p>
            <div class="project-single-upload-list-container">
                
                @foreach($project->get_files as $file)

                    <div class="project-single-upload-list-item">
                        <a href="{{ url( '/admin/projects/download/' . $file->id ) }}">{{ $file->name }}</a>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="col-md-6 col-sm-12" style="padding-top:15px;padding-bottom:15px;">
            <div class="project-single-upload-btn-container">
                <button class="office-button-primary-auto-width file-upload-toggle">{{ __( 'Upload New File' ) }}</button>
            </div>
        </div>
    </div>
</div>

<div class="office-upload-container">
    <form action="{{route('files.fileupload')}}" class='dropzone'>
        @csrf

        <input type="hidden" name="project_id" value="{{ $project->id }}" />
    </form>
</div>

<div class="sidebar-right-container">

  @include('/employees/partials/sidebar-right/projects/projects-show')

</div>

@endsection