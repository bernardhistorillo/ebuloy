var uploader = $('<input type="file" accept="image/*" />');

var cover_photo_uploader = $('<input type="file" accept="image/*" />');

var animateCSS = function(element, animationName, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }

    node.addEventListener('animationend', handleAnimationEnd)
};

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
    $("#loading").removeClass("active");
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
    history.pushState("", document.title, window.location.pathname);
});

uploader.on("change", function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        var img = new Image();

        img.onload = function() {
            $("#upload-photo, #deceased-photo").css("background-image", "url('" + img.src + "')");
            $("#upload-photo").addClass("active");
        };

        img.src = event.target.result;
    };
    reader.readAsDataURL(uploader[0].files[0])
});

cover_photo_uploader.on("change", function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        var img = new Image();

        img.onload = function() {
            $("#upload-cover-photo, #cover-photo").css("background-image", "url('" + img.src + "')");
            $("#upload-cover-photo").addClass("active");
        };

        img.src = event.target.result;
    };
    reader.readAsDataURL(cover_photo_uploader[0].files[0])
});

$(window).bind("hashchange", function(e) {
    var get_hash = function(link) {
        var hash = link.split("#");
        hash = (hash.length == 1) ? "home" : hash[1];
        hash = (hash == "") ? "home" : hash;

        var order = $(".page[data-name='" + hash + "']").data("order");

        var page = {
            name: hash,
            order: order,
        };

        return page;
    };

    var remove_overlay = function() {
        if (old_page_is_not_animating && new_page_is_not_animating) {
            $("#overlay").removeClass("active");
        }
    };

    var old_page_is_not_animating = false;
    var new_page_is_not_animating = false;

    var old_page = get_hash(e.originalEvent.oldURL);
    var new_page = get_hash(e.originalEvent.newURL);

    var old_page_element = ".page[data-name='" + old_page.name + "']";
    var new_page_element = ".page[data-name='" + new_page.name + "']";

    var old_page_animation = (new_page.order > old_page.order) ? "slideOutLeft" : "slideOutRight";
    var new_page_animation = (new_page.order > old_page.order) ? "slideInRight" : "slideInLeft";

    $("#overlay").addClass("active");

    animateCSS(old_page_element, old_page_animation, function () {
        old_page_is_not_animating = true;
        $(old_page_element).addClass("cached");

        remove_overlay();
    });

    animateCSS(new_page_element, new_page_animation, function () {
        new_page_is_not_animating = true;

        remove_overlay();
    });
    $(new_page_element).removeClass("cached");
});

$(document).on("click", ".go-back", function() {
    window.history.back();
});

$(document).on("submit", "#signup-form", function(e) {
    e.preventDefault();

    $("#loading").addClass("active");

    $("#signup-form input:disabled").addClass("disabled");
    $("#signup-form input:disabled").prop("disabled", false);

    var formData = new FormData($("#signup-form")[0]);

    $("#signup-form input.disabled").prop("disabled", true);
    $("#signup-form input.disabled").removeClass("disabled");

    $.ajax({
        url: $("#route-signup-submit-form").html(),
        method: "POST",
        timeout: 30000,
        cache: false,
        contentType: false,
        processData: false,
        data: formData
    }).done(function(response) {
        if(response.error == "") {
            window.location = $("#route-dashboard").html();
        } else {
            fail(response.error);
        }
    }).fail(function(e) {
        fail(e.responseText);
    }).always(always);
});

$(document).on("submit", "#signin-form", function(e) {
    e.preventDefault();

    $("#loading").addClass("active");

    var formData = new FormData($("#signin-form")[0]);

    $.ajax({
        url: $("#route-signin-submit-form").html(),
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
        }
    }).fail(function(e) {
        fail(e.responseText);
    }).always(always);
});

$(document).on("click", '#upload-photo', function() {
    $("#upload-photo").removeClass("active");
    $("#upload-photo, #deceased-photo").css("background-image", "initial");
    uploader.val('');

    uploader.click();
});

$(document).on("click", '#upload-cover-photo', function() {
    $("#upload-cover-photo").removeClass("active");
    $("#upload-cover-photo, #cover-photo").css("background-image", "initial");
    cover_photo_uploader.val('');

    cover_photo_uploader.click();
});

$(document).on("click", ".create-campaign", function() {
    $("#loading").addClass("active");

    let is_draft = $(this).data("is-draft");

    var formData = new FormData($("#create-campaign-form")[0]);
    formData.append('is_draft', is_draft);
    formData.append('image', (uploader[0].files[0] == undefined) ? '' : uploader[0].files[0]);
    formData.append('cover_photo', (cover_photo_uploader[0].files[0] == undefined) ? '' : cover_photo_uploader[0].files[0]);

    let search_filters = [];
    $(".filter-pills.active").each(function() {
        search_filters.push($(this).data("id"));
    });
    formData.append('search_filters', JSON.stringify(search_filters));

    $.ajax({
        url: $("#route-create-campaign-submit").html(),
        method: "POST",
        timeout: 30000,
        cache: false,
        contentType: false,
        processData: false,
        data: formData
    }).done(function(response) {
        if(response.error == "") {
            if(is_draft) {
                window.location = response.route;
            } else {
                $("#create-campaign-form input, #create-campaign-form textarea").val('');

                $("#upload-photo").removeClass("active");
                $("#upload-photo, #deceased-photo").css("background-image", "initial");
                uploader.val('');

                $("#upload-cover-photo").removeClass("active");
                $("#upload-cover-photo, #cover-photo").css("background-image", "initial");
                cover_photo_uploader.val('');

                window.location = "#page-5";
            }
        } else {
            fail(response.error);
        }
    }).fail(function(e) {
        fail(e.responseText);
    }).always(always);
});

$(document).on("click", "#preview-campaign", function() {
    let first_name = (($("input[name='first_name']").val()) ? $("input[name='first_name']").val() : "Juan");
    let last_name = (($("input[name='last_name']").val()) ? $("input[name='last_name']").val() : "Dela Cruz");

    let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    let born = "Nov 1, 1945";
    if($("input[name='date_of_birth']").val()) {
        let date = new Date($("input[name='date_of_birth']").val());
        born = months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
    }

    let died = "Nov 2, 2019";
    if($("input[name='date_of_death']").val()) {
        let date = new Date($("input[name='date_of_death']").val());
        died = months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
    }

    let funeral = ($("input[name='funeral']").val()) ? $("input[name='funeral']").val() : "St. Peters";
    let street = ($("input[name='street']").val()) ? $("input[name='street']").val() : "123 Street";
    let city = ($("input[name='city']").val()) ? $("input[name='city']").val() : "Legazpi City";
    let province = ($("input[name='province']").val()) ? $("input[name='province']").val() : "Albay";
    let postal_code = ($("input[name='postal_code']").val()) ? $("input[name='postal_code']").val() : "4500";
    let story = ($("textarea[name='story']").val()) ? $("textarea[name='story']").val() : $("#story").data("dummy");;

    $("#name").html(first_name + " " + last_name);
    $("#born").html(born);
    $("#died").html(died);
    $("#funeral").html(funeral);
    $("#address").html(street + ", " + city + ", " + province + ", " + postal_code);
    $("#story").html(story);
});

$(document).on("click", ".nav-link-search-campaign", function() {
    if($(this).attr("href") == "#nav-campaigns") {
        $(".nav-link[href='#nav-search']").removeClass("active");
    } else {
        $(".nav-link[href='#nav-campaigns']").removeClass("active");
    }
});

$(document).on("click", ".filter-pills", function() {
    if($(this).hasClass("active")) {
        $(this).removeClass("active");
    } else {
        $(this).addClass("active");
    }
});

$(document).on("click", "#search-campaign", function() {
    let search_string = $("input[name='search_value']").val().toLowerCase();
    let search_filters = [];
    let search_location = $("select[name='location']").val();

    let search_filters_string = '';

    $(".filter-pills.active").each(function() {
        search_filters.push($(this).data("id"));
        search_filters_string += $(this).find(".filter-name").html() + ", ";
    });

    search_filters_string = search_filters_string.substr(0, search_filters_string.length - 2);

    let search_with_string = function() {
        if(search_string != "") {
            $(".deceased-item-container").each(function() {
                let name = $(this).find(".name").html().toLowerCase();

                if(!name.includes(search_string)) {
                    $(this).addClass("d-none");
                }
            });

            $("#searched-string-value").html("'" + search_string + "'");
            $("#searched-string-label").removeClass("d-none");
        }
    };

    let search_with_location = function() {
        if(search_location != "") {
            $(".deceased-item-container").each(function() {
                let location = $(this).find(".location").html().toLowerCase();

                if(search_location.toLowerCase() != location) {
                    $(this).addClass("d-none");
                }
            });

            $("#searched-location-value").html(search_location);
            $("#searched-location-label").removeClass("d-none");
        }
    };

    let search_with_filters = function() {
        if(search_filters.length > 0) {
            $(".deceased-item-container:not(.d-none)").each(function() {
                let campaign_filters = JSON.parse($(this).find(".search-filters").html());

                for(let i = 0; i < search_filters.length; i++) {
                    if(!campaign_filters.includes(search_filters[i])) {
                        $(this).addClass("d-none");
                        break;
                    }
                }
            });

            $("#searched-filters-value").html(search_filters_string);
            $("#searched-filters-label").removeClass("d-none");
        }
    };

    $("#searched-details").addClass("d-none");
    $("#searched-string-label").addClass("d-none");
    $("#searched-location-label").addClass("d-none");
    $("#searched-filters-label").addClass("d-none");
    $("#no-results-found").addClass("d-none");
    $(".deceased-item-container").removeClass("d-none");

    if(search_string != "" || search_location != "" || search_filters.length > 0) {
        $("#loading").addClass("active");

        setTimeout(function() {
            $("#searched-details").removeClass("d-none");
            $(".deceased-item-container").removeClass("d-none");

            search_with_string();
            search_with_location();
            search_with_filters();

            if($(".deceased-item-container:not(.d-none)")[0]) {
                $("#no-results-found").addClass("d-none");
            } else {
                $("#no-results-found").removeClass("d-none");
            }

            $("#cancel-search").tab("show");
            $(".nav-link[href='#nav-search']").removeClass("active");

            $("#loading").removeClass("active");
        },100);
    }
});

$(document).on("click", "#cancel-search", function() {
    $("input[name='search_value']").val("");
    $("select[name='location']").val("");
    $(".filter-pills").removeClass("active");

    $("#search-campaign").trigger("click");
});

$(document).on("click", ".donor-option-content", function() {
    $("input[name='donor-info'][value='" + $(this).data("option") + "']").prop("checked", true);
});

$(document).on("click", "#amount-donor-submit", function() {
    let amount = parseFloat($("input[name='amount']").val());

    if(!isNaN(amount) && amount > 0) {
        $("#donation-amount-display").html("Php " + numberFormat(amount, true));

        let donor_info = $("input[name='donor-info']:checked").val();

        $(".donation-my-profile-container .section").addClass("d-none");

        if(donor_info == "account") {
            $(".donation-my-profile-container .section[data-option='account']").removeClass("d-none");
        } else if(donor_info == "input") {
            let first_name = $("input[name='first_name']").val();
            let last_name = $("input[name='last_name']").val();

            if(first_name != "" && last_name != "") {
                $("#donor-name").html(first_name + " " + last_name);

                $(".donation-my-profile-container .section[data-option='input']").removeClass("d-none");
            } else {
                alertify.error("Please complete your name.");
                return 0;
            }
        } else if(donor_info == "anonymous") {
            $(".donation-my-profile-container .section[data-option='anonymous']").removeClass("d-none");
        }

        window.location = "#page-3";
    } else {
        alertify.error("Please input a valid amount.");
    }
});

$(document).on("click", ".copy-to-clipboard", function() {
    var temp = $("<input>");
    $("body").append(temp);
    temp.val($(this).data("copy")).select();
    document.execCommand("copy");
    temp.remove();

    alertify.success("Copied to Clipboard!");
});
