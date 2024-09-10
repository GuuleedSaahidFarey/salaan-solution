
listAllSellin();
roleUsers();

function listAllSellin() {
    $("#peyTpl tbody").html('');
    let sendingData= {
        "action":"listAllSelling"
    }

$.ajax({
    type:"POST",
    url:"../api/paymentApi.php",
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
                        tr+="";
                    }else if (r=='color') {
                        
                    }else if (r=='descrip') {
                        
                    }else if (r=='size') {
                        
                    }
                    else{
                        tr+=`<td>${res[r]}</td>`;
                    }
                    
                    
                }
                tr+=`<td><a class="btn btn-success print" printId=${res['id']}><i class="fa fa-edit">Print</i></a><a class="btn btn-danger delete" deleteId=${res['id']}>Delete</a></td>`;
                tr+=`</tr>`;
            
            });
            $("#peyTpl tbody").append(tr);
        }else{

        }
    },
    error:function (data) {
        
    }
})
}

let title = document.querySelector("#slnTitle");
title.style.textAlign ="center";
// function search(val) {
//     $("#peyTpl tbody").html("");
//     let sendingData={
//         "val":val,
//         "action":"searchSelling"
//     }
//     $.ajax({
//         type:"POST",
//         url:"../api/sellApi.php",
//         data:sendingData,
//         catch:false,
//         success:function (data) {
//             let status = data.status;
//             let response= data.data;
//             let tr ="";
//             if (!status) {
//                 response.forEach(res => {
//                     tr+=`<tr>`;
//                     for(let r in res){
//                         if (r=='id') {
                            
//                         }else if (r=='date') {
                            
//                         }
//                         else if (r=='model') {
//                             tr+="";
//                         }else if (r=='color') {
                            
//                         }
//                         else{
//                             tr+=`<td>${res[r]}</td>`;
//                         }
                        
                        
//                     }
//                     tr+=`<td><a class="btn btn-success update" updateId=${res['id']} pey=${response[res]}><i class="fa fa-edit">pey</i></a><a class="btn btn-info print" print=${res['id']}>Print</a><a class="btn btn-danger delete" deleteId=${res['id']} deletedName=${res['name']}>Delete</a></td>`;
//                     tr+=`</tr>`;
                
//                 });
//                 $("#peyTpl tbody").append(tr);
//             }else{
    
//             }
//         },
//         error:function (data) {
            
//         }
//     })
// }



function deleteThisPeyment(id) {
    let sendingData={
        "id":id,
        "action":"deleteThisPyment"
    }
    $.ajax({
        type:"POST",
        url:"../api/paymentApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data;
            if (status) {
                alert(response);
                listAllSellin();
            }else{
                alert(listAllSellin);
            }
        },
        error:function (data) {
            
        }
    })
}


function roleUsers() {
    let sendingData={
        "action":"roleUsers"
    }
    $.ajax({
        type:"POST",
        url:"../api/paymentApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status= data.status;
            let response = data.data;
            if (status) {
                if (response=="user") {
                    $(".delete").addClass("d-none");

                }else{

                }
            }else{

            }
        },
        error:function (data) {
            alert(data)
        }
    })
}

function printPeyment(id) {
    let sendingData={
        "id":id,
        "action":"printPyment"
    }
    $.ajax({
        type:"POST",
        url:"../api/paymentApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data;
            let tr ="";
            if (status) {
                
                $("#invoiceMdl").modal("show");
                $(".tt").addClass=("d-none");
                $("#inId").html(response['id']);
                $("#inDate").html("Date: " + response['date']);
                $("#inInfoPer").html("Name:" + response['namePerson']);
                $("#inphone").html("Phone:" + response['phone']);
                $("#dName").html("Device Name:" + response['name']);
                // $("#dModal").html("Device Modal:" + response['model']);
                // $("#dSize").html("Device Size:" + response['size']);
                // $("#dColor").html("Device Color:" + response['color']);
                $("#dDis").html("Description:" + response['descrip']);
               tr+='<tr>';
               tr+=`<td>${response['type']}</td>`;
               tr+=`<td>${response['price']}</td>`;
               tr+=`<td>${response['peyMethod']}</td>`;
               $("#invoiceTbl tbody").append(tr);

                
            }else{

            }
        },
        error:function (data) {
            alert(data);
        }
    })
}


function search(val) {
    $("#sellTpl tbody").html("");
    let sendingData={
        "val":val,
        "action":"searchAll"
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
                $("#peyTpl tbody").append(tr);
            }else{
    
            }
        },
        error:function (data) {
            
        }
    })
}

$("#search").on("keyup",function () {
    let value = $("input[id='search']").val();
    console.log(value);
    if (value==='') {
        $("#peyTpl thead").html("");
        $("#peyTpl tbody").html("");
        // listAllSellin();
    }else{
        search(value);
    }
})

// closeMdl.addEventListener("click",()=>  {
//     // e.preventDefault();
//     let modal = document.querySelector("#invoiceMdl");

//         let dataTable= document.querySelector("#peyTpl");
//         modal.style.display="none";
//     dataTable.style.visibility="block";
    
    
    
// })

$("#daabac").on("click",function (e) {
    e.preventDefault();
    let dataTable= document.querySelector("#peyTpl");
    let closeMdl= document.querySelector("#closeIconn");
    let printButton = document.querySelector("#daabac");
    let modal = document.querySelector("#invoiceMdl");
    let navpar = document.querySelector("#navpar");
    let titleTble = document.querySelector("#tt");
    titleTble.style.display="none";
    navpar.style.display="none";
    closeMdl.style.display="none";

    printButton.style.display="none";
    dataTable.style.visibility = 'hidden';
    
    window.print();
 






   
})

// Function to remove the link with the URL ending with 'invoice.php'
// function removeInvoiceLink() {
//     // Get all anchor elements
//     const links = document.getElementsByTagName('a');
    
//     // Loop through the links to find the one with the specific URL
//     for (let i = 0; i < links.length; i++) {
//         const link = links[i];
        
//         // Check if the href attribute ends with 'invoice.php'
//         if (link.href.endsWith('payments.php')) {
//             // Remove the link from the DOM
//             link.remove();
//             break; // Exit the loop once the link is found and removed
//         }
//     }
// }

// Call the function to remove the invoice link
// removeInvoiceLink();


$("#peyTpl").on("click",".print",function (e) {
    e.preventDefault();
    let printId = $(this).attr("printId");
    console.log(printId);
    
     printPeyment(printId);
    
})

$("#printAll").on("click", function (e) {
    e.preventDefault();
    let table = $("#peyTbl tbody");
    let printAll =$("#printAll");
    printAll.addClass("d-none");
       
    window.print();
     let navpar =("#navpar");
        navpar.addClass("d-none");
})
$("#peyTpl").on("click",".delete",function () {
    let deleteId=$(this).attr("deleteId");
    if (confirm("are you sure to delete this payment")) {
        deleteThisPeyment(deleteId);
    }    
})


// $("#search").on("keyup",function () {
//     let value = $("input[id='search']").val();
//     console.log(value);
//     if (value==='') {
//         $("#sellTpl thead").html("");
//         $("#sellTpl tbody").html("");
//         listAllSellin();
//     }else{
//         search(value);
//     }
// })