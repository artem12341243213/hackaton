
function ajx(text) {

    let url = text.split("/")[0]
    let str_ne = text.split("/")[1]
    print(str_ne)
    let str = " ";
    $.ajax({
        type: "POST",
        url: url,
        data: str_ne,
        dataType: "dataType",
        caches: false,
        success: function (response) {
            if (response == 1) {
                alert("Удачно")
            } else if (response == 0) {
                alert("Неудачно")
            }
        }
    });
}

function onRegisters_ragio(l) {

    $(`label[for='check_radio_your_teacher']`).removeClass("active_chekeds_bo");
    $(`label[for='check_radio_your_student']`).removeClass("active_chekeds_bo");
    $(`label[for='check_radio_your_employee']`).removeClass("active_chekeds_bo");

    $(`label[for='${l}']`).addClass("active_chekeds_bo");

}
function autiziren() {
    let login = $("#login").val();
    let pass = $("#pass").val();

    ajx("GLA_g/login_f=1&login=" + login + "&pass=" + pass)
}

function register() {


    let txt = "GLA_g/&registers_f=1&";
    /* запоминаем имя */
    let first_name = $("#first_name").val()
    let name = $("#name").val()
    let lastname = $("#last_name").val()

    if (first_name == "" || name == "" || lastname == "") {
        alert("Пустые поля не должны быть")
        return
    } else if (first_name.length < 2 || name.length < 2 || lastname.length < 2) {
        alert("Поля ФИО не должны иметь меньше 2х символов")
    }
    let m = 0;
    for (i = 0; i < first_name.length; i++) {
        if (!isNaN(first_name[i])) {
            m++
        }
    }
    for (i = 0; i < name.length; i++) {
        if (!isNaN(name[i])) {
            m++
        }
    }
    for (i = 0; i < lastname.length; i++) {
        if (!isNaN(lastname[i])) {
            m++
        }
    }
    if (m != 0)
        alert("Использовать цифры в поле ФИО запрещенно ")

    txt += "firstname=" + first_name + "&name=" + name + "&lastname=" + lastname;

    /* Запоминает выбор "Кто я " */

    if ($(".active_chekeds_bo").length == 0) {
        alert("Выберите работу")
        return
    }

    let radio = $('#' + $(".active_chekeds_bo")[0].htmlFor).val();
    txt += "&class=" + radio;

    let login = $("#login_u").val()
    let password = $("#pass_u").val()
    let password_r = $("#pass_u2").val()

    if (login == "" || login.length < 3) {
        alert("Логин не может быть меньши 3 символов")
        return
    }
    txt += "&login=" + login

    if (password != password_r || password_r.length < 3) {
        if (password != password_r)
            alert("Пароли не совпадают")
        else if (password_r.length < 3)
            alert("Пароль не может быть меньши 3 символов")
        return
    }
    txt += "&pass=" + password


    ajx(txt)
}

function print(l) {
    console.log(l)
}