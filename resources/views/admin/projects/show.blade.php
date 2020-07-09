@extends('layouts.app')

@section('sidebar')

@include('admin.partials.sidebar')

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
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
            <i class="fas fa-user"></i>
            </div>
            <div class="sub-info-text">
                {{ $project->assigned_user->name }}
            </div>
        </div>
        <div class="sub-info-flex-container">
            <div class="sub-info-icon">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div class="sub-info-text">
                
                @if($project->completed_at == null)

                    Open

                @else

                    Closed On {{ $project->completed_at->format('F j, Y') }}

                @endif

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
                <button class="office-button-primary-auto-width file-upload-toggle">Upload New File</button>
            </div>
        </div>
    </div>
    <hr />
    <a href="{{ url( '/admin/projects/' . $project->id ) }}/edit" class="office-button-primary-auto-width">Edit Project</a>
    <a href="{{ url( '/admin/projects' ) }}" class="office-button-primary-auto-width">All Projects</a>
</div>

<div class="office-upload-container">
    <form action="{{route('files.fileupload')}}" class='dropzone'>
        @csrf

        <input type="hidden" name="project_id" value="{{ $project->id }}" />
    </form>
</div>

<div class="sidebar-right-container">

  @include('/admin/partials/sidebar-right/projects/projects-show')

</div>

@endsection