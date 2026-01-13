document.addEventListener('DOMContentLoaded', () => {

const token = document.querySelector('meta[name="csrf-token"]').content;
console.log(token);

const productBlock = document.querySelector('.product_block');
const productData = JSON.parse(productBlock.dataset.product_block);
// const productPrice = document.querySelector('.product_price');
console.log('productData');
console.log(productData);

const productCards = document.querySelectorAll('.product_card');

productCards.forEach(card =>{
    const productMinuses = card.querySelector('.product_minus');
    const productPluses = card.querySelector('.product_plus');
    const pizzaName = card.querySelector('.pizza_name');
    const productCounter = card.querySelector('.product_counter');
    const productPrice = card.querySelector('.product_price');
    const imgContainer = card.querySelector('.img_container');

    console.log(imgContainer);

    const thisData = productData.filter(el => el.name == pizzaName.textContent)[0];

    imgContainer.addEventListener('click',()=>{
        setSessionPizza(thisData);
    })

    productPluses.addEventListener('click',()=>{
        console.log(thisData);
        thisData.finelPrice = 0;
        thisData.finelWeight = 0;

        thisData.quantity++;
        thisData.ingredients.forEach(el =>{
            el.quantity++;
            el.finelPrice = +el.price * el.quantity;
            el.finelCalories = +el.calories * el.quantity;
            el.finelWeight = +el.weight * el.quantity;
            thisData.finelWeight += +el.finelWeight;
        });
        // console.log(thisData.ingredients);

        thisData.ingredients.forEach(el =>{
            thisData.finelPrice += +el.price * el.quantity;
        })  
        // console.log(thisData.finelPrice);

        productCounter.textContent = thisData.quantity;
        productPrice.textContent = `от ${ thisData.finelPrice } ₽`;
    })

    productMinuses.addEventListener('click',()=>{
        console.log(thisData);

        if(thisData.quantity > 1){
            thisData.finelPrice = 0;
            thisData.finelWeight = 0;

            thisData.quantity--;
            thisData.ingredients.forEach(el =>{
                el.quantity--;
                el.finelPrice = +el.price * el.quantity;
                el.finelCalories = +el.calories * el.quantity;
                el.finelWeight = +el.weight * el.quantity;
                thisData.finelWeight += +el.finelWeight;;
            });
            // console.log(thisData.ingredients);

            thisData.ingredients.forEach(el =>{
                thisData.finelPrice += +el.price * el.quantity;
            })  
            // console.log(thisData.finelPrice);

            productPrice.textContent = `от ${ thisData.finelPrice } ₽`;
        }
        productCounter.textContent = thisData.quantity;
    })
})


async function setSessionPizza(pizza) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/pizza/view';

    const tokenInput = document.createElement('input');
    tokenInput.type = 'hidden';
    tokenInput.name = '_token';
    tokenInput.value = document.querySelector('meta[name="csrf-token"]').content;
    form.appendChild(tokenInput);

    const pizzaInput = document.createElement('input');
    pizzaInput.type = 'hidden';
    pizzaInput.name = 'pizza';
    pizzaInput.value = JSON.stringify(pizza);
    form.appendChild(pizzaInput);

    document.body.appendChild(form);
    form.submit();
}


});