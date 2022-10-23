
function ajx(text) {

    let url = text.split("/")[0]
    let str_ne = text.split("/")[1]
    print(str_ne)
    let str = " ";
    $.ajax({
        type: "POST",
        url: url,
        data: str_ne,
        caches: false,
        success: function (re) {
            obj = jQuery.parseJSON(re);
            if (obj.go)
                setTimeout(() => {
                    locations(obj.go);
                }, 500);
            else {
                alert("Готово");
                document.location.reload();
            }
        }
    });
}

function remove_now_s(id) {
    data = "Block_now_id_" + id;
    if (confirm("Удалить ?")) {
        $.ajax({
            type: "POST",
            url: "GLA_all",
            data: "remove_now_post_f=1&id=" + id,
            caches: false,
            success: function (res) {
                if (res == 1) {
                    $("#" + data).remove();
                }
                else {
                    alert("Возникла ошибка, попробуйте позжe");
                }
            }
        });
    }
    else {
        return;
    }
}

function locations(url) {
    window.location.href = "/" + url;
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

function clist(id) {

    let names = $("#" + id + " #studens").html()
    let thems = $("#" + id + " #them").html()
    let text = $("#" + id + " #text").html()
    let idi = $("#" + id + " #id_texta").html()

    $("#student_moda").html(names)
    $("#id_texta_modal").html(idi)
    $("#them_modal").html(thems)
    $("#txt_moda").html(text)

    $(".modul_box_otv").removeClass("display_none");
    /*  
    them  Тема
     имя 
    text  Текст
     */
    /* modul_box_otv_m */



}

function exit_user_acc() {
    ajx("GLA_all/exit_user_f=1")
}

function closse_modal() {
    $(".modul_box_otv").addClass('display_none')
}
var imgmas = [];

function Lest_so_f_mi() {

    $("#litovis_button_Send").attr("disabled", "disabled");
    if ($("#headers_bloc").val().length < 2 ||
        $("#text_no_arr").val().length < 2 ||
        $("#select_cher").val().length < 2) {
        alert("Пустые поля оставлять нельзя!")
        return;
    }

    setTimeout(() => {
        $("#litovis_button_Send").removeAttr("disabled");
    }, 3000)
    let files = $("#file_box")[0].files;

    var fd = new FormData;
    for (var i = 0; i < files.length; i++) {
        fd.append('img' + i, files[i]);
    }

    mas_iputs = [
        ["header", $("#headers_bloc").val()],
        ["text", $("#text_no_arr").val()],
        ["hesh", $("#select_cher").val()]];


    mas_iputs.forEach((data) => {
        fd.append(data[0], data[1] == '' ? "0" : data[1]);
    })

    fd.append('edit_items', "1");

    $.ajax({
        type: "POST",
        url: "GLA_all",
        data: fd,
        processData: false,
        contentType: false,
        success: function (res) {
            alert("Готово");
            locations("new_block");
        }
    });

}


function href_ti_n(i) {
    //console.log($(".block_new .new_header[data-teg=" + i + "]"));
    $.ajax({
        type: "POST",
        url: "GLA_all",
        data: "items_ti_f_no_f=1&tips=" + i,
        caches: false,
        success: function (res) {
            let le = "";
            res = JSON.parse(res)['masive'][0];
            res.forEach(data => {
                print(data);
                let ol = "";
                switch (data[1]) {
                    case 'vuz':
                        ol = "#Жизнь ВУЗа";
                        break;
                    case 'uch_now':
                        ol = "#Учебные новости";
                        break;
                    case 'soc_live':
                        ol = "#Социальная жизнь";
                        break;
                }
                le += `;
                <div class="block_new">
                    <div class="new_header" data-teg="${data[1]}">Новости СКФ МТУСИ 
                    <span onclick="href_ti_n('${data[1]}')">
                    ${ol}
                    </span></div>

                    <div class="new_body">
                        <div class="new_body__header">
                            <p>${data[3]}</p>
                        </div>
                        <div class="new_body__body">
                            <div class="section_img">
                                <img src="assec/img/${data[4].replace("|", "")}" alt="Фото новости">
                            </div>
                            <div class="section_text" title="Текст новости">
                            ${data[2]}
                            </div>
                        </div>
                    </div>
                </div>
                `
            });
            $(".block_left").html(le)
        }

        /*  */



    });


    /* Array
(
    [0] => Array
        (
            [0] => 2
            [1] => soc_live
            [2] => VYjuj Много текста Rnjhjsq ОПисыunture pellendus amet odit, maiores perspiciatis!
            [3] => ИИИ ВОт новый ЗагАлоВок !!!
            [4] => |logo_headers.png
        )
    )
 */
}


function send_mail_retors() {
    text_qul = "GLA_all/";

    let id = $("#id_texta_modal").html()


    let text = $("textarea#text_dek_t").val();

    text = text.replace("+", "&#43;")
    text_qul += "send_rectors_f=1&id_send=" + id + "&text_rectors=" + text
    $(".modul_box_otv").addClass("display_none");
    $("#block_ri_s_" + id).remove();
    ajx(text_qul)

}

function ot_mi_rector_send_m() {
    let name = $("#firstName_block_send_r").val();
    let first_name = $("#name_block_send_r").val();
    let last_name = $("#lastName_block_send_r").val();

    let lis = name + "=" + first_name + "=" + last_name;
    let thema_teksta = $("#thema_teksta").val();
    let textarea_box_text = $("textarea#textarea_box_text").val();


    text = "GLA_all/send_rectors_mi_f=1&name=" + lis + "&them=" + thema_teksta + "&text=" + textarea_box_text.replace("+", "&#43;")

    ajx(text)
}

function admins_button_l(i) {

    ajx("GLA_all/admin_element_f=1&doint=" + i)
}