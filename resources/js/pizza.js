document.addEventListener('DOMContentLoaded', () => {
    const panelSize = document.querySelector('.panel_size');
    const panelBtn = panelSize.querySelectorAll('.panel_btn');
    const pizzaPanel = document.querySelector('.pizza_panel');

    const miniInform = document.querySelector('.mini_inform');

    const pizzaCalories = miniInform.querySelector('.pizza_calories');
    const pizzaWeight = miniInform.querySelector('.weight');
    const thicknesses = miniInform.querySelector('.thicknesses');
    const pizzaSize = miniInform.querySelector('.pizza_size');

    const pricePizza = document.querySelector('.price_pizza');

    const pizzaData = JSON.parse(pizzaPanel.dataset.size);

    let pizzaDataLocal = JSON.parse(JSON.stringify(pizzaData));

    console.log(pizzaDataLocal);

    panelBtn.forEach(btn =>{
        btn.classList.remove('panel_btn_active');

        if(btn.textContent == pizzaDataLocal['size']['name']){
            btn.classList.add('panel_btn_active');
        }

        btn.addEventListener('click',()=>{
            panelBtn.forEach(btn =>{
                btn.classList.remove('panel_btn_active');
            });
            btn.classList.add('panel_btn_active');

            let sizeValue = btn.textContent;
            pizzaDataLocal['size'] = pizzaDataLocal['sizes'].find(size => size.name == sizeValue);
            calcuSizePrice();
            redactionAttributeTxt('ingredients');
            redactionAttributeTxt('pizza');
        });
    });

    const panelThicknesses = document.querySelector('.panel_thicknesses');
    const panelThickBtn = panelThicknesses.querySelectorAll('.panel_thick_btn');

    panelThickBtn.forEach(btn =>{
        btn.classList.remove('panel_btn_active');

        if(btn.textContent == pizzaDataLocal['finelThicknesses']['thickness']){
            btn.classList.add('panel_btn_active');
        }

        btn.addEventListener('click',()=>{
            panelThickBtn.forEach(btn =>{
                btn.classList.remove('panel_btn_active');
            });
            btn.classList.add('panel_btn_active');

            let thicknessValue = btn.textContent;

            pizzaDataLocal['finelThicknesses'] = pizzaDataLocal['thicknesses'].find(thickness => thickness.thickness == thicknessValue);
            calculationPrice();
            redactionAttributeTxt('pizza');
        });
    });

    const ingredientCards = document.querySelectorAll('.ingredient_card');

    ingredientCards.forEach(elem => {
        const cardPlus = elem.querySelector('.card_plus');
        const cardMinus = elem.querySelector('.card_minus');
        const cardTitle = elem.querySelector('.card_title').textContent;
        const cardCounter = elem.querySelector('.card_counter');
        const cardPrice = elem.querySelector('.card_price');

        cardPlus.addEventListener('click',()=>{
            pizzaDataLocal['ingredients'].forEach(el =>{
                if(el['name'] == cardTitle){
                    el['quantity'] = el['quantity'] + 1;
                    calculationPrice();

                    cardCounter.textContent = el['quantity'];
                    cardPrice.textContent = el['finelPrice'] + ' ₽';
                }
            });
            redactionAttributeTxt('pizza');
        })
        cardMinus.addEventListener('click',()=>{
            pizzaDataLocal['ingredients'].forEach(el =>{
                if(el['name'] == cardTitle && el['quantity'] > 0){
                    el['quantity'] = el['quantity'] - 1;
                    calculationPrice();

                    cardCounter.textContent = el['quantity'];
                    cardPrice.textContent = el['finelPrice'] + ' ₽';
                }
            });
            redactionAttributeTxt('pizza');
        })
    })

    function calculationPrice(){
        pizzaDataLocal.finelPrice = 0;
        pizzaDataLocal.finelCalories = 0;
        pizzaDataLocal.finelWeight = 0;

        pizzaDataLocal['ingredients'].forEach(el =>{
            el.finelPrice = el.quantity * el.price;
            el.finelCalories = el.quantity * el.calories;
            el.finelWeight = el.quantity * el.weight;

            pizzaDataLocal.finelPrice += el.finelPrice;
            pizzaDataLocal.finelCalories += el.finelCalories;
            pizzaDataLocal.finelWeight += el.finelWeight;
        });

        pizzaDataLocal.finelCalories += (+pizzaDataLocal.finelThicknesses.calories);
        pizzaDataLocal.finelPrice += (+pizzaDataLocal.finelThicknesses.price);

        console.log(pizzaDataLocal);
    } 
    function calcuSizePrice(){
        // console.log('pizzaDataLocal ', pizzaDataLocal);

        if(+pizzaDataLocal['size']['increase'] > 0){
            pizzaDataLocal['ingredients'].forEach(el =>{
                el.quantity = Math.ceil(el.quantity * +pizzaDataLocal['size']['increase']);
            });
            calculationPrice(); 
        }else{
            pizzaDataLocal = JSON.parse(JSON.stringify(pizzaData));
            calculationPrice();
            // console.log('else', pizzaDataLocal);
        }
    }

    function redactionAttributeTxt(state){
        if(state == 'pizza'){
            pizzaCalories.textContent = pizzaDataLocal['finelCalories'] + ' ккал,';
            pricePizza.textContent = 'Цена: ' + pizzaDataLocal['finelPrice'] + ' руб.';
            pizzaWeight.textContent = pizzaDataLocal['finelWeight'] + ' г';
        }else if(state = 'ingredients'){
            ingredientCards.forEach(elem => {
                const cardCounter = elem.querySelector('.card_counter');
                const cardPrice = elem.querySelector('.card_price');

                pizzaDataLocal['ingredients'].forEach(el =>{
                    cardCounter.textContent = el['quantity'];
                    cardPrice.textContent = el['finelPrice'] + ' ₽';
                });
            });
        }
    }

    window.returnData = function() {
        return pizzaDataLocal;
    }

});