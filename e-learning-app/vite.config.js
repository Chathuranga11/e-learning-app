import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js', // JavaScript file
                'resources/css/app.css', // Default CSS
                'resources/css/sidebars.css', // Add this line
            ],
            refresh: true,
        }),
    ],
});
