@extends('admin.master')
@section('title')Group Product List @endsection
@section('content')
    {{--<div class="col-sm-12">--}}
    @if(session()->has('success'))
        {{ session('status') }}
    @endif
    {{--</div>--}}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Basic Setup</h3>
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

            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $("#example-1").dataTable({
                        aLengthMenu: [
                            [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>

            <div id="example-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="example-1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%"
                       role="grid" aria-describedby="example-1_info" style="width: 100%;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Name: activate to sort column ascending"
                            style="width: 150px;">Tên danh mục
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 150px;">Ảnh mô tả
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 150px;">Hãng sản xuất
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 300px;">Thông tin-mô tả
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 150px;">Ngày tạo
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 50px;">Sửa
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending" style="width: 50px;">Xóa
                        </th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Tên danh mục</th>
                        <th rowspan="1" colspan="1">Ảnh mô tả</th>
                        <th rowspan="1" colspan="1">Thông tin-mô tả</th>
                        <th rowspan="1" colspan="1">Thông tin-mô tả</th>
                        <th rowspan="1" colspan="1">Ngày tạo</th>
                        <th rowspan="1" colspan="1">Sửa</th>
                        <th rowspan="1" colspan="1">Xóa</th>
                    </tr>
                    </tfoot>

                    <tbody>


                    @foreach($data as $dt)
                        <tr role="row" class="odd">
                            <td><strong><a href=""> {{ $dt->name }}</a></strong></td>
                            <td><img style="width: 100px;height: 100px" src="{{url($path.$dt->image)}}">
                            </td>
                            <td>{{ $dt->company->name }}</td>
                            <td>{{ $dt->describe }}</td>
                            <td>{{ changeDate($dt->created_at) }}</td>
                            <td><a href="{{route('admin.groupproduct.getEdit',$dt->id)}}" style="color: red">Sửa</a>
                            </td>
                            <td><a href="" style="color: blue">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--<div class="container">--}}
                {{--@foreach ($data as $ds)--}}
                    {{--{{ $ds->name }}--}}
                {{--@endforeach--}}
            {{--</div>--}}

            {{--{{ $data->links() }}--}}
        </div>
    </div>
@endsection