@if(session('danger'))
    <div class="msg_alert alert alert-danger">
        <strong>{{ session('danger') }}</strong>
    </div>
@endif