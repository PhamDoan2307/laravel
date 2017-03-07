@extends('admin.master')
@section('title') Group Product-Sửa sản phẩm @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sửa sản phẩm</h3>
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

                    <form role="form" action="{{route('admin.groupproduct.postEdit',$data->id)}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Tên danh mục</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="field-1"
                                       placeholder="Tên danh mục" value="{{$data->name}}">
                                @if($errors->has('name'))
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">Thông tin mô tả</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="describe" cols="5"
                                          id="field-5">{{$data->describe}}</textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">Chọn công ty</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $("#s2example-1").select2({
                                        placeholder: 'Chọn công ty...',
                                        allowClear: true
                                    }).on('select2-open', function () {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>
                            <div class="col-sm-10">
                                <select class="form-control select2-offscreen" id="s2example-1" name="company" tabindex="-1" title="">
                                    <option></option>
                                    @foreach( $company as $cp)
                                        <option @if($data->company_id==$cp->id) selected="selected" @endif value="{{$cp->id}}">{{$cp->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('company'))
                                    <p style="color: red">{{ $errors->first('company') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">Ảnh hiện tại</label>

                            <div class="col-sm-10">
                                <img src="{{url($path.$data->image)}}">
                                <input type="hidden" name="img_current" value="{{$data->image}}">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">Chọn ảnh mới</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image1" id="field-4">
                                @if($errors->has('image1'))
                                    <p style="color: red">{{ $errors->first('image1') }}</p>
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
                                    <a href="{{route('admin.groupproduct.getList')}}">
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