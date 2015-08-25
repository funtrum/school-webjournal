var mq = window.matchMedia( "(only screen and (max-width : 320px), only screen and (min-device-width : 320px) and (max-device-width : 480px) and (orientation : portrait) and (-webkit-min-device-pixel-ratio : 2), only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2), only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2), only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2), only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2), only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3), only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3))" );
if (mq.matches) {
    
}
else {
    jQuery(".signup-btn").click(function() {
        jQuery(".sign-in-parent").css("transform", "translateX(100%)");
        jQuery(".sign-up-parent").css("transform", "translateX(100%)");
    });

    jQuery(".recoverin-btn").click(function() {
        jQuery(".sign-in-parent").css("transform", "translateX(-100%)");
        jQuery(".recover-parent").css("transform", "translateX(-100%)");
    });

    jQuery(".signin-btn").click(function() {
        jQuery(".sign-in-parent").css("transform", "translateX(0%)");
        jQuery(".sign-up-parent").css("transform", "translateX(-100%)");
    });

    jQuery(".recoverup-btn").click(function() {
        jQuery(".sign-up-parent").css("transform", "translateX(-100%)");
        jQuery(".recover-parent").css("transform", "translateX(-100%)");
    });

    jQuery(".recover-signin-btn").click(function() {
        jQuery(".sign-in-parent").css("transform", "translateX(0%)");
        jQuery(".recover-parent").css("transform", "translateX(0%)");
    });

    jQuery(".recover-signup-btn").click(function() {
        jQuery(".recover-parent").css("transform", "translateX(0%)");
        jQuery(".sign-up-parent").css("transform", "translateX(100%)");
    });

    function AjaxFormRequest(form_id,url) {
        jQuery.ajax({
            url:     url,
            type:     "POST",
            dataType: "html",
            data: jQuery("#"+form_id).serialize(), 
            success: function(response) {
                if(response == '0') {
                    $("#status").css("color", "#e74c3c");
                    $("#status").css("font-size", "25px");
                    $("#status").text("Unknown Login or Password");
                }
                if(response == '1') {
                    location.reload();
                }
        },
        error: function(response) {
            alert('Oh, no!');
        }

        });
    }
}