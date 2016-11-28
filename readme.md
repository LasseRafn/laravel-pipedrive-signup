## Laravel Pipedrive Signup

#Installation

1. Require using composer
````
composer require lasserafn/laravel-pipedrive-signup
````
2. Add the PipedriveSignupServiceProvider to your ````config/app.php```` providers array.
````
'providers' => [
    \LasseRafn\PipedriveSignup\PipedriveSignupServiceProvider::class,
]
````