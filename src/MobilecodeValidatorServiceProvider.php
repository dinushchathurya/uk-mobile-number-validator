<?php

namespace Dinushchathurya\UKMobilecodeValidator;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Validation\Rule;

class MobilecodeValidatorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'mobile-validator');
        $this->registerUKMobilecodeRule();
    }

    public function registerUKMobilecodeRule()
    {
        Validator::extend('UKMobilecode', function ($attribute, $mobile) {
            return preg_match('/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/', $mobile);
        }, trans('mobile-validator::validation.mobile'));
    }
}