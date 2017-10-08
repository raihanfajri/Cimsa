@extends('layouts/adminlayout')
@section('content')
<div id="wrapper">
    <div id="page-wrapper" style="height: 100%;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Messages Inbox</h1>
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
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-bordered" id="dataTables-messages">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-Mail</th>
                                        <th>Message</th>
                                        <th>Date</th>
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
@endsection
@section('script')
    <script>
        $('#dataTables-messages').DataTable({
            processing : true,
            serverside : true,
            ajax : '/admin/message',
            columns : [
                    {data:'name', name:'name'},
                    {data:'email', name:'email'},
                    {data:'messagecontent', name:'messagecontent'},
                    {data:'updated_at', name:'updated_at'},
                    {data:'action', name:'action' ,orderable:'false', searchable:'false'}]
        })
    </script>
@endsection