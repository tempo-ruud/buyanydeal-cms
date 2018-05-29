@extends('layouts.admin.app')

@section('content')

    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Product Information
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="Product Name">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="sku" value="SKU">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-5">
                                <select class="custom-select">
                                    <option value="EQUALS">Equals</option>
                                    <option value="NOT_EQUALS">Not equals</option>
                                    <option value="HAS_KEY">Has key</option>
                                    <option value="NOT_HAS_KEY">Not has key</option>
                                    <option value="HAS_VALUE">Has value</option>
                                    <option value="NOT_HAS_VALUE">Not has value</option>
                                    <option value="IS_EMPTY">Is empty</option>
                                    <option value="NOT_EMPTY">Is not empty</option>
                                    <option value="GREATER_THAN">Greater than</option>
                                    <option value="LESS_THAN" selected="">Less than</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Images
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="file-input file-input-ajax-new">
                        <div class="file-preview ">
                            <button type="button" class="close fileinput-remove" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>    <div class=" file-drop-zone"><div class="file-drop-zone-title">Drag &amp; drop files here …</div>
                                <div class="file-preview-thumbnails">
                                </div>
                                <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                                <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="kv-upload-progress kv-hidden" style="display: none;">
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input-group file-caption-main">
                            <div class="file-caption form-control kv-fileinput-caption" tabindex="500">
                                <span class="file-caption-icon"></span>
                                <input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select files...">
                            </div>
                            <div class="input-group-btn">
                                <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default btn-secondary fileinput-remove fileinput-remove-button"><i class="fa fa-trash"></i>  <span class="hidden-xs">Remove</span></button>
                                <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default btn-secondary kv-hidden fileinput-cancel fileinput-cancel-button"><i class="fa fa-ban"></i>  <span class="hidden-xs">Cancel</span></button>
                                <a href="/file-upload-batch/2" tabindex="500" title="Upload selected files" class="btn btn-default btn-secondary fileinput-upload fileinput-upload-button"><i class="fa fa-upload"></i>  <span class="hidden-xs">Upload</span></a>
                                <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i>  <span class="hidden-xs">Browse …</span><input id="input-fa" name="inputfa[]" type="file" multiple="" class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Shops
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products to shops</h3>
                            <div class="col-lg-3 ml-auto">
                                <form class="input-icon my-3 my-lg-0">
                                    <input type="search" class="form-control header-search" placeholder="Search…" tabindex="1">
                                    <div class="input-icon-addon">
                                        <i class="fe fe-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID.</th>
                                        <th>Shop</th>
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Special price</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>101</td>
                                        <td>Sprii.com</td>
                                        <td>1234567890123</td>
                                        <td>AED 200</td>
                                        <td>AED 100</td>
                                        <td><span class="status-icon bg-success"></span> Enabled</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        SEO
                    </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingTFour" data-parent="#accordion">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Page Title</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="Product Name">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keywords</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection