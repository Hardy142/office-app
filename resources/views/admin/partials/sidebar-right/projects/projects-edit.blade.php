<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        Open Projects
    </div>

    <div class="sidebar-right-list-container">

        @foreach ($all_projects as $all_project)

            <div class="sidebar-right-list-item">
                <a href="{{ url( '/admin/clients/' . $all_project->id ) }}" class="sidebar-right-list-item-link">{{ $all_project->name }}</a>
            </div>

        @endforeach

        {{ $all_projects->links() }}

    </div>
</div>