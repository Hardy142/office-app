<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        All Clients
    </div>

    <div class="sidebar-right-list-container">

        @foreach ($clients_sidebar as $client_sidebar)

            <div class="sidebar-right-list-item">
                <a href="{{ url( '/admin/clients/' . $client->id ) }}" class="sidebar-right-list-item-link">{{ $client_sidebar->name }}</a>
            </div>

        @endforeach

        {{ $clients_sidebar->links() }}

    </div>
</div>