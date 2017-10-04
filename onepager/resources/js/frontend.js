$(document).ready(function () {
    moment.locale();
    $('.datetimepicker').datetimepicker({
        locale: 'ru',
        format: 'L'
    });
    $('.phone').mask('+7(000)000-0000', {placeholder: "+7(000)000-00000"});

    $("#success").hide();

    $("#sendQuery").click(function () {
        var data = {}, formArray = $('#query_request').serializeArray();
        for (var index in formArray) {
            data[formArray[index].name] = formArray[index].value;
        }
        console.log(data);
        var hasError = false;
        if (typeof data.name == typeof undefined || data.name.length < 2) {
            $("#query_request input[name='name']").parent().parent().addClass("has-error");
            hasError = true;
            showError();
        }
        if (typeof data.dt_born == typeof undefined || data.dt_born.length < 2) {
            $("#query_request input[name='dt_born']").parent().parent().addClass("has-error");
            hasError = true;
            showError();
        }
        if (typeof data.place_born == typeof undefined || data.place_born.length < 2) {
            $("#query_request input[name='place_born']").parent().parent().addClass("has-error");
            hasError = true;
            showError();
        }
        if (typeof data.phone == typeof undefined || data.phone.length < 2) {
            $("#query_request input[name='phone']").parent().parent().addClass("has-error");
            hasError = true;
            showError();
        }
        if (typeof data.email == typeof undefined || data.email.length < 2) {
            $("#query_request input[name='email']").parent().parent().addClass("has-error");
            hasError = true;
            showError();
        }

        if (!$("#query_request input[name='apply_check']:checked").length) {
            hasError = true;
            $("#query_request input[name='apply_check']").parent().parent().parent().addClass("has-error");
        }

        if (!hasError) {
            $.ajax({
                type: "POST",
                url: '/sendRequest',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': data._token
                },
                success: function () {
                    $("#success").show();
                }
            });
        }
    });

    hideError();

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });
});
var timer;
function showError() {
    $("#error").show();
    if (timer) {
        clearTimeout(timer);
    }
    timer = setTimeout(function () {
        hideError();
    }, 5000);
}

function hideError() {
    $("#query_request .has-error").removeClass("has-error");
    $("#error").hide();
}