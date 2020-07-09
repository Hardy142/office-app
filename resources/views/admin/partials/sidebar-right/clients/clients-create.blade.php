<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        All Clients
    </div>

    <div class="sidebar-right-list-container">

        @foreach ($clients as $client)

            <div class="sidebar-right-list-item">
                <a href="{{ url( '/admin/clients/' . $client->id ) }}" class="sidebar-right-list-item-link">{{ $client->name }}</a>
            </div>

        @endforeach

        {{ $clients->links() }}

    </div>
</div>