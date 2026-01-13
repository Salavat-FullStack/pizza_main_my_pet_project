document.addEventListener('DOMContentLoaded', () =>{
    fetch('http://localhost:1000/api/returnUser',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        credentials: 'include',
    }).then(async response => {
        const data = await response.json();

        if (!response.ok) { // если статус не 200-299
            console.error('Ошибка сервера:', data);
            alert(data.message || 'Ошибка регистрации');
            return;
        }

        // await fetch('http://localhost:1500/api/set-cookie', {
        //     method: 'POST',
        //     headers: { 'Content-Type': 'application/json' },
        //     credentials: 'include', 
        //     body: JSON.stringify(data)
        // });

        console.log('Ответ сервера:', data);
    })
    .catch(err => console.error('Ошибка:', err));
});