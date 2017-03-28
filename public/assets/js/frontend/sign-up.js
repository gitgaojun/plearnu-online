/**
 * Created by jun on 17-2-28.
 */

$(document).ready(function(){
    $('#signup_button').click(function(){
        var obj = document.getElementById('signup_form');
        var email = obj.getElementsByClassName('email')[0].value;
        var password = obj.getElementsByClassName('password')[0].value;
        var mobile = obj.getElementsByClassName('mobile')[0].value;

        var postData = 'email='+email+'&password='+password+'&mobile='+mobile;
        $.ajax({
            type:"post",
            url:"/sign-up.html",
            data: postData,
            dataType:'json',
            success:function(data){
                if(data.status) {
                    alert('恭喜您注册成功.');
                    window.location.href='/';
                }else{
                    alert(data.message);
                    return;
                }
            },
            error:function(){
                alert(133);
            }

        });
    });
});

