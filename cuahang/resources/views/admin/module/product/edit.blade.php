@extends('admin.master')
@section('title') Admin-Sửa điện thoại @endsection
@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$data->name}}</h3>
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

                    <form role="form" action="{{route('admin.product.postEdit',$data->id)}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                        <div class="col-sm-9" style="border-right:1px  solid silver">
                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-1">Tên điện thoại</label>

                                <div class="col-sm-10">
                                    <input type="text" @if(old('name')) value="{{old('name')}}"
                                           @else value="{{$data->name}}" @endif class="form-control" name="name"
                                           id="field-1"
                                           placeholder="Tên điện thoại">
                                    @if($errors->has('name'))
                                        <p style="color: red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-4">Ảnh hiện tại</label>

                                <div class="col-sm-10">

                                    <img style="height: 200px;width: 200px"
                                         src="{{url('resources/upload/'.$data->image)}}"/>
                                </div>
                            </div>

                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-4">Ảnh mới</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control file" name="image" id="field-4">
                                    @if($errors->has('image'))
                                        <p style="color: red">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group-separator "></div>

                            <div class="form-group ">
                                <label class="col-sm-2 control-label" for="field-5">Loại sản phẩm</label>



                                <div class="col-sm-10">
                                    <select class="form-control select2-offscreen" id="s2example-1" name="group"
                                            tabindex="-1" title="">
                                        <option></option>
                                        @foreach($group as $gr)
                                            @if(old('group')==$gr->id)
                                                <option value="{{$gr->id}}" selected>{{$gr->name}}</option>
                                            @else
                                                <option @if($data->group_id==$gr->id) selected="selected"
                                                        @endif value="{{$gr->id}}">{{$gr->name}}</option>
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
                                @foreach($colorProduct as $cp)
                                    {{$cp}}
                                    @endforeach
                                <label class="col-sm-2 control-label" for="s2example-2">Chọn màu sắc</label>
                                <div class="col-sm-10 control-label">
                                    <select class="form-control select2-offscreen" id="s2example-2" name="color[]"
                                            multiple="" tabindex="-1">
                                        {{--<option>@foreach($colorProduct as $cp) @endforeach</option>--}}
                                        @foreach($color as $cl)

                                            <option @foreach($colorProduct as $cp)
                                                    @if($cp->color_id==$cl->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    value="{{$cl->id}}">{{$cl->color}}
                                            </option>
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
                                           @if(old('price'))  value="{{old('price')}}" @else value="{{$data->price}}"
                                           @endif placeholder="Giá" data-dec="," data-rad="."
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
                                                   @if($data->status==1) checked @endif
                                                   name="status">
                                            <label for="minimal-radio-1-9">Đang hoạt động</label>
                                        </li>
                                        <li>
                                            <input tabindex="8" class="icheck-9" type="radio" value="0"
                                                   @if($data->status==0) checked @endif
                                                   id="minimal-radio-2-10"
                                                   name="status">
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
                                                   @if($data->hot==1) checked @endif
                                                   name="hot">
                                            <label for="minimal-radio-1-11">Có</label>
                                        </li>
                                        <li>
                                            <input tabindex="8" class="icheck-10" type="radio" id="minimal-radio-2-12"
                                                   @if($data->hot==0) checked @endif
                                                   value="0"
                                                   name="hot">
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
                                      rows="10">@if(old('content')) {{old('content')}} @else {{$data->content}} @endif</textarea>
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
                                        <button class="btn btn-secondary btn-single"><i class="fa-check"></i>Thêm mới
                                        </button>
                                        <button class="btn btn-secondary btn-single">Hủy bỏ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="file" id="files2" name="img_detail[]" multiple/>
                            @foreach($images as $img)
                                <div style="position: relative" class="form-group " id="{{$img->id}}">
                                    <img id="{{$img->id}}" class="thumb"
                                         src="{{url('resources/upload/img_detail/'.$img->name)}}">
                                    <a href="javascript:void(0)" id="" class="btn btn-icon btn-red del_btn"
                                       title="delete"
                                       style=" ;position: absolute;top: 10px;right: 45px">
                                        <i id="del" class="fa-remove"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

@endsection