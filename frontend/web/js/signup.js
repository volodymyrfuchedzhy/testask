$(document).ready(function(){
    $(".field-signupform-company_name").hide();
    $("#signupform-subscription_type").on("change", function(){
        if($(this).val() == 1)
        {
            $(".field-signupform-company_name").show();
        }
        else
        {
            $(".field-signupform-company_name").hide();
        }
    });
});