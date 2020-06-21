function onRadioButtonclick() {
    check1 = document.form1.Radio1.checked;
    check2 = document.form1.Radio2.checked;
    check3 = document.form1.Radio3.checked;
    var all = document.querySelectorAll('.working, .complete');
    var working = document.querySelectorAll('.working');
    var complete = document.querySelectorAll('.complete');
    if (check1 == true) {
        all.forEach(function(elem){
            elem.style.display = "";
        });
    }
    else if (check2 == true) {
        working.forEach(function(elem){
            elem.style.display = "";
        });
        complete.forEach(function(elem){
            elem.style.display = "none";
        });
    }
    else if (check3 == true) {
        working.forEach(function(elem){
            elem.style.display = "none";
        });
        complete.forEach(function(elem){
            elem.style.display = "";
        });
    }
}

