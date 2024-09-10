
$("#add").on("click",function (e) {
    e.preventDefault();
    console.log('clicked');
})
listUsers();
btnAction='insert';
$("#addUser").on("click",function (e) {
    e.preventDefault();
    console.log('clicked');
    $("#userModal").modal("show");
})
let fileImege = document.querySelector("#imege");
let showInput=document.querySelector("#show");

const reader = new FileReader();

fileImege.addEventListener("change", (e)=>{
    const selectedFile=e.target.files[0];
    reader.readAsDataURL(selectedFile);
})

reader.onload = e =>{
    showInput.src=e.target.result;
}

function checkLogged() {
    let sendingData={
        "action":"checkUser"
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data;
            if (status) {
                window.location.href="../index.php"; 
            }else{

            }
        },
        error:function (data) {
            
        }
    })
}

function displeyMessege(type,messege) {
    let success = document.querySelector(".alert-success");
    let error = document.querySelector(".alert-danger");
    if (type=="success") {
         error.classList=("alert alert-danger d-none");
         success.classList=("alert alert-success");
         success.innerHTML=messege;
         setTimeout(function(){
           $("#userModal").modal("hide");
           $("#userForm")[0].reset();
           success.classList="alert alert-success d-none"; 
           
         },3000);
 
    }else{
     error.classList=("alert alert-danger");
     error.innerHTML=messege;
    }
   }

function listUsers() {
    $("#userTable tbody").html('');
    let sendingData9 ={
        "action":"getUserList",
    }
    $.ajax({
        type:"POST",
        url:"../api/userApi.php",
        data:sendingData9,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data;
            let tr="";
            let th = "";
            if (status) {
                    
              response.forEach(re => {
                th+=`<tr>`;
                tr+="<tr>";
                for(let r in re){

                    th+=`<th>${r}</th>`;
                    if (r == "imeges") {
                        
                        // tr+=`<td><img src='${re[r]}'></td>`;
                        tr+=`<td><img style='height:100px;width:100px;border:1px solid blue;border-radius:50%;object-fit:cover' src='../img/${re[r]}'></td>`;

                        
                    }else if (r=='id') {
                        tr+="";
                    }else if (r=='status') {
                        tr+="";
                    }
                    else{
                        tr+=`<td>${re[r]}</td>`;
                    }
                }
                th+=`</tr>`;
                tr +=`<td><a href="#" class= 'btn btn-info updateInfo' updateId=${re['id']}><i class='fa fa-edit'>Edit</i></a>&nbsp;&nbsp<a class="btn btn-danger deleteInfo" deleteId=${re['id']}><i class='fa fa-trash'>Delete</i></a></td>`;
                tr +="</tr>";
              });

              $("#userTable tbody").append(tr);

            }
            else{
                   console.log(response);
            }
            
        },
        error:function (data) {
            let status = data.status;
            let response =data.data;
            if (!status) {
                response.forEach(rr => {
                    for(let r in rr){
                        console.log(r);
                    }
                });
            }
        }

    })
    
}

function userFetchInfo(id) {
    

    let sendingData10={
        "id":id,
        "action":"getUserInfo"
    }
    $.ajax({
        type:"POST",
        url:"../api/userApi.php",
        data:sendingData10,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response=data.data;
            if (status) {
                btnAction="update";
                $("#rowId").val(response['id']);
                $("#userName").val(response['userName']);
                //qaybta diwaangalinta userka ayaa wax iga khaldanyiin oo sawirku db ga tagimaayo
               $("#show").attr('src',`../sawiro/kk.jpg`);
               $("#userModal").modal("show");
            }
            
        },
        error:function (data) {
            
        }
    })
}


function deleteUserInfo(id) {
    let sendingData12={
        "id":id,
        "action":"deleteUserInfo"
    }
    $.ajax({
        type:"POST",
        url:"../api/userApi.php",
        data:sendingData12,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response=data.data;
            if (status) {
                alert(response);
                listUsers();
            }else{
                alert(response);
            }
        },
        error:function (data) {
            
        }
    })
}



// sending data into Api jus registered user information

$("#userForm").on("submit",function (e) {
   
    e.preventDefault();
        let id =$("#rowId").val();
        let userName = $("#userName").val();
        let password =$("#password").val();
        // let imege =$("#prod_img").val();
        let role=$("#role").val();

        let form_Data = new FormData($("#userForm")[0]);
        // form_Data.append("imege",$("input[type=file]").files[0]);
        form_Data.append("imege",$("input[type=file]")[0].files[0]);


        if (btnAction=='insert') {
            console.log("insert");
          form_Data.append("action","regisUsers");
        }else{
            console.log('update');
            form_Data.append("id",id);
           form_Data.append("action","updateUsers");
        }
       
       
        
 
    $.ajax( {
        type:"POST",
        url:"../api/userApi.php",
        data:form_Data,
        // dataType:"json",
        contentType:false,
        Cache:false,
        processData:false,
        success:function (data) {
            let status = data.status;
            let response=data.data;
            if (status) {
                console.log('diwaanka waala galiyay');
                displeyMessege("success",response);
                btnAction="insert";
                listUsers();
            }else{
                displeyMessege("error", response);
            }
        },
        error:function (data) {
            
        }
    })
   
})


    // Submit form data via Ajax

	
    // File type validation



$("#userTable").on("click", ".updateInfo", function (event) {
    let id = $(this).attr("updateId");
    userFetchInfo(id)
})
 $("#userTable").on("click",".deleteInfo",function (even) {
    let id = $(this).attr("deleteId");
    deleteUserInfo(id)
 })

    
