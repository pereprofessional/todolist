$(document).ready(function(){
    $('form.auth_user').submit(function(e){
        e.preventDefault();

        var form_data = {
            username: $(this).find("input[name=username]").val(),
            password: $(this).find("input[name=password]").val()
        };

        $('.auth-error').html('');

        $.ajax({
            type: "POST",
            url: "auth",
            data: form_data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            //console.log(data);
            if (data['status'] == 'success') {
                document.cookie = "token="+data['token']+";";
                location.reload();
            } else if (data['status'] == 'fail') {
                if (data['message'] == 'invalid_data') {
                    $('.auth-error').html('Ошибка авторизации');
                } else if (data['message'] == 'wrong_username_or_password') {
                    $('.auth-error').html('Неверный логин или пароль');
                }
            }
        });
    });

    $('.action-logout').click(function(){
        document.cookie = "token=";
        location.reload();
    });

    $('.task-makedone').click(function(){
        var form_data = {
            task_id: $(this).attr('id')
        };

        $.ajax({
            type: "POST",
            url: "list",
            data: form_data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (data['status'] == 'success') {
                location.reload();
            } else if (data['status'] == 'fail') {
                if (data['message'] == 'invalid_data') {
                    $('.add-task-form-error').html('Данные некорректны');
                } else if (data['message'] == 'no_login') {
                    $('.add-task-form-error').html('Вы не авторизированы');
                }
            }
        });
    });


    $('.add-task').click(function(){
        $('.popup-editor').show();
        $('.add-task-form').show();
        $('.edit-task-form').hide();
        $('body,html').css('overflow', 'hidden');
    });

    $('.task-edit').click(function(){
        $('.popup-editor').show();
        $('.edit-task-form').show();
        $('.add-task-form').hide();
        $('body,html').css('overflow', 'hidden');

        var task_text = $(this).parent().parent().find('.cell-text span').html();
        var task_id = $(this).attr('id');

        $('form.edit-task-form textarea[name=text]').val(task_text);
        $('.edit-task-form input[name=id]').val(task_id);
    });

    $('.popup-editor .bg').click(function(){
        $('.popup-editor').hide();
        $('body,html').css('overflow', 'auto');
    });

    $('form.add-task-form').submit(function(e){
        e.preventDefault();

        var form_data = {
            username: $(this).find("input[name=username]").val(),
            email: $(this).find("input[name=email]").val(),
            text: $(this).find("textarea[name=text]").val()
        };

        //console.log(form_data);

        $('.add-task-form-error').html('');

        $.ajax({
            type: "POST",
            url: "list",
            data: form_data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (data['status'] == 'success') {
                window.location.href = "/todo";
            } else if (data['status'] == 'fail') {
                if (data['message'] == 'invalid_data') {
                    $('.add-task-form-error').html('Данные некорректны');
                } else if (data['message'] == 'no_login') {
                    $('.add-task-form-error').html('Вы не авторизированы');
                }
            }
        });
    });


    $('form.edit-task-form').submit(function(e){
        e.preventDefault();

        var form_data = {
            id: $(this).find("input[name=id]").val(),
            text: $(this).find("textarea[name=text]").val()
        };

        console.log(form_data);

        $('.edit-task-form-error').html('');


        $.ajax({
            type: "POST",
            url: "list",
            data: form_data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (data['status'] == 'success') {
                location.reload();
            } else if (data['status'] == 'fail') {
                if (data['message'] == 'invalid_data') {
                    $('.edit-task-form-error').html('Данные некорректны');
                } else if (data['message'] == 'no_login') {
                    $('.edit-task-form-error').html('Вы не авторизированы');
                }
            }
        });
    });



});