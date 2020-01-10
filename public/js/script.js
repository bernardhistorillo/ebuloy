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

$(document).ready(function() {
    history.pushState("", document.title, window.location.pathname);
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

    var old_page = get_hash(e.originalEvent.oldURL);
    var new_page = get_hash(e.originalEvent.newURL);

    var old_page_element = ".page[data-name='" + old_page.name + "']";
    var new_page_element = ".page[data-name='" + new_page.name + "']";

    var old_page_animation = (new_page.order > old_page.order) ? "slideOutLeft" : "slideOutRight";
    var new_page_animation = (new_page.order > old_page.order) ? "slideInRight" : "slideInLeft";

    var old_page_is_not_animating = false;
    var new_page_is_not_animating = false;

    $("#overlay").addClass("active");

    animateCSS(old_page_element, old_page_animation, function() {
        $(old_page_element).addClass("cached");
        old_page_is_not_animating = true;

        if(old_page_is_not_animating && new_page_is_not_animating) {
            $("#overlay").removeClass("active");
        }
    });

    animateCSS(new_page_element, new_page_animation, function() {
        new_page_is_not_animating = true;

        if(old_page_is_not_animating && new_page_is_not_animating) {
            $("#overlay").removeClass("active");
        }
    });
    $(new_page_element).removeClass("cached");
});