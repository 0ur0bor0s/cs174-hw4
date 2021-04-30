
/**
 *  @author Dat Nguyen
 */

 let validateInputs = (input) => {
    
    if(isNaN(input) ){
        return false;
    }
    else if(input > 3 || input < 0){
        return false;
    }

    return true;
}

let validateForm = () => {
    var i = document.forms["myForm"]["arg1"].value;
    var j = document.forms["myForm"]["arg2"].value;
    var m = document.forms["myForm"]["arg3"].value;
    var l = document.forms["myForm"]["arg4"].value;

    if(!validateInputs(i) || !validateInputs(j) || !validateInputs(m) || !validateInputs(l)){
        alert("Inputs should be integers in range 0-3")
        return false;
    }

    return true;
}


