var confirmation = function(message, data) {
    $("#modal-warning .modal-body").html(message);

    for(var i = 0; i < data.length; i++) {
        $("#modal-warning .proceed").attr(data[i].attribute, data[i].value);
    }

    $("#modal-warning").modal("show");
};

var processing = function(action) {
    $("#modal-warning .proceed").prop("disabled",true);
    $("#modal-warning .proceed").html(action);
    $("#modal-warning button[data-dismiss='modal']").css("display","none");
};

var fail = function(message) {
    var content = '';

    if(is_json_string(message)) {
        message = JSON.parse(message);
        var properties = [];
        properties.push(Object.keys(message));

        if(properties[0][0] == "message" && message[properties[0][0]] == "The given data was invalid.") {
            content += '<p>' + message[properties[0][0]] + '</p>';

            properties.push(Object.keys(message[properties[0][1]]));

            content += '<ul>';
            for(var i = 0; i < properties[1].length; i++) {
                for(var j = 0; j < message[properties[0][1]][properties[1][i]].length; j++) {
                    content += '<li>' + message[properties[0][1]][properties[1][i]][j] + '</li>';
                }
            }
            content += '</ul>';
        } else {
            content = "Unable to connect to the server.";
        }
    } else {
        content = message;
    }

    if(content === '') {
        content = "Unable to connect to the server.";
    }

    $('#modal-error .modal-body').html(content);
    $('#modal-error').modal('show');
};

var always = function() {
    $('#modal-warning').modal('hide');
    $("#modal-warning button[data-dismiss='modal']").css("display","block");
    $("#modal-warning .proceed").html("Confirm");
    $("#modal-warning .proceed").prop("disabled",false);
};

var success = function(message, redirect) {
    $("#modal-success .modal-body").html(message);
    $("#modal-success").modal("show");

    if(redirect != "") {
        $("#modal-success .proceed").prop("disabled", true);
        $("#modal-success .proceed").html("Redirecting...");

        setTimeout(function() {
            window.location = redirect;
        },3000);
    }
};

var is_json_string = function(string) {
    try {
        JSON.parse(string);
    } catch (e) {
        return false;
    }
    return true;
};

var numberFormat = function(x, decimal) {
    x = parseFloat(x);
    var parts = x.toFixed(2).toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if(decimal) {
        return parts.join(".");
    } else {
        return parts[0];
    }
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$(document).ready(function() {

});

$(document).on("submit", "#signin-form", function(e) {
    e.preventDefault();

    $("#signin-button").prop("disabled", true);
    $("#signin-button").html("Logging In");

    var formData = new FormData($("#signin-form")[0]);

    $.ajax({
        url: $("#route-submit-login").html(),
        method: "POST",
        timeout: 30000,
        cache: false,
        contentType: false,
        processData: false,
        data: formData
    }).done(function(response) {
        if(response.error == "") {
            window.location = response.redirect;
        } else {
            fail(response.error);

            $("#signin-button").html("Login");
            $("#signin-button").prop("disabled", false);
        }
    }).fail(function(e) {
        fail(e.responseText);

        $("#signin-button").html("Login");
        $("#signin-button").prop("disabled", false);
    });
});
