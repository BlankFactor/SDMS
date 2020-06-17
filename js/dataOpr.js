function Delete(number){
    if (confirm("确定删除?")){
        window.location = "action_Del.php?id="+number;
    }
}

function Insert(){
    var elems = document.getElementsByTagName("input");
    for(i = 0;i<elems.length;i++){
        if(elems[i].value == ""){
            alert("所有信息不能为空");
            return false;
        }
    }

    elems = document.getElementsByTagName("select");
    for(i = 0;i<elems.length;i++){
        if(elems[i].value == ""){
            alert("地点不能为空");
            return false;
        }
    }
    return true;
}

function Confirm(){
    return confirm("确认修改?");
}