@extends('layouts/adminlayout')
@section('content')
<body>
    <div id="wrapper">
        <div id="page-wrapper" style="height: 100%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Catalogs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <div class="pull-left" style="padding-top: 7px;">
                                Page Management Table
                            </div>
                            <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target=".post-modal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Product
                            </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            {!! $html->table(['width'=>'100%','class'=>'table table-bordered']) !!}                             
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <div class="modal fade post-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title">New Product</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=> 'admin/catalogs/store', 'method'=>'post', 'class'=>'clearfix','id'=>'form-modal','files' => 'true']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name','id'=>'name','required'=>'true']) !!}
                        </div>
                        <div>
                            {!! Form::number('price', null, ['class'=>'form-control','placeholder'=>'Price','id'=>'price','required'=>'true']) !!}
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control textarea fr-view','rows'=>'15','required'=>'true','id'=>'edit-content']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('input', 'Upload image') !!}
                            <div class="file-loading">
                                {!! Form::file('inputfreqd[]',['class'=>'upload-image','accept'=>'image/*']) !!}
                            </div>
                            <small class="text-muted">Allowed file extensions: .jpg/.png/.gif </small>
                        </div>
                        {!! Form::submit('Publish', ['class'=>'btn btn-success btn-submit pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="myEditLargeModalLabel" data-backdrop="static"
        id="myEditModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=> 'admin/catalogs/update', 'method'=>'put', 'class'=>'clearfix','id'=>'form-edit-modal','files' => 'true']) !!}
                        <div class="form-group">
                            {!! Form::text('editname', null, ['class'=>'form-control','placeholder'=>'Name','id'=>'edit-name','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::number('editprice', null, ['class'=>'form-control','placeholder'=>'Price','id'=>'edit-price','required'=>'true']) !!}
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('editdescription', null, ['class'=>'form-control textarea fr-view','rows'=>'15','required'=>'true','id'=>'edit-description']) !!}
                        </div>
                        <div class="preview-image"></div>
                        <div class="form-group">
                            {!! Form::label('input', 'Upload image') !!}
                            <div class="file-loading">
                                {!! Form::file('inputfreqd[]',['class'=>'edit-upload-image','accept'=>'image/*']) !!}
                            </div>
                            <small class="text-muted">Allowed file extensions: .jpg/.png/.gif </small>
                        </div>
                        {!! Form::submit('Edit', ['class'=>'btn btn-success btn-submit pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@section('script')
    {!! $html->scripts() !!}
    <script>
        $(document).ready(function () {
            $('textarea').froalaEditor({
                height: 150,
                imageInsertButtons: false,
                imagePaste: false,
                toolbarButtons:
                ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript',
                    'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|',
                    'paragraphFormat', 'align', 'formatOL', 'formatUL',
                    'outdent', 'indent', 'quote', '-', 'insertLink', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll',
                    'clearFormatting', '|', 'print', 'spellChecker', 'help', 'html', '|', 'undo', 'redo'],
                // of the buttons defined in customImageButtons.
            });
        });
        function removeeditdata(){
            $('.fr-placeholder').html('Type something')
            $('.fr-element').html('')
        }
        function geteditdata(self){
            var iditem = self.getAttribute('data');
            $.ajax({
                url:'/admin/catalogs/edit/'+iditem,
                method:'GET'
            }).done(function(res){
                $('#edit-name').val(res.data.name)
                $('#edit-price').val(res.data.price)
                $('#edit-description').val(res.data.description)
                $('#form-edit-modal').attr('action',$('#form-edit-modal').attr('action')+'/'+iditem)
                $('.fr-placeholder').html('')
                $('.fr-element').html(res.data.description)
                $('.preview-image').html(res.imgpreview)
            })
        }
    </script>
@endsection