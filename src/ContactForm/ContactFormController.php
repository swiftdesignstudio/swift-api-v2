<?php

namespace SwiftDesign\Api\ContactForm;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

//Import API Traits 
use SwiftDesign\Api\Traits\ApiTrait;

class ContactFormController extends Controller
{
    use ApiTrait;

    public function SubmitContactForm(Request $request)
    {
        $view_location = '/contact';

        //Need validation OR g-recaptcha 
        if(strlen(getenv('NOCAPTCHA_SITEKEY')) > 1 )
        {
            $this->validate($request, [
                'g-recaptcha-response' => 'required|captcha'
            ]);
        }

        $response = $this->submitForm($request);

        return redirect($view_location);
    }

    public function submitForm($data)
    {
        $form = array([
            'user_public_key' => $this->getClientPublicKey(),
            'requestor_name' => $data->name,
            'requestor_email' => $data->email,
            'requestor_phone' => $data->phone,
            'requestor_subject' => $data->subject,
            'requestor_message' => $data->message,
            'requestor_message2' => '',
            'requestor_message3' => '',
            'requestor_message4' => '',
            'requestor_message5' => '',
        ]);

        $value = $this->CallSwiftAPI('request/client/submit/contactform',$form);
        
        return 'true';        
    }
    
}
