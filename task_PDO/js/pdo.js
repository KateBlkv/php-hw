"use strict";

document.forms.signin.addEventListener('submit',
    function (event){
        event.preventDefault();
        let login = this.elements['login'].value.trim();
        let psw = this.elements['psw'].value.trim();
        fetch('check_login.php', {
            method: 'post',
            body: new FormData(this)
            })
            .then(response => response.json())
            .then(text =>{
                let answer=document.getElementById("answer");
                if (text){
                    location.replace('account.php');
                }else {
                    answer.innerHTML=`
                        <p>Вы не авторизировалиись!</p>
                   `;
                }
            });
        }
    );