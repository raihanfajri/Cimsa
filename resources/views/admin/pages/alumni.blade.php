@extends('layouts/adminlayout')
@section('content')
<div id="wrapper">
    <div id="page-wrapper" style="height: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Alumni</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div cla ss="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left" style="padding-top: 7px;">
                            Page Management Table
                        </div>
                        <button class="btn btn-success btn-sm pull-right" 
                        data-toggle="modal" data-target=".post-modal" onclick="removeeditdata()">
                            <i class="fa fa-plus" aria-hidden="true"></i> Regist New Alumni
                        </button>
                        <button class="btn btn-primary btn-sm pull-right" 
                        data-toggle="modal" data-target=".alumni-modal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Alumni of the month
                        </button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-bordered" id="dataTables-alumni">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>SCO</th>
                                        <th>Batch</th>
                                        <th>Image</th>
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
<!-- /#wrapper -->
<div class="modal fade edit-modal" tabindex="-1" role="dialog" 
aria-labelledby="myEditLargeModalLabel" data-backdrop="static"
    id="myEditModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="modal-title">Edit Alumni</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=> 'admin/alumni/update', 'method'=>'post', 'class'=>'clearfix','id'=>'form-edit-modal','files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::text('editnama', null, ['class'=>'form-control','placeholder'=>'Nama','id'=>'edit-nama','required'=>'true']) !!}
                    </div>
                    <div>
                        {!! Form::text('editsco', null, ['class'=>'form-control','placeholder'=>'SCO','id'=>'edit-sco','required'=>'true']) !!}
                    </div>
                    <br>
                    <div class="form-group">
                        {!! Form::text('editbatch', null, ['class'=>'form-control datepicker','placeholder'=>'Batch', 'id'=>'edit-batch','required'=>'true']) !!}
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
<div class="modal fade post-modal" 
tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="modal-title">New Alumni</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=> 'admin/alumni/store', 'method'=>'post', 'class'=>'clearfix','id'=>'form-modal','files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::text('nama', null, ['class'=>'form-control','placeholder'=>'Nama','id'=>'nama','required'=>'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('sco', null, ['class'=>'form-control','placeholder'=>'SCO','id'=>'sco','required'=>'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('batch', null, ['class'=>'form-control datepicker','placeholder'=>'Batch', 'id'=>'batch','required'=>'true']) !!}
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
<div class="modal fade alumni-modal" 
tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" id="ModalAlumniOfTheMonth">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="modal-title">New Alumni Of The Month</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=> 'admin/alumni/storeofthemonth', 'method'=>'post', 'class'=>'clearfix','id'=>'form-modal','files' => 'true']) !!}
                    <div class="form-group">
                        {!! Form::select('nama', $alumnilist,$now->id_alumni , ['class'=>'form-control','placeholder'=>'-- Pilih nama --','id'=>'nama','required'=>'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('author', $now->author, ['class'=>'form-control','placeholder'=>'Author','id'=>'author','required'=>'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('description', $now->description, ['class'=>'form-control textarea fr-view','rows'=>'35','required'=>'true','id'=>'description']) !!}
                    </div>
                    {!! Form::submit('Publish', ['class'=>'btn btn-success btn-submit pull-right']) !!}
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
        var path = "/images/alumni/"
        $('#dataTables-alumni').DataTable({
            processing : true,
            serverside : true,
            ajax : '/admin/alumni',
            columns : [
                    {data:'nama', name:'nama'},
                    {data:'sco', name:'sco'},
                    {data:'batch', name:'batch'},
                    {
                        data:'image', 
                        name:'image',
                        render: function (data, type, full, meta) {
                            return "<img src=\""+path+data+"\" height=\"50\"/>"
                        }
                    },
                    {data:'action', name:'action' ,orderable:'false', searchable:'false'}]
        })
        function removeeditdata(){
            $('.fr-placeholder').html('Type something')
            $('.fr-element').html('')
        }
        function geteditdata(self){
            var iditem = self.getAttribute('data');
            var url = 'alumni/update/'+iditem
            $.ajax({
                url:'/admin/alumni/edit/'+iditem,
                method:'GET'
            }).done(function(res){
                $('#edit-nama').val(res.data.nama)
                $('#edit-sco').val(res.data.sco)
                $('#edit-batch').val(res.data.batch)
                $('#form-edit-modal').attr('action',url)
                $('.fr-placeholder').html('')
                $('.fr-element').html(res.data.content)
                $('.preview-image').html(res.imgpreview)
            })
        }
        $('.datepicker').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function(dateText, inst) { 
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        }).focus(function () {
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
        });
    </script>
@endsection