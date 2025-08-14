<?php

if (! function_exists('vite_asset')) {
    function vite_asset($entry, $type = 'file')
    {
        $manifestPath = public_path('build/manifest.json');

        if (! file_exists($manifestPath)) {
            return null; // or throw an error
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (! isset($manifest[$entry])) {
            return null;
        }

        if ($type === 'css') {
            return asset('build/' . $manifest[$entry]['css'][0]);
        }

        return asset('build/' . $manifest[$entry]['file']);
    }
}
