$(document).ready(function() {
    
    $("#arrow-bot").click(function() {
        $('#user-liste').animate({
            scrollTop: $("#user-liste").offset().top
        }, 1000);
    });
    $("#arrow-top").click(function() {    
        $("#user-liste").animate({ scrollTop: 10 }, 1000);
    });
});
    