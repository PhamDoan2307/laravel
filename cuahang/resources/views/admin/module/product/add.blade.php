@extends('admin.master')
@section('title') Admin-Thêm mới điện thoại @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm mới điện thoại</h3>
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

                    <form role="form" action="{{route('admin.product.postAdd')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="col-sm-9">
                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-1">Tên điện thoại</label>

                                <div class="col-sm-10">
                                    <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                           id="field-1"
                                           placeholder="Tên điện thoại">
                                    @if($errors->has('name'))
                                        <p style="color: red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-4">Ảnh mô tả</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control file" name="image" id="field-4">
                                    @if($errors->has('image'))
                                        <p style="color: red">{{ $errors->first('image') }}</p>
                                    @endif
                                    <img id="preview" src=""/>
                                </div>

                            </div>
                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-5">Loại sản phẩm</label>

                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#s2example-1").select2({
                                            placeholder: 'Chọn loại điện thoại...',
                                            allowClear: true
                                        }).on('select2-open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                        });

                                    });
                                </script>
                                <div class="col-sm-10">
                                    <select class="form-control select2-offscreen" id="s2example-1" name="group"
                                            tabindex="-1" title="">
                                        <option></option>
                                        @foreach($data as $dt)
                                            @if(old('group')==$dt->id)
                                                <option value="{{$dt->id}}" selected>{{$dt->name}}</option>
                                            @else
                                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('group'))
                                        <p style="color: red">{{ $errors->first('group') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#s2example-2").select2({
                                            placeholder: 'Chọn các loại màu sắc',
                                            allowClear: true
                                        }).on('select2-open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                        });

                                    });
                                </script>
                                <label class="col-sm-2 control-label" for="s2example-2">Chọn màu sắc</label>
                                <div class="col-sm-10 control-label">
                                    <select class="form-control select2-offscreen" id="s2example-2" name="color[]"
                                            multiple="" tabindex="-1">
                                        <option></option>
                                        @foreach($color as $cl)
                                            <option value="{{$cl->id}}">{{$cl->color}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('color'))
                                        <p style="color: red">{{ $errors->first('color') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label">Giá tiền</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price" data-mask="fdecimal"
                                           value="{{old('price')}}" placeholder="Giá" data-dec="," data-rad="."
                                           maxlength="10">
                                    @if($errors->has('price'))
                                        <p style="color: red">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group-separator "></div>
                            <div class="form-group ">
                                <label class="col-sm-2 control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <ul class="icheck-list">
                                        <li>
                                            <input class="icheck-9" type="radio" id="minimal-radio-1-9" value="1"
                                                   name="status">
                                            <label for="minimal-radio-1-9">Đang hoạt động</label>
                                        </li>
                                        <li>
                                            <input tabindex="8" class="icheck-9" type="radio" value="0"
                                                   id="minimal-radio-2-10"
                                                   name="status" checked>
                                            <label for="minimal-radio-2-10">Ngưng hoạt động</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group-separator "></div>
                            <div class="form-group ">
                                <label class="col-sm-2 control-label">Hot</label>

                                <div class="col-sm-10">
                                    <ul class="icheck-list">
                                        <li>
                                            <input class="icheck-10" type="radio" id="minimal-radio-1-11" value="1"
                                                   name="hot">
                                            <label for="minimal-radio-1-11">Có</label>
                                        </li>
                                        <li>
                                            <input tabindex="8" class="icheck-10" type="radio" id="minimal-radio-2-12"
                                                   value="0"
                                                   name="hot" checked>
                                            <label for="minimal-radio-2-12">Không</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class=" control-label col-sm-2" for="content">Thông tin</label>
                                <div class="col-sm-10">
                            <textarea class="form-control ckeditor" id="content" name="content"
                                      rows="10">{{old('content')}}</textarea>
                                @if($errors->has('content'))
                                    <p style="color:red">{{$errors->first('content')}}</p>
                                @endif
                                </div>
                            </div>
                            <div class="form-group-separator"></div>
                            <div class="form-group ">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="button">
                                        <button class="btn btn-secondary btn-single">Thêm mới</button>
                                        <button class="btn btn-secondary btn-single">Hủy bỏ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="file" id="files" name="img_detail[]" multiple />
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    if (window.File && window.FileList && window.FileReader) {
                                        $("#files").on("change", function (e) {
                                            var files = e.target.files,
                                                    filesLength = files.length;
                                            for (var i = 0; i < filesLength; i++) {
                                                var f = files[i];
                                                var fileReader = new FileReader();
                                                fileReader.onload = (function (e) {
                                                    var file = e.target;
                                                    $("<div style='position: relative' class=\" form-group pip\">" +
                                                            "<i id='del' style='position:absolute;right: 40px' class='el-cancel'></i>" +
                                                            "<img class=\"thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                                            "</div>").insertAfter("#files");
                                                    $("#del").click(function () {
                                                        $(this).parent(".pip").remove();
                                                    });

                                                    // Old code here
                                                    /*$("<img></img>", {
                                                     class: "imageThumb",
                                                     src: e.target.result,
                                                     title: file.name + " | Click to remove"
                                                     }).insertAfter("#files").click(function(){$(this).remove();});*/

                                                });
                                                fileReader.readAsDataURL(f);
                                            }
                                        });
                                    } else {
                                        alert("Your browser doesn't support to File API")
                                    }
                                });

                            </script>
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

        $("#field-4").change(function () {
            readURL(this);
            $('#preview').css({'width': '200px', 'height': '200px'});
        });
    </script>
    <script>
        jQuery(document).ready(function ($) {
            // Skins

            $('input.icheck-9').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            $('input.icheck-10').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
        });
    </script>
@endsection