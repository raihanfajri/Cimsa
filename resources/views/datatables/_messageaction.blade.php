{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline js-confirm','id'=>'deleteform'.$id]) !!}
    <a onclick="submitdelete({{'\''.$id.'\''}})">
        <i class='fa fa-trash-o fa-lg' aria-hidden='true'> </i>
    </a>
{!! Form::close() !!}