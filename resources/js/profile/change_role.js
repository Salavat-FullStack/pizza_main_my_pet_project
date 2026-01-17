import { returnUserData } from '../shope_function.js';

document.addEventListener('DOMContentLoaded',()=>{
    const role_desc = {
        'Админ' : 'Роль администратора позволит изменять и удалять товары и продукты, банить пользователей, редактировать товарные карточки продавцов, а также назначать новых продавцов.',
        'Продавец' : 'Роль продавца позволит создавать собственные карточки товаров и продавать свои товары в магазине.'
    }

    const admin_btn = document.querySelector('.admin_btn');
    const seller_btn = document.querySelector('.seller_btn');

    const role_description = document.querySelector('.description');

    // console.log(returnUserData());

    admin_btn.addEventListener('click',()=>{
        const desc = admin_btn.textContent;

        role_description.textContent = role_desc[desc];
    });

    seller_btn.addEventListener('click',()=>{
        const desc = seller_btn.textContent;

        role_description.textContent = role_desc[desc];
    });

});
