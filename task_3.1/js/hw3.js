"use strict";
// При нажатии на ссылку 'Личный кабинет' открыть модальное окно с формой авторизации. Когда пользователь
// заполнит форму проверить, чтобы поля были заполнены и отправить данные на сервер аякс запросом
// (POST запрос). На сервере написать функцию проверки входящих данных, если логин пользователя 'qwe' и
// пароль '123', пользователь успешно авторизован, в противном случае, пользователю не удалось авторизоваться.
// Сервер должен вернуть соответствующую информацию клиенту. Если пользователь авторизован необходимо закрыть
// модальное окно, если нет, вывести информацию об этом в текущем модальном окне.

function setError(elem, key, elem2) {
    let messages = {
        valueMissing: 'Поле должно быть заполнено',
        tooShort: `Минимальное количество символов ${elem.minLength}`,
        tooLong: `Максимальное количество символов ${elem.maxLength}`,
        rangeUnderflow: `Минимальное количество символов ${elem.minLength}`,
        rangeOverflow: `Максимальное количество символов ${elem.maxLength}`

    };
    document.getElementById(elem2).innerText = messages[key];
    /*elem.nextElementSibling.className = 'message error active';*/
}
const registrationForm = document.forms.auth;
registrationForm.elements.login.addEventListener('input'/*можно keyup*/, function (){
    /*document.getElementById("added").innerText='';*/
    if (this.validity.valueMissing) setError(this, 'valueMissing',"msg1");
    else if (this.validity.tooShort) setError(this, 'tooShort',"msg1");
    else if (this.validity.tooLong) setError(this, 'tooLong', "msg1");
    else  document.getElementById("msg1").innerText='';
})

registrationForm.elements.password.addEventListener('input'/*можно keyup*/, function (){
    /*document.getElementById("added").innerText='';*/
    if (this.validity.valueMissing) setError(this, 'valueMissing',"msg2");
    else if (this.validity.tooShort) setError(this, 'tooShort',"msg2");
    else if (this.validity.tooLong) setError(this, 'tooLong', "msg2");
    else  document.getElementById("msg2").innerText='';
})

/*registrationForm.addEventListener('submit', function (event) {
    event.preventDefault();

    // this ссылка на document.forms.lesson
    let task={};
    let success = 0;
    let inTask = registrationForm.elements.task;
    if (inTask.validity.valueMissing || inTask.validity.tooShort || inTask.validity.tooLong) {
        document.getElementById("msg1").innerText ="Поле заполнено некорректно";

    } else {
        document.getElementById("msg1").innerText=''
        success+=1;
        task.name = inTask.value;
    }

    let description = registrationForm.elements.description;
    if (description.validity.valueMissing) {
        document.getElementById("msg2").innerText ="Поле заполнено некорректно";

    } else {
        document.getElementById("msg2").innerText=''
        success+=1;
        task.description = description.value;
    }

    const value = new Date(registrationForm.elements.date.value)
    value.setMinutes(value.getMinutes() + value.getTimezoneOffset())
    console.log(value.getTime());
    const now = new Date()
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())

if ((value.getTime() < today.getTime()) || !value.getTime()) {
    document.getElementById("msg3").innerText='Введите дату корректно';
} else {
    success+=1;
    task.day = value.getTime();
    document.getElementById("msg3").innerText='';
}
console.log(task);
if (success===3) {
    task.id = counter;
    counter+=1;
    document.getElementById("added").innerText='Задание добавлено';


    let getTask = JSON.parse(localStorage.getItem("tasks"));
    getTask.push(task)
    console.log(getTask);

    localStorage.setItem("tasks", JSON.stringify(getTask));


}


});
*/

document.forms.auth.addEventListener('submit', function (event){
    event.preventDefault();
    //проверки
    let task={};
    let success = 0;
    let inTask = registrationForm.elements.login;
    if (inTask.validity.valueMissing || inTask.validity.tooShort || inTask.validity.tooLong) {
        document.getElementById("msg1").innerText ="Поле заполнено некорректно";

    } else {
        document.getElementById("msg1").innerText=''
        success+=1;
        task.name = inTask.value;
    }
    inTask = registrationForm.elements.password;
    if (inTask.validity.valueMissing || inTask.validity.tooShort || inTask.validity.tooLong) {
        document.getElementById("msg2").innerText ="Поле заполнено некорректно";

    } else {
        document.getElementById("msg2").innerText=''
        success+=1;
        task.name = inTask.value;
    }

    if (success===2) {
    // fetch('куда') - достаточно для get-запроса
    fetch('hw3.php', {
        method:'post',
        body: new FormData(this) // в теле сообщения переданы данные из текущей формы
    })
        .then(response => response.text())
        .then(text => {
            const content = document.getElementById("popup_content");
            if (text === true) {
                content.innerText =`Авторизация прошла успешно!`;
            } else {
                content.innerText =`У нас зарегистрирован один пользователь, и это не вы =(`;
            }
        })
}});
