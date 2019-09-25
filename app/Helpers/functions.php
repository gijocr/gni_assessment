<?php

if (!function_exists('successMessage')) {
    function successMessage()
    {
        return back()
            ->with([
                'success' => 'Data saved successfully.'
            ]);
    }
}

if (!function_exists('errorMessage')) {
    function errorMessage()
    {
        return back()
            ->with([
                'danger' => 'Error trying to save data. Please try again in a few moments.'
            ])
            ->withInput();
    }
}
