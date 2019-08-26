<?php
/*
|--------------------------------------------------------------------------
| ContactForm API Routes
|--------------------------------------------------------------------------
*/


Route::post('/contact-form/submit', 'SwiftDesign\Api\ContactForm\ContactFormController@SubmitContactForm');