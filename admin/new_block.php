<? headers("Блок с новостями");
?>

<div>
    <p>Новая запись</p>

    <input type="text" placeholder="Напишите заголовок">
    <textarea name="" id="text_no_arr" cols="30" rows="10" placeholder="Напишите новость"></textarea>
    <select name="" id="select_cher">
        <option value="vuz">Жизнь ВУЗа </option>
        <option value="uch_now">Учебные новости</option>
        <option value="soc_live">Социальная жизнь</option>
    </select>

    <input type="file" name="" id="file_box" placeholder="Загрузить кратинку">

    <button onclick="Lest_so_f_mi()">Опубликовать</button>
</div>
<? foter();
?>