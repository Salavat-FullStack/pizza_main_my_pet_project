import { allShope, addShope } from './shope_function.js';

document.addEventListener('DOMContentLoaded', async () => {

    const addShopeBtn = document.querySelector('.btn_add_shope');

    let token = localStorage.getItem('authToken');

    console.log(token);

    const pizzaData = await allShope(token);

    console.log('shope allShope result', pizzaData);

    if(addShopeBtn){
        addShopeBtn.addEventListener('click',()=>{
            const pizzaData = returnData();
            console.log(pizzaData);

            fetch('http://localhost:1000/api/me', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    credentials: 'include',
                })
            .then(async response => {
                const data = await response.json();

                if (!response.ok) { // если статус не 200-299
                    console.error('Ошибка сервера:', data);
                    alert(data.message || 'Ошибка регистрации');
                    return;
                }

                console.log('Ответ сервера:', data);

                // document.cookie = "authToken=123456; path=/; max-age=2592000";

                addShope(pizzaData);
            })
            .catch(err => console.error('Ошибка:', err));
        });
    }



});
