@extends('admin.master')
@section('content')
<div>
    <button id="test" value="hi">Hi</button>
    <input type="text" name="hi" value="4" id="hi">
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
    <input type="text" id="he">
    <div class="hihi"></div>
</div>
<script>
        $(document).ready(function () {
            $('#test').on('click', function () {
                var hi = $('#hi').val();
                var _token=$('#token').val();
                $.ajax({
                    type: 'post',
                    url: 'delImg',
                    data: {'id1': hi,'_token':_token},
                    success: function (data) {
                        $('.hihi').append(data) ;
                    }
                });
            });
        });
//    $(document).ready(function () {
//        $('#test').on('click', function () {
//            alert('hi');
//        });
//    });
</script>
@endsection