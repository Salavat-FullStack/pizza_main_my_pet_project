<div class="main_filter_block">
    <h2>Все пиццы</h2>

    <div class="filter_contain">
        <div class="filter_panel" data-filter='@json($filter)'>
            @for ($i = 0; $i < 7 && $i < count($filter); $i++)
                <div class="filtr_btn">{{ $filter[$i]['name'] }}</div>
            @endfor
            <div class="more_filter_btn">
                Ёще <img src="{{ asset('images/icons/Vector.png') }}" alt="more">
            </div>
            <div class="drop_menu_filter display_none"></div>
        </div>
        <div class="sorting_panel" data-sorting='@json($sorting)'>
            <img src="{{ asset('images/icons/sorting.png') }}" alt="sorting">
            Сортировка:
            <div class="sorting_text"></div>
        </div>
        <div class="drop_menu display_none"></div>

    </div>
</div>