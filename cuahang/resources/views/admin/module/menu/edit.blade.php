@extends('admin.master')
@section('title') Color-Edit @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sửa</h3>
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

                    <form role="form" action="{{route('admin.color.postEdit',$data->id)}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Tên danh mục</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="color" id="field-1"
                                       placeholder="Tên danh mục" value="{{$data->color}}">
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
                                    <option @if($data->price==200000) {{'selected="selected"'}} @endif value="200000">200.000 VNĐ</option>
                                    <option @if($data->price==400000) {{'selected="selected"'}} @endif value="400000">400.000 VNĐ</option>
                                    <option @if($data->price==600000) {{'selected="selected"'}} @endif value="600000">600.000 VNĐ</option>
                                    <option @if($data->price==800000) {{'selected="selected"'}} @endif value="800000">800.000 VNĐ</option>
                                    <option @if($data->price==0) {{'selected="selected"'}} @endif value="0">0 VNĐ</option>
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
                                        <input type="radio" name="status"
                                               @if($data->status==0) {{ 'checked="checked"' }} @endif value="0">
                                        Ngừng hoạt động
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status"
                                               @if($data->status==1) {{ 'checked="checked"' }} @endif value="1">
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
                                    <button class="btn btn-secondary btn-single">Sửa</button>
                                    <a href="{{route('admin.color.getList')}}">
                                        <button class="btn btn-secondary btn-single">Trở lại</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection