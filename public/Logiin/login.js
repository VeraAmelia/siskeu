sessionStorage.clear();

$(".btn-refresh").click(function() {
    $.ajax({
        type: 'GET',
        url: '/reload-captcha',
        success: function(data) {
            $(".captcha span").html(data.captcha);
        }
    });
});

$(function(){
    $('#reload_captcha').click(function(){
        $(this).addClass('fa-spin');
        $.ajax({
          type: "GET",
          url: 'auth/captcha',
          dataType:'JSON',
          success: function(msg) {
            $('#reload_captcha').removeClass('fa-spin');
            $('#captcha').html(msg.img);
          }
      })
    })

    $('#myform').on('submit', function () {
        var user = $("#user").val();
        var pass = $('#password').val();
        if (user != "" && pass) {
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(), // serializes the form's elements.
                dataType: 'JSON', // serializes the form's elements.
                beforeSend: function () {
                    $('#login').prop('disabled', true);
                    $('#login').html('<i class="fa fa-spin fa-cog">&nbsp;&nbsp;</i>Loading...');
                },
                success: function (data) {
                    $('#login').html('LOGIN');
                    ////////////////

                    ////////////////
                    if (data.type == "success") {
                        // sessionStorage.setItem("login", "true");
                        $('#login').html('<i class="fa fa-spin fa-cog fa-2x"></i>&nbsp;&nbsp;Loading...');
                        $('#info').html('<div class="alert alert-success" role="alert">' + data.text + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>');
                        $('#info').slideDown();
                        setTimeout(function () {
                            window.location.href = data.url;
                        }, 2000);
                    } else {
                        $('#info').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + data.text + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        $('#info').slideDown();
                        setTimeout(function () {
                            $('.alert').alert('close')
                        }, 5000);
                        $('#login').prop('disabled', false);
                        $.ajax({
                            type: "GET",
                            url: 'auth/captcha',
                            dataType: 'JSON',
                            success: function (msg) {
                                $('#reload_captcha').removeClass('fa-spin');
                                $('#captcha').html(msg.img);
                            }
                        });


                    }
                }
            });

        } else {
            $('#info').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Username / Password Salah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $('#info').slideDown();
            setTimeout(function () {
                $('.alert').alert('close')
            }, 2000);
        }
        return false;
    });
});