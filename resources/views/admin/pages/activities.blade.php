@extends('layouts/adminlayout')
@section('content')
<div id="wrapper">
    <div id="page-wrapper" style="height: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Activities</h1>
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
                        <button class="btn btn-success btn-sm pull-right" 
                        data-toggle="modal" data-target=".post-modal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Post New Activities
                        </button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        
                        <table class="table table-bordered" id="dataTables-activities">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
<div class="modal fade post-modal" 
tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="modal-title">New Activities</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=> 'admin/activities/store', 'method'=>'post', 'class'=>'clearfix','id'=>'form-modal','files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Title','id'=>'title','required'=>'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('author', null, ['class'=>'form-control','placeholder'=>'Author','id'=>'author','required'=>'true']) !!}
                    </div>
                    <br>
                    <div class="form-group">
                        {!! Form::textarea('content', null, ['class'=>'form-control textarea fr-view','rows'=>'35','required'=>'true','id'=>'content']) !!}
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

<div class="modal fade edit-modal" tabindex="-1" role="dialog" 
aria-labelledby="myEditLargeModalLabel" data-backdrop="static"
    id="myEditModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="modal-title">Edit Activities</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=> 'admin/activities/update', 'method'=>'put', 'class'=>'clearfix','id'=>'form-edit-modal','files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::text('edittitle', null, ['class'=>'form-control','placeholder'=>'Title','id'=>'edit-title','required'=>'true']) !!}
                    </div>
                    <div>
                        {!! Form::text('editauthor', null, ['class'=>'form-control','placeholder'=>'Author','id'=>'edit-author','required'=>'true']) !!}
                    </div>
                    <br>
                    <div class="form-group">
                        {!! Form::textarea('editcontent', null, ['class'=>'form-control textarea fr-view','rows'=>'35','required'=>'true','id'=>'edit-content']) !!}
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
@endsection
@section('script')
    
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
        $('#dataTables-activities').DataTable({
            processing : true,
            serverside : true,
            ajax : '/admin/activities',
            columns : [
                    {data:'title', name:'title'},
                    {data:'updated_at', name:'updated_at'},
                    {data:'author', name:'author'},
                    {data:'action', name:'action' ,orderable:'false', searchable:'false'}]
        })
        function removeeditdata(){
            $('.fr-placeholder').html('Type something')
            $('.fr-element').html('')
        }
        function geteditdata(self){
            var iditem = self.getAttribute('data');
            var url = 'activities/update/'+iditem
            $.ajax({
                url:'/admin/activities/edit/'+iditem,
                method:'GET'
            }).done(function(res){
                $('#edit-title').val(res.data.title)
                $('#edit-author').val(res.data.author)
                $('#edit-content').val(res.data.content)
                $('#form-edit-modal').attr('action',url)
                $('.fr-placeholder').html('')
                $('.fr-element').html(res.data.content)
                $('.preview-image').html(res.imgpreview)
            })
        }
    </script>
@endsection