
/**
 *  @author Dat Nguyen
 */

 function validateInput(input){
    input = Number(input)
    if(isNaN(input)){
        return false;
    }
    else if(!Number.isInteger(input)){
        return false;
    }
    else if(input > 3 || input < 0){
        return false;
    }
    else{
        return true;
    }
    

}

 function validateForm(){
    var i = document.forms['myForm']['arg1'].value;
    var j = document.forms['myForm']['arg2'].value;
    var m = document.forms['myForm']['arg3'].value;
    var l = document.forms['myForm']['arg4'].value;
    if(!validateInput(i) || !validateInput(j) || !validateInput(m) || !validateInput(l)){

        alert("Inputs should be integers in range 0-3")
        return false;
    }

    return true;

}


