import { loginUser } from "../shope_function";

document.addEventListener('DOMContentLoaded', () => {
    const btnForm = document.querySelector('.btn_form');
    const inputBox = document.querySelectorAll('.register_input_box');

    const formData = {
        'email' : '',
        'password' : '',
        'token': ''
    }

    btnForm.addEventListener('click',()=>{
        inputBox.forEach((elem)=>{
            const input = elem.querySelector('input');
            
            formData[input.id] = input.value;
            console.log(formData[input.id]);
        });
        console.log(localStorage.getItem('authToken'));
        if(localStorage.getItem('authToken')){
            const token = localStorage.getItem('authToken');

            formData.token = token;
        }
        
        loginUser(formData);
    });


});