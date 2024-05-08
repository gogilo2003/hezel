import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    build: {
        outDir: '../public_html/build'
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
            // buildDirectory: '../public_html/build',
            hotFile: '../public_html/hot'
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
