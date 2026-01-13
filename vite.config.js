import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/nav.css',
                'resources/css/filtr.block.css',
                'resources/css/main.css',
                'resources/css/product_block_card.css',
                'resources/css/pizza.css',
                'resources/css/auth/register.css',
                'resources/css/auth/login.css',
                'resources/css/registr_pizza.css',
                'resources/css/profile/profile.css',
                'resources/css/profile/change_avatar_modal.css',
                'resources/js/nav.js', 
                'resources/js/pizza.js', 
                'resources/js/filter.block.js',
                'resources/js/sorting.js',
                'resources/js/product_block_card.js',
                'resources/js/auth/register.js',
                'resources/js/auth/login.js',
                'resources/js/shope.js',
                'resources/js/registr_pizza.js',
                'resources/js/shope_function.js',
                'resources/js/profile/profile.js',
                'resources/js/profile/change_avatar.js'
            ],
            refresh: true,
        }),
    ],
});
