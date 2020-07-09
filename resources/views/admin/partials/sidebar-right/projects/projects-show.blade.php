<div class="sidebar-right-item-container">
    <form method="POST" action="{{ url( '/admin/projects/complete/' . $project->id ) }}">
        @csrf
        @method('PUT')

        @if($project->completed_at == null)

            <button type="submit" class="office-button-good">Close Project</button>

        @else
        
            <button type="submit" class="office-button-danger-full-width">Reopen Project</button>
        
        @endif

    </form>
</div>
<div class="sidebar-right-item-container">
    <div class="sidebar-right-item-header">
        Messages
    </div>
    <div class="sidebar-right-conversation-container">
       <div id="message-board" class="sidebar-right-messages-wrapper">

            @if(count($project->get_conversation->get_messages) != 0)

                @foreach($project->get_conversation->get_messages as $message)

                    @if($message->id == $user->id)

                        <div class="conversation-message message-right">
                            <div class="message-author">
                                {{ $message->get_user->name }}
                            </div>
                            <div class="message-body">
                                {{ $message->message }}
                            </div>
                            <div class="message-date">
                                {{ $message->sent_at }}
                            </div>
                        </div>

                    @else

                        <div class="conversation-message message-left">
                            <div class="message-author">
                                {{ $message->get_user->name }}
                            </div>
                            <div class="message-body">
                                {{ $message->message }}
                            </div>
                            <div class="message-date">
                                {{ $message->created_at->format('F j - g:i A') }}
                            </div>
                            
                            @if( $message->been_viewed == 0 )

                                <div class="new-message-badge-container">
                                    <form method="POST" action="{{ url( '/messages/' . $message->id ) }}">
                                        @csrf
                                        @method('PUT')
                                        
                                        <input 
                                            type="hidden"
                                            id="project_id"
                                            name="project_id"
                                            value="{{ $message->get_conversation->get_project->id }}">
                                        <input 
                                            type="hidden"
                                            id="user_id"
                                            name="user_id"
                                            value="{{ $user->id }}">
                                        <button type="submit" class="office-badge-button">
                                            <i class="fas fa-exclamation"></i>
                                        </button>
                                    </form>
                                </div>

                            @endif

                        </div>

                    @endif

                @endforeach

            @endif

       </div>
       <div class="send-messages-container">
            <form method="POST" action="{{ url( '/messages' ) }}">
                @csrf

                <input 
                    type="text"
                    id="message"
                    name="message"
                    class="form-control"
                    placeholder="send a message..."
                    autofocus>
                <input 
                    type="hidden"
                    id="conversation_id"
                    name="conversation_id"
                    value="{{ $project->get_conversation->id }}">
                <input 
                    type="hidden"
                    id="user_id"
                    name="user_id"
                    value="{{ $user->id }}">
                <input 
                    type="hidden"
                    id="project_id"
                    name="project_id"
                    value="{{ $project->id }}">
                <button type="submit" class="office-button-secondary">Send</button>
            </form>
       </div>
    </div>
</div>