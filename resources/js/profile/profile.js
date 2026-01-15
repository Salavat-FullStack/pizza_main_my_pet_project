document.addEventListener('DOMContentLoaded', () =>{
    let UserData;

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
        UserData = data;
    })
    .catch(err => console.error('Ошибка:', err));


    const closeModal = document.querySelector('.close_modal');
    const avatarModal = document.querySelector('.avatar_modal');
    const avatarImg = document.getElementById('img_avatar');

    closeModal.addEventListener('click', ()=>{
        avatarModal.classList.add('display_none');
        const src = 'http://localhost:1000' + UserData.tokenValue.avatar;
        avatarImg.src = src;
    });

    const changeAvatar = document.querySelector('.change_avatar');
    
    changeAvatar.addEventListener('click', ()=>{
        avatarModal.classList.remove('display_none');
    });
});