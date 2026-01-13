document.addEventListener('DOMContentLoaded', () => {
    const btnForm = document.querySelector('.btn_form');
    const inputBox = document.querySelectorAll('.register_input_box');

    const formData = {
        'name' : '',
        'email' : '',
        'password' : '',
    }

    btnForm.addEventListener('click',()=>{
        inputBox.forEach((elem)=>{
            const input = elem.querySelector('input');
            
            formData[input.id] = input.value;
            console.log(formData[input.id]);
        });
        fetch('http://localhost:1000/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) { // если статус не 200-299
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }

            console.log('Ответ сервера:', data);

            if (data.token) {
                localStorage.setItem('authToken', data.token);
            }
        })
        .catch(err => console.error('Ошибка:', err));
    });
});