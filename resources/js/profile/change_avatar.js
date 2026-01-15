document.addEventListener('DOMContentLoaded',()=>{
    const avatarFormBtn = document.getElementById('avatarFormBtn');

    document.getElementById('avatar').addEventListener('change', function (e) {
        const file = e.target.files[0];

        if (!file) return;

        const img = document.getElementById('img_avatar');
        img.src = URL.createObjectURL(file);
    });

    avatarFormBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        
        const fileInput = document.getElementById('avatar');

        console.log(fileInput);

        const formData = new FormData();
        formData.append('avatar', fileInput.files[0]);

        fetch('http://localhost:1000/api/updateAvatar',{
            method: 'POST',
            body: formData,
            credentials: 'include',
        }).then(async response => {
            const data = await response.json();

            if (!response.ok) {
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }

            await fetch('http://localhost:1500/api/set-cookie', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                credentials: 'include', // важно для установки cookie
                body: JSON.stringify(data)
            });

            window.location.reload();

            console.log('Ответ сервера:', data);
        })
        .catch(err => console.error('Ошибка:', err));
    })

});