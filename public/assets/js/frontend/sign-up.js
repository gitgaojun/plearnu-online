/**
 * Created by jun on 17-2-28.
 */

function sign_up(obj){
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

        },
        error:function(){
            alert(133);
        }

    });
}