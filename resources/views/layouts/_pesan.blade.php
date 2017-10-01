<div class="card-default bg-light mb-3 clearfix">
  <div class="card-body">
    <h4 class="card-title">Send Message for CIMSA</h4>
    {!! Form::open(['url'=>url("sendMsg"),'method'=>'post']) !!}
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            {!! Form::label('nama', 'Name', ['class'=>'control-label']) !!}
            {!! Form::text('nama', null, ['class'=>'form-control', 'required']) !!}
            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'E-mail', ['class'=>'control-label']) !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('pesan') ? 'has-error' : '' }}">
            {!! Form::label('pesan', 'Messsage', ['class'=>'control-label']) !!}
            {!! Form::textarea('pesan', null, ['class'=>'form-control', 'rows'=>'5', 'required']) !!}
            {!! $errors->first('pesan', '<p class="help-block">:message</p>') !!}
        </div>
        {!! Form::submit('Send', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
  </div>
</div>