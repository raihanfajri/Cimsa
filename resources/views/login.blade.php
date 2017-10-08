@if(auth()->user()==null)
<div class="modal fade login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container" style="padding: 50px;">
            <h4 class="modal-title">Login</h4>
            <hr>
            {!! Form::open(['url'=>'login']) !!}
                <div class="form-group">
                    {!! Form::email('email', null, [
                        "class" => "form-control {{ $errors->has('email') ? 'is-invalid' ? 'is-valid' }}",
                        "placeholder" => "E-mail",
                        "required"
                    ]) !!}
                    {!! $errors->first("email", "<div class='invalid-feedback'>:message</div>") !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', [
                        "class" => "form-control {{ $errors->has('password') ? 'is-invalid' ? 'is-valid' }}",
                        "placeholder" => "Password",
                        "required"
                    ]) !!}
                    {!! $errors->first("password", "<div class='invalid-feedback'>:message</div>") !!}
                </div>
                {!! Form::submit('Login', [
                    "class" => "btn btn-danger btn-block"
                ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endif