{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'data-confirm'=>$confirm_message, 'class'=>'form-inline js-confirm','id'=>'deleteform']) !!}
<a>
    <i class='fa fa-pencil-square-o fa-lg' data='{{$id}}' data-toggle='modal' data-target='.edit-modal' aria-hidden='true' onclick='geteditdata(this)'></i>
</a>
<a onclick='submitdelete()'>
    <i class='fa fa-trash-o fa-lg' aria-hidden='true'> </i>
</a>
{!! Form::close() !!}