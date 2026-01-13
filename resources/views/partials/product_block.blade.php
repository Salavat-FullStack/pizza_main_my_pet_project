<div class="product_block"  data-product_block='@json($pizzas)'>

    @foreach ($pizzas as $pizza)
        @php
            $ingredients = $pizza->ingredients->pluck('name')->join(', ');
            // $weight = $pizza->ingredients->sum('weight');
            // $calories = $pizza->ingredients->sum('calories');
            
            // $pizza->ingredients = $ingredients;
            // $pizza->weight = $weight;
            // $pizza->calories = $calories;
        @endphp
    @endforeach 

    @foreach ($pizzas as $pizza)
        <div class="product_card">
            <div class="img_container">
                <img class="product_card_img" src="{{ asset($pizza->image) }}" alt="image">
            </div>
            <div class="product_inform_container">
                <h3 class="pizza_name">{{ $pizza->name }}</h3>
                <div class="deacription">
                    {{ $ingredients }}
                </div>
                <div class="product_price">
                    от {{ $pizza->price }} ₽
                </div>
            </div>
            <div class="product_panel">
                <div class="product_plus">+</div>
                <div class="product_counter">{{ $pizza->quantity }}</div>
                <div class="product_minus">-</div>
            </div>
        </div>
    @endforeach

</div>