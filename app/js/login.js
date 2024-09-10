
$("#loginForm").on("submit",function (e) {
    console.log('ready');
    e.preventDefault();
    let userName= $("#userName").val();
    let password =$("#password").val();
    let sendingData={
        "userName":userName,
        "password":password,
        "action":"checkLogin"
    }

    $.ajax({
        type:"POST",
        url:"./api/loginApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
           let status = data.status;
           let response = data.data;
           if (status) {
           window.location.href="../app/views/index.php";
           } else{
            alert(response);
           }
        },
        error:function (data) {
            
        }
    })

})
