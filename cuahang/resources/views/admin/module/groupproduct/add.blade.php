@extends('admin.master')
@section('title') Group Product-Thêm mới @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm mới danh mục</h3>
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

                    <form role="form" action="{{route('admin.groupproduct.postAdd')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">Tên danh mục</label>

                            <div class="col-sm-10">
                                <input type="text" value="{{old('name')}}" class="form-control" name="name" id="field-1"
                                       placeholder="Tên danh mục">
                                @if($errors->has('name'))
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">Thông tin mô tả</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="describe" cols="5" id="field-5"></textarea>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">Ảnh mô tả</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="field-4">
                                @if($errors->has('image'))
                                    <p style="color: red">{{ $errors->first('image') }}</p>
                                @endif
                               <img id="preview" src=""   />
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
                                    @foreach( $data as $dt)
                                    <option value="{{$dt->id}}">{{$dt->name}}</option>
                                        @endforeach
                                </select>
                                @if($errors->has('company'))
                                    <p style="color: red">{{ $errors->first('company') }}</p>
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
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-2 control-label">Trạng thái</label>--}}

                            {{--<div class="col-sm-10">--}}
                                {{--<div class="radio">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="status1[]" value="Xanh">Xanh--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="radio">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="status1[]" value="Đỏ" >Đỏ--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<input type="text" name="status2" value="10">--}}
                        {{--</div>--}}
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
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#field-4").change(function(){
            readURL(this);
            $('#preview').css({'width':'200px','height':'200px'});
        });
    </script>
@endsection