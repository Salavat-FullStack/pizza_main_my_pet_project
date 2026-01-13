document.addEventListener('DOMContentLoaded', () => {
    const auth = document.querySelector('.auth_btn');

    const token = localStorage.getItem('authToken');

    if(token){
        auth.textContent = 'Профиль';
    }
});
