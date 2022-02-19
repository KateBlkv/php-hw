"use strict";

document.forms.signin.addEventListener('submit',
    function (event){
        event.preventDefault();
        const data = new FormData()
        data.set('login', this.elements['login'].value.trim());
        data.set('pwd', this.elements['psw'].value.trim());

        fetch('check_login.php', {
            method: 'post',
            body: data
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