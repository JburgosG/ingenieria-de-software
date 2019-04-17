@if(session('success'))
    <div class="msg_alert alert alert-success">
        <strong>{{ session('success') }}</strong>
    </div>
@endif