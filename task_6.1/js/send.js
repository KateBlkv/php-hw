"use strict";

document.forms['send-file'].addEventListener('submit', function(event){
    event.preventDefault();
    fetch('/send.php', {
        method:'post',
        body: new FormData(this)
    }).then(response => response.text()).then(text=> {
        let answer = document.querySelector('.answer');
        answer.innerHTML=text;
    })
})