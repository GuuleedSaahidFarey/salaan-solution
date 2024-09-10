$("#from").attr("disabled",true);
$("#to").attr("disabled",true);


$("#type").on("change",function (e) {
    e.preventDefault();
    if ($("#type").val()==0) {
        $("#from").attr("disabled",true);
        $("#to").attr("disabled",true);
    }else{
        $("#from").attr("disabled",false);
        $("#to").attr("disabled",false);
    }
})

$("#repourtForm").on("submit",function (e) {
    e.preventDefault();
    console.log("clicker");
    let from = $("#from").val();
    let to = $("#to").val();
    
    
    let sendingData={
        "from":from,
        "to":to,
        "action":"get_repourt_statement"
    }
    $.ajax({
        type:"POST",
        url:"../api/repourtApi.php",
        data:sendingData,
        catch:false,
        success:function (data) {
            let status = data.status;
            let response = data.data;
            let tr="";
            if (status) {
                response.forEach(res => {
                    tr+=`<tr>`;
                    for(let r in res){
                        if (r=="id") {
                            
                        }else if (r=='model') {
                            
                        }else if (r=='size') {
                            
                        }else if (r=='color') {
                            
                        }else if (r=='descrip') {
                            
                        }else{
                            tr+=`<td>${res[r]}</td>`;
                        }
                    }
                    
                    tr+=`</tr>`;
                    
                });
                $("#repourtTbl tbody").append(tr);
            }else{

            }
        },
        error:function () {
            
        }
    })
})