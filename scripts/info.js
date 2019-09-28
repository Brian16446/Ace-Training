

$("#pInfo").hover(function(){
    $("#signInInfo").addClass("active");
    $("#studentBtn").hide();
    $("#tutorBtn").hide();
}, function(){
    $("#signInInfo").removeClass("active");
    $("#studentBtn").show();
    $("#tutorBtn").show();
})