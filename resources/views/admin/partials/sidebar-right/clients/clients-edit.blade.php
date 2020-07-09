<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        All Clients
    </div>

    <div class="sidebar-right-list-container">

        @foreach ($all_clients as $all_client)

            <div class="sidebar-right-list-item">
                <a href="{{ url( '/admin/clients/' . $all_client->id ) }}" class="sidebar-right-list-item-link">{{ $all_client->name }}</a>
            </div>

        @endforeach

        {{ $all_clients->links() }}

    </div>
</div>