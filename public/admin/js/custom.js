$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val()
        // alert(current_pwd)
        $.ajax({
            type:'post',
            url:'/admin/check-current-password',
            data:{current_pwd:current_pwd},
            success:function(response){
                if(response = false){
                    $("verifyCurrentPwd").html("Current Password is Incorrect!")
                }else if(response = true){
                    $("verifyCurrentPwd").html("Current Password is Correct!")
                }
            },// error:function(){
                // alert("error")
          //  }
        })
    })
})