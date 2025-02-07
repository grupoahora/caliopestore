import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Ruta a tu archivo CSS principal
                'resources/js/app.js',   // Ruta a tu archivo JS principal
            ],
            refresh: true,
        }),
    ],
});
