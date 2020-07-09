<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        All Employees
    </div>

    <div class="sidebar-right-list-container">

        @foreach ($employees as $employee)

            <div class="sidebar-right-list-item">
                <a href="{{ url( '/admin/users/' . $employee->id ) }}" class="sidebar-right-list-item-link">{{ $employee->name }}</a>
            </div>

        @endforeach

        {{ $employees->links() }}

    </div>

</div>