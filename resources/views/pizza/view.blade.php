<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
        'resources/css/nav.css',
        'resources/css/main.css',
        'resources/css/pizza.css',
        'resources/js/nav.js',
        'resources/js/pizza.js',
        'resources/js/shope.js',
        'resources/js/shope_function.js'
    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>{{ $pizza['name'] }}</title>
</head>
<body>
    <div class="main_container">
        @include('partials.nav', ['type' => 'default'])
        
        <div class="pizza_container">
            <div class="pizza_image"><img src="{{ asset($pizza['image']) }}" alt="image"></div>
            <div class="pizza_information">
                <div class="pizza_title">{{ $pizza['name'] }}</div>
                <div class="mini_inform">
                    <div class="pizza_size">{{ $pizza['size']['name'] }},</div> 
                    <div class="thicknesses">{{ $pizza['finelThicknesses']['thickness'] }} тесто,</div>
                    <div class="thicknesses">{{ $pizza['quantity'] }} шт,</div>
                    <div class="pizza_calories">{{ $pizza['finelCalories'] }} ккал,</div>
                    <div class="weight">{{ $pizza['finelWeight'] }} г</div>
                </div>
                <h2 class="price_pizza">Цена: {{ $pizza['finelPrice'] }} руб.</h2>
                <div class="pizza_panel" data-size='@json($pizza)'>
                    <div class="panel_size">
                        @foreach ($pizza['sizes'] as $size)
                            <div class="panel_btn">{{ $size['name'] }}</div>
                        @endforeach
                    </div>
                    <div class="panel_thicknesses">
                        @foreach ($pizza['thicknesses'] as $thicknes)
                            <div class="panel_thick_btn">{{ $thicknes['thickness'] }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="ingredients_container">
                    <div class="ingredients_title">Ингредиенты</div>
                    <div class="card_container">

                        @foreach ($pizza['ingredients'] as $ingredient)
                            <div class="ingredient_card">
                                <div class="card_image"><img src="{{ asset($ingredient['image']) }}" alt="ingredient_img"></div>
                                <div class="card_inform">
                                    <div class="card_title">{{ $ingredient['name'] }}</div>
                                    <div class="card_price">{{ $ingredient['finelPrice'] }} ₽</div>
                                </div>
                                <div class="card_panel">
                                    <div class="card_plus">+</div>
                                    <div class="card_counter">{{ $ingredient['quantity'] }}</div>
                                    <div class="card_minus">-</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="btn_add_shope">Добавить в корзину!</div>
            </div>
        </div>
    </div>
</body>
</html>