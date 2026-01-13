import { allShope } from './shope_function.js';

document.addEventListener('DOMContentLoaded', () => {
    console.log('window.registerPizzaData ', window.registerPizzaData);
    const data = window.registerPizzaData;

    const btnClear = document.querySelector('.btn_clear_basket');

    btnClear.addEventListener('click',()=>{
        fetch('http://localhost:1000/api/clear-basket',{
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
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

            allShope();

            console.log(data);
        })
    });

    // let finelPrice = 0;

    // data.forEach(elem => {
    //     finelPrice += (+elem['finelPrice']);
    // });

    // let tax = Math.round(+finelPrice / 10);

    // console.log(finelPrice);
    // console.log(tax);
    
    // const taxValue = document.querySelector('.tax_value');
    // taxValue.textContent = tax + ' ₽';
});