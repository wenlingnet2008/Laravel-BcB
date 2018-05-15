@if(session('status'))
    <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success m-t-40">
        <span id="return-message">{{ session('status') }}</span>
        <a href="#" class="closed">×</a>
    </div>
@endif

@if(count($errors) > 0)
    <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger m-t-40">
                                <span id="return-message">
                                    @foreach($errors->all() as $error)
                                        {{ $error }} <br/>
                                    @endforeach
                                </span>
        <a href="#" class="closed">×</a>
    </div>
@endif