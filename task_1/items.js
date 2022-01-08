"use strict"

//отправляет запрос на сервер со стороны js , по умолчанию get-запрос
// указываем куда отправляем запрос
fetch('items.php').then(items => items.json()).then(data => {
    console.log(data);
    let items = data.items;
    items.forEach(item => {
        let div = document.createElement('div');
        div.innerHTML = `
            <h3> ${item.title} </h3> 
            <img height="300" src="images/${item.img}">
            <p>Цена: ${item.price}</p>
            <p>Цвет: ${item.description.color}</p>
            <p>Материал: ${item.description.material}</p>
        `;
        document.getElementById('items').append(div);
    })
})
