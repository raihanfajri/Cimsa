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
                            <table width="100%" class="table table-bordered" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                        <td>
                                            Kalender CIMSA 2017
                                        </td>
                                        <td>
                                            Rp. 25.000
                                        </td>
                                        <td>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </td>
                                        <td>
                                            <a href="{{asset('img/john.png')}}" data-fancybox data-caption="My caption">
                                                <img src="{{asset('img/john.png')}}" 
                                                alt="Catalog Image" width="40%" height="60px">
                                            </a>
                                        </td>
                                        <td>
                                            <a>
                                                <i class="fa fa-pencil-square-o fa-lg" 
                                                 data-toggle="modal" data-target=".edit-modal" aria-hidden="true"></i>
                                            </a>
                                            <a href="">
                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                   </tr>
                                </tbody>
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

    <div class="modal fade post-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static"
        <div class="modal-dialog modal-lg" role="document">
        id="myModal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title">New Product</h4>
                </div>
                <div class="modal-body">
                    <form class="clearfix" id="form-modal" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control fr-view" 
                            class="textarea" name="content" rows="15" required id="description">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="input">Upload image</label>
                            <div class="file-loading">
                                <input class="upload-image" name="inputfreqd[]" type="file" accept="image/*">
                            </div>
                            <small class="text-muted">Allowed file extensions: .jpg/.png/.gif </small>
                        </div>
                        <button type="submit" class="btn btn-success btn-submit pull-right" id="submit">Publish</button>
                    </form>
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
                    <form class="clearfix" id="form-modal" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control fr-view" class="textarea" name="content" rows="15" required id="description">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="input">Upload image</label>
                            <div class="file-loading">
                                <input class="upload-image" name="inputfreqd[]" type="file" accept="image/*">
                            </div>
                            <small class="text-muted">Allowed file extensions: .jpg/.png/.gif </small>
                        </div>
                        <button type="submit" class="btn btn-success btn-submit pull-right" id="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection