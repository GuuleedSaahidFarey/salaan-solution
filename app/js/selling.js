let btnAction="insert";

listAllSellin();
roleUsers();
// getSession();

$("#addsell").on("click",function (e) {
    e.preventDefault();
    $("#sellForm")[0].reset();
    $("#sellModel").modal("show");
  
})

$("#close").on("click",function (e) {
    e.preventDefault();
    $("#sellTpl tbody").html('');
    listAllSellin();
})

// $("#sellTpl tbody").on("click",function (e) {
//     if (!e.target.classList.contains("update")) {
//         $("#sellTpl tbody").html('');
//         listAllSellin();
//     }
// })


function listAllSellin() {
    $("#sellTpl tbody").html('');
    let sendingData= {
        "action":"listAllSelling"
    }

$.ajax({
    type:"POST",
    url:"../api/sellApi.php",
    data:sendingData,
    catch:false,
    success:function (data) {
        let status = data.status;
        let response =data.data;
        let tr ="";
        if (status) {
            response.forEach(res => {
                tr+=`<tr>`;
                for(let r in res){
                    if (r=='id') {
                        
                    }else if (r=='date') {
                        
                    }
                    else if (r=='model') {
                       
                    }else if (r=='color') {
                        
                    }else if (r=='size') {
                        
                    }
                   
                    else{
                        tr+=`<td>${res[r]}</td>`;
                    }
                    
                    
                }
                tr+=`<td><a class="btn btn-success update" updateId=${res['id']} >Update</a><a class="btn btn-danger delete" deleteId=${res['id']} deletedName=${res['name']}>Delete</a></td>`;
                tr+=`</tr>`;
            
            });
            $("#sellTpl tbody").append(tr);
        }else{

        }
    },
    error:function (data) {
        
    }
})
}

function displeyMessege(type,messege) {
    let success = document.querySelector(".alert-success");
    let denger= document.querySelector(".alert-danger");
    if (type=='success') {
        denger.classList=("alert alert-danger d-none");
        success.classList=("alert alert-success");
        success.innerHTML=messege;
        setTimeout(() => {
            $("#sellForm")[0].reset();
            $("#sellModel").modal("hide");
            
            success.classList=("alert alert-success d-none");
        }, 2000);
    }else{
        denger.classList=("alert alert-danger");
        denger.innerHTML=messege;
    }

}
$("#sellForm").on("submit",function (e) {
    e.preventDefault();
    
    // let form_Data = new FormData($("#sellForm")[0]);
    let id = $("#rowId").val();
    let name = $("#name").val();
    let model = $("#model").val();
    let size = $("#size").val();
    let color = $("#color").val();
    let descrip = $("#descrip").val();
    let price = $("#price").val();
    let type = $("#type").val();
    let namePerson =$("#namePerson").val();
    let phone = $("#phone").val();
    let peyMethod =$("#peyMethod").val();
    
    let peyStatus=$("#peyStatus").val();
   
    let sendingData={};
    if (btnAction=="insert") {
         sendingData={
            "name":name,
            "model":model,
            "size":size,
            "color":color,
            "descrip":descrip,
            "price":price,
            "namePerson":namePerson,
            "phone":phone,
            "type":type,
            "action":"regNewOrder"
        };
    }
    else{
        // regPyments();
        sendingData={
            "id":id,
            "name":name,
            "model":model,
            "size":size,
            "color":color,
            "descrip":descrip,
            "price":price,
            "namePerson":namePerson,
            "phone":phone,
            "type":type,
            "peyMethod":peyMethod,
            "action":"updatepayment"
           }

    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response =data.data;
            if (status) {
                displeyMessege("success",response);
                btnAction="insert";
                $("#namePerson").attr("disabled",false);
                listAllSellin();
            }else{
                alert(response);
            }
        },
        error:function (e) {
            
        }
    })
})

function getSession() {
    let sendingData={
        'action':'getSession'
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            console.log(data);
        },
        error:function (data) {
            
        }
    })
}

function regPyments(){
    let id = $("rowId").val();
    let name = $("#name").val();
    let model = $("#model").val();
    let size = $("#size").val();
    let color = $("#color").val();
    let descrip = $("#descrip").val();
    let price = $("#price").val();
    let type = $("#type").val();
    let namePerson =$("#namePerson").val();
    let phone = $("#phone").val();
    let peyMethod =$("#peyMethod").val();

 if (btnAction=="insert") {
    sendingData={
    
        "name":name,
        // "model":model,
        // "size":size,
        // "color":color,
        "descrip":descrip,
        "price":price,
        "namePerson":namePerson,
        "phone":phone,
        "type":type,
        "peyMethod":peyMethod,
        "action":"regpayment"
       }
 }else{
    sendingData={
        "id":id,
        "name":name,
        // "model":model,
        // "size":size,
        // "color":color,
        "descrip":descrip,
        "price":price,
        "namePerson":namePerson,
        "phone":phone,
        "type":type,
        "peyMethod":peyMethod,
        "action":"updatepayment"
       }
 }
       $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response =data.data;
            if (status) {
                displeyMessege("success",response);
                // listAllSellin();
                btnAction="insert";
                listAllSellin();
               
            }else{
                alert(response);
            }
        },
        error:function (e) {
            
        }
    })
}

function fetchRowInfo(id) {
    let sendingData={
        'id':id,
        'action':'fetchRowInfo'
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response =data.data;
            if (status) {
                btnAction="update";
                console.log('clicked');
            //   console.log(response);
              
               
                $("#sellModel").modal("show");
                // $("#name").val("");
                $("#rowId").val(response['id']); 
                $("#name").val(response['name']); 
                // $("#model").val(response['model']);$(".model").addClass("d-none");
                // $("#size").val(response['size']);$(".size").addClass("d-none");
                // $("#color").val(response['color']);$(".color").addClass("d-none");
                $("#descrip").val(response['descrip']);
                $("#price").val(response['price']);
                $("#namePerson").val(response['namePerson']);
                $("#phone").val(response['phone']);
                $("#type").val(response['type']);$(".type").addClass("d-none");
                let peyMethod= document.querySelector("#peyMethodd");
                peyMethod.classList="col-sm-12";
              
                

                
            }else{

            }
        },
        error:function (data) {
            
        }
    })
}


function deleteThisOrder(id) {
    let sendingData ={
        "id":id,
        "action":"deleteOrder"
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data
            if (status) {
                // console.log(response);
                alert(response);
                listAllSellin();
            }else{
                alert(response);
            }
        }
    })
}
function deleteAllselling() {
    let sendingData={
        "action":"deleteAllSelling"
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status =data.status;
            let response = data.data;
            if (status) {
                alert("success",response);listAllSellin();
            }else{
                alert("error",response);
            }
        },
        error:function (data) {
            alert(data);
        }
    })
}

function roleUsers() {
    let sendingData={
        "action":"roleUsers"
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status =data.status;
            let response = data.data;
            if (status) {
                if (response=="user") {

                    $("#dellAll").addClass("d-none");
                    $(".delete").addClass("d-none");
                }
              else{
                    
                }
            }else{

            }
        },
        error:function (data) {
            
        }
    })

}

function search(val) {
    $("#sellTpl tbody").html("");
    let sendingData={
        "val":val,
        "action":"searchSelling"
    }
    $.ajax({
        type:"POST",
        url:"../api/sellApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response= data.data;
            let tr ="";
            if (!status) {
                response.forEach(res => {
                    tr+=`<tr>`;
                    for(let r in res){
                        if (r=='id') {
                            
                        }else if (r=='date') {
                            
                        }
                        else if (r=='model') {
                            tr+="";
                        }else if (r=='color') {
                            
                        }
                        else{
                            tr+=`<td>${res[r]}</td>`;
                        }
                        
                        
                    }
                    tr+=`<td><a class="btn btn-success update" updateId=${res['id']} pey=${response[res]}><i class="fa fa-edit">pey</i></a><a class="btn btn-info print" print=${res['id']}>Print</a><a class="btn btn-danger delete" deleteId=${res['id']} deletedName=${res['name']}>Delete</a></td>`;
                    tr+=`</tr>`;
                
                });
                $("#sellTpl tbody").append(tr);
            }else{
    
            }
        },
        error:function (data) {
            
        }
    })
}


$("#sellTpl").on("click",'.update',function (e) {
    e.preventDefault();
    let updateId=$(this).attr("updateId");
    // let pey=$(this).attr("pey");
  console.log(updateId);
  
    fetchRowInfo(updateId);
})

$("#sellTpl").on("click",'.delete', function (e) {
    e.preventDefault();
    console.log('clicked');
    let deleteId= $(this).attr("deleteId");
    let deletedName =$(this).attr("deletedName");
    if (confirm("are you sure to delete this order" +  deletedName)) {
        deleteThisOrder(deleteId);
    }
})

$("#dellAll").on("click",function (e) {
    e.preventDefault();
    if (confirm("are you sure to delete all selling")) {
        deleteAllselling();

    }
})

$("#search").on("keyup",function () {
    let value = $("input[id='search']").val();
    console.log(value);
    if (value==='') {
        $("#sellTpl thead").html("");
        $("#sellTpl tbody").html("");
        listAllSellin();
    }else{
        search(value);
    }
})