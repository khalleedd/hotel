$(document).ready(function(){
    $("#newname").hide();
    $("#changename").hide();
    $("#cancelname").hide();
    $("#modifyname").on("click",function(){
        cancelemail();
        cancelpassword();
        cancelphone();
        $("#newname").show();
        $("#changename").show();
        $("#cancelname").show();
        $("#oldname").hide();
        $(this).hide();
    });
    function cancelname(){
        $("#newname").hide();
        $("#changename").hide();
        $("#cancelname").hide();
        $("#oldname").show();        
        $("#modifyname").show();
        $(this).hide();
    }
    $("#cancelname").on("click",function(){cancelname();});

    $("#newemail").hide();
    $("#changeemail").hide();
    $("#cancelemail").hide();
    $("#modifyemail").on("click",function(){
        cancelname();
        cancelpassword();
        cancelphone();
        $("#newemail").show();
        $("#changeemail").show();
        $("#cancelemail").show();
        $("#oldemail").hide();
        $(this).hide();
    });
    function cancelemail(){
        $("#newemail").hide();
        $("#changeemail").hide();
        $("#cancelemail").hide();
        $("#oldemail").show();        
        $("#modifyemail").show();
        $(this).hide();
    }
    $("#cancelemail").on("click", function(){cancelemail();});

    $("#newphone").hide();
    $("#changephone").hide();
    $("#cancelphone").hide();
    $("#modifyphone").on("click",function(){
        cancelname();
        cancelpassword();
        cancelemail();
        $("#newphone").show();
        $("#changephone").show();
        $("#cancelphone").show();
        $("#oldphone").hide();
        $(this).hide();
    });
    function cancelphone(){
        $("#newphone").hide();
        $("#changephone").hide();
        $("#cancelphone").hide();
        $("#oldphone").show();        
        $("#modifyphone").show();
        $(this).hide();
    }
    $("#cancelphone").on("click", function(){cancelphone();});


    $("#newpassword").hide();
    $("#changepassword").hide();
    $("#cancelpassword").hide();
    $("#modifypassword").on("click",function(){
        cancelname();
        cancelemail();
        cancelphone();
        $("#newpassword").show();
        $("#changepassword").show();
        $("#cancelpassword").show();
        $("#oldpassword").hide();
        $(this).hide();
    });
    function cancelpassword(){
        $("#newpassword").hide();
        $("#changepassword").hide();
        $("#cancelpassword").hide();
        $("#oldpassword").show();        
        $("#modifypassword").show();
        $(this).hide();
    }
    $("#cancelpassword").on("click",function(){cancelpassword();});
 
});