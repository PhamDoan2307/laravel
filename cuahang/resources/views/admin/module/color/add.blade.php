@extends('admin.master')
@section('title') Group Product-Thêm mới @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm mới Màu sắc</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">–</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            ×
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" action="{{route('admin.color.postAdd')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Tên màu</label>

                            <div class="col-sm-10">
                                <input type="text" value="{{old('color')}}" class="form-control" name="color"
                                       id="field-1"
                                       placeholder="Tên màu">
                                @if($errors->has('color'))
                                    <p style="color: red">{{ $errors->first('color') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">Chọn giá tiền</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $("#s2example-1").select2({
                                        placeholder: 'Chọn giá tiền...',
                                        allowClear: true
                                    }).on('select2-open', function () {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>
                            <div class="col-sm-10">
                                <select class="form-control select2-offscreen" id="s2example-1" name="price" tabindex="-1" title="">
                                    <option></option>
                                    <option value=200000">200.000 VNĐ</option>
                                    <option  value="400000">400.000 VNĐ</option>
                                    <option value="600000">600.000 VNĐ</option>
                                    <option value="800000">800.000 VNĐ</option>
                                    <option value="0">0</option>
                                </select>
                                @if($errors->has('price'))
                                    <p style="color: red">{{ $errors->first('price') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Trạng thái</label>

                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="0">
                                        Ngừng hoạt động
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="1" checked="">
                                        Đang hoạt động
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="button">
                                    <button class="btn btn-secondary btn-single">Thêm mới</button>
                                    <button class="btn btn-secondary btn-single">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection