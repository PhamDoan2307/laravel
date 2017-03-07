@extends('admin.master')
@section('title') Company-Thêm mới @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm mới công ty</h3>
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

                    <form role="form" action="{{route('admin.company.postAdd')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Tên công ty</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                       id="field-1"
                                       placeholder="Tên công ty">
                                @if($errors->has('name'))
                                    <p class="error" style="color: red">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">Địa chỉ</label>

                            <div class="col-sm-10">
                                <input type="text" value="{{old('address')}}" class="form-control" name="address"
                                       id="field-2"
                                       placeholder="Địa chỉ">
                                @if($errors->has('address'))
                                    <p class="error" style="color: red">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">Số điện thoại</label>

                            <div class="col-sm-10">
                                <input type="text" value="{{old('tel')}}" class="form-control" name="tel"
                                       id="field-3"
                                       placeholder="Số điện thoại">
                                @if($errors->has('tel'))
                                    <p class="error" style="color: red">{{ $errors->first('tel') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">Fax</label>

                                <div class="col-sm-10">
                                    <input type="text" value="{{old('fax')}}" class="form-control" name="fax"
                                           id="field-4"
                                           placeholder="fax">
                                    @if($errors->has('fax'))
                                        <p class="error" style="color: red">{{ $errors->first('fax') }}</p>
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