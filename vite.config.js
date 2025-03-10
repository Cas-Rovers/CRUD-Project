import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/admin/css/app.css',
                'resources/assets/admin/js/app.js',
                'resources/assets/frontend/css/app.css',
                'resources/assets/frontend/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
