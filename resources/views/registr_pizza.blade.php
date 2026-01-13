<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
        'resources/css/nav.css',
        'resources/js/nav.js',
        'resources/css/main.css',
        'resources/css/product_block_card.css',
        'resources/css/registr_pizza.css',
        'resources/js/shope.js',
        'resources/js/registr_pizza.js',
    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    
    <title>Оформление заказа</title>
</head>
<body>

    <div class="main_container">
        @include('partials.nav', ['type' => 'register_pizza'])
        <h2 class="main_title">Оформление заказа</h2>
        <div class="registr_pizza_block">

            <div class="basket_contain">
                <div class="basket_contain_panel">
                    <h3>1. Корзина</h3>
                    <div class="btn_clear_basket">
                        <img src="{{ asset('images/icons/basket.png') }}" alt="clear">
                        <p>Очистить корзину</p>
                    </div>
                </div>
                <div class="basket_block">
                    @php
                        $productPrice = 0;
                        $finelPrice = 0;
                        $tax = 0;
                        $addresPrice = 200;
                    @endphp
                    @foreach ($data as $item)

                        @php
                            $thickness = $item['finelThicknesses']['thickness'] . ' тесто';
                            $size = $item['size']['name'] . ' ' . $item['size']['cm'] . ' cm' . ', ';
                            $description = $size . $thickness;
                            $productPrice += $item['finelPrice'];
                            $tax = round($productPrice / 10);
                            $finelPrice = $productPrice + $tax + $addresPrice;
                        @endphp

                        <div class="basket_card">
                            <div class="card_img">
                                <img src="{{ asset($item['image']) }}" alt="image-pizza">
                            </div>
                            
                            <div class="card_inform">
                                <div class="card_title">{{ $item['name'] }}</div>
                                <div class="card_description">{{ $description }}</div>
                            </div>

                            <div class="card_price">
                                {{ $item['finelPrice'] }} ₽ 
                            </div>

                            <div class="card_panel">
                                <div class="card_minus">
                                    <img src="{{ asset('images/icons/minus.png') }}" alt="minus">
                                </div>
                                <div class="card_quantity">
                                    {{ $item['quantity'] }}
                                </div>
                                <div class="card_plus">
                                    <img src="{{ asset('images/icons/plus.png') }}" alt="plus">
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="person_inform_contain">

                <div class="basket_contain_panel">
                    <h3>2. Персональная информация</h3>
                </div>

                <div class="form_container">
                    <div class="input_form input_name">
                        <p>Имя</p>
                        <input type="text" id="basket_name">
                    </div>
                    <div class="input_form input_surname">
                        <p>Фамилия</p>
                        <input type="text" id="basket_surname">
                    </div>
                    <div class="input_form input_mail">
                        <p>E-Mail</p>
                        <input type="text" id="basket_mail">
                    </div>
                    <div class="input_form input_telephone">
                        <p>Телефон</p>
                        <input type="tel" id="basket_telephone">
                    </div>
                </div>

            </div>

            <div class="address_contain">

                <div class="basket_contain_panel">
                    <h3>3. Адрес доставки</h3>
                </div>

                <div class="address_content">
                    <div class="address_form">
                        <div class="input_form input_adress">
                            <p>Введите адрес</p>
                            <input type="text" id="address">
                        </div>
                        <div class="input_form input_comment">
                            <p>Комментарий к заказу</p>
                            <input type="text" id="address_comment">
                        </div>
                    </div>
                </div>

                <div class="address_time">
                    <div class="input_form input_adress">
                        <p>Время доставки</p>
                        <input type="text" id="addres_input" placeholder="00:00">
                    </div>
                </div>

            </div>


            <div class="total_contain">
                <div class="total_inform">
                    <p>Итого:</p>
                    <h3>{{ $finelPrice }} ₽</h3>
                    <div class="check_inform">
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/check_price.png') }}" alt=""></div>
                                Стоимость товаров:
                            </div>
                            <div class="check_price finel_price_value">{{ $productPrice }} ₽</div>
                        </div>
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/ckeck_tax.png') }}" alt=""></div>
                                Налоги:
                            </div>
                            <div class="check_price tax_value">{{ $tax }} ₽</div>
                        </div>
                        <div class="check_item">
                            <div class="item_title">
                                <div class="check_icon"><img src="{{ asset('images/icons/ckeck_delivery.png') }}" alt=""></div>
                                Доставка:
                            </div>
                            <div class="check_price address_value">{{ $addresPrice }} ₽</div>
                        </div>
                    </div>

                    <div class="promokod">
                        У меня есть промокод
                    </div>

                    <button class="payment_btn">Перейти к оплате</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.registerPizzaData = @json($data);
    </script>
</body>
</html>