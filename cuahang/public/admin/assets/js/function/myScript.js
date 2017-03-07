/**
 * Created by yaphe on 3/1/2017.
 */
    //jQuery(document).ready(function ($) {
    //    $("#example-2").dataTable({
    //        aLengthMenu: [
    //            [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]
    //        ]
    //    });
    //});
// Skins
jQuery(document).ready(function ($) {

    $('input.icheck-9').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    $('input.icheck-10').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
//hiển thị ảnh chính trước khi upload
    if (window.File && window.FileList && window.FileReader) {
        $("#field-4").on("change", function (e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    $("<div style='position: relative' class=\" form-group col-sm-10 pip\">" +
                        "<a id='del' style='position:absolute;right: 270px;top: 10px;' class='btn btn-icon btn-red' title='delete'><i id='del' class='fa-remove'></i></a>" +
                        "<img id='test' class=\"thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "</div>").insertAfter("#field-4");
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

//hiênr thị các ảnh phụ trước khi upload
    $('#error').delay(3000).fadeOut('slow');
    if (window.File && window.FileList && window.FileReader) {
        $("#files2").on("change", function (e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    $("<div style='position: relative' class=\" form-group pip\">" +
                        "<a id='del2' class='btn btn-icon btn-red' style='position:absolute;right: 45px;top: 10px;'><i   class='fa-remove'></i></a>" +
                        "<img class=\"thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "</div>").insertAfter("#files2");
                    $("#del2").click(function () {
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

    $('.del_btn').on('click', function () {
        var url = 'http://localhost/cuahang/admin/delImg';
        var _token = $('#_token').val();
        var idImg = $(this).parent().find('img').attr('id');
//            var img = $('.thumb').attr("src");
        var rid = $('.thumb').attr("id");
//            alert(idImg);
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            data: {'_token': _token, 'idImg': idImg},
            success: function (data) {
                if (data == 'oke') {
                    $('#' + rid).remove();
                }
            }
        });
    });
    $('.select2-search-choice-close').on('click', function () {
        var _token = $('#_token').val();
    });


});
