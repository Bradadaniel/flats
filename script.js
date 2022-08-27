window.addEventListener('load', function () {
    document.getElementById('form1').addEventListener('submit', function (e) {
        e.preventDefault();
        if (check()) this.submit();
    });
})

let $ = function (id) {
    return document.getElementById(id);
};


let check = function () {
    $('errSelect').innerHTML = '';
    $('errSelect1').innerHTML = '';
    $('errSelect2').innerHTML = '';
    $('errSelect3').innerHTML = '';
    $('errSelect4').innerHTML = '';
    $('errSelect5').innerHTML = '';
    $('errSelect6').innerHTML = '';
    $('errSelect7').innerHTML = '';
    $('errSelect8').innerHTML = '';
    $('errSelect9').innerHTML = '';
    $('errSelect10').innerHTML = '';
    $('errSelect11').innerHTML = '';


    let isValid = true;

    if ($('city_id').value == '- Válasszon helységet -'){
        $('errSelect').innerHTML = 'Válassz az alábbiak közül!';
        $('city_id').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('city_id').style.border = "1px solid black";
    }

    if ($('type').value == '- Válasszon egy tipust -'){
        $('errSelect1').innerHTML = 'Válassz az alábbiak közül!';
        $('type').style.border = "1px solid red";
        isValid = false;

    }
    else
    {
        $('type').style.border = "1px solid black";
    }

    if ($('size').value == ''){
        $('errSelect2').innerHTML = 'Adjon meg egy méretet!';
        $('size').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('size').style.border = "1px solid black";
    }

    if ($('price').value == ''){
        $('errSelect3').innerHTML = 'Adjon meg egy árat!';
        $('price').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('price').style.border = "1px solid black";
    }

    if ($('bedroom').value == ''){
        $('errSelect4').innerHTML = 'Adja meg a hálószobák számát!';
        $('bedroom').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('bedroom').style.border = "1px solid black";
    }

    if ($('bathroom').value == ''){
        $('errSelect5').innerHTML = 'Adja meg a furdőszobák számát!';
        $('bathroom').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('bathroom').style.border = "1px solid black";
    }

    if ($('location').value == ''){
        $('errSelect6').innerHTML = 'Adj meg cimet!';
        $('location').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('location').style.border = "1px solid black";
    }

    if ($('floor').value == ''){
        $('errSelect7').innerHTML = 'Emelet száma!';
        $('floor').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('floor').style.border = "1px solid black";
    }

    if ($('elevator').value == ''){
        $('errSelect8').innerHTML = 'Található lift?(Van/Nincs)!';
        $('elevator').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('elevator').style.border = "1px solid black";
    }

    if ($('parking').value == ''){
        $('errSelect9').innerHTML = 'Található parking?(Van/Nincs)!';
        $('parking').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('parking').style.border = "1px solid black";
    }

    if ($('product_image').value == ''){
        $('errSelect10').innerHTML = 'Adjon hozzá képet!';
        $('product_image').style.border = "1px solid red";
        isValid = false;

    }
    else {
        $('product_image').style.border = "1px solid black";
    }


    if ($('date').value == ''){
        $('errSelect11').innerHTML = 'Adja meg a beköltözhetés dátumát!';
        $('date').style.border = "1px solid red";
        isValid = false;
    }
    else {
        $('date').style.border = "1px solid black";
    }

    return isValid;

};