export function addShope(pizzaData){
        fetch('http://localhost:1000/api/add-shope', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                // 'Authorization': `Bearer ${token}`
            },
            credentials: 'include',
            body: JSON.stringify({ pizzaData: pizzaData })
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) { // если статус не 200-299
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }

            console.log('Ответ сервера на добовление корзины:', data);
            allShope();
        })
        .catch(err => console.error('Ошибка:', err));
}

export async function allShope() {
    // console.log('function allShope token = ', token);
    try {
        const response = await fetch('http://localhost:1000/api/all-shope', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            credentials: 'include'
        });

        const data = await response.json();

        if (!response.ok) {
            console.error('Ошибка сервера:', data);
            alert(data.message || 'Ошибка регистрации');
            return;
        }

        console.log('Ответ сервера просмотр корзины:', data);

        returnDataLength(data);

        return data;

    } catch (err) {
        console.error('Ошибка:', err);
    }
}

export async function loginUser(formData) {
    try {
        const response = await fetch('http://localhost:1000/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            credentials: 'include',
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        if (!response.ok) {
            console.error('Ошибка сервера:', data);
            alert(data.message || 'Ошибка авторизации');
            return;
        }

        console.log("set-cookie ");
        console.log(data);

        const setCookieResponse = await fetch('http://localhost:1500/api/set-cookie', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'include',
            body: JSON.stringify(data)
        });

        if (!setCookieResponse.ok) {
            throw new Error('Ошибка установки cookie');
        }

        const userData = await returnUserData();

        console.log('USER DATA:', userData);

        const setCookieUserData = await fetch('http://localhost:1500/api/set-cookie',{
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            credentials: 'include',
            body: JSON.stringify(userData)
        })

        if (!setCookieUserData.ok) {
            throw new Error('Ошибка установки cookie');
        }

    } catch (err) {
        console.error('Ошибка:', err);
    }
}

export async function returnUserData() {
    const response = await fetch('http://localhost:1000/api/returnUser', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include'
    });

    const data = await response.json();

    if (!response.ok) {
        console.error('Ошибка сервера /api/returnUser', data);
        throw new Error(data.message || 'Ошибка получения пользователя');
    }

    console.log('/api/returnUser', data);
    return data;    
}

export async function returnDataLength(data){
    console.log(data.length);
    const basket = document.querySelector('.basket');

    const basketLength = document.createElement('p');
    basketLength.classList.add('basket_length');
    basketLength.textContent = data.length;

    basket.appendChild(basketLength);
}
