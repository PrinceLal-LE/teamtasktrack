import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
            'resources/css/homePageStyle.css',
            'resources/js/app.js',
            'resources/js/homePageJavaScriptCode.js'],
            refresh: true,
        }),
    ],
});
