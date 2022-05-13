<?php
 namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Validation\ValidationException;
 use MailchimpMarketing\ApiClient;
 class newsletter{

    public function subscribe(string $email, string $list=null)
    {
        $list??=config('services.mailchimp.lists.subscribed');

        return $this->client()->lists->addListMember($list, [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    }

    public function client(){
        $mailchimp = new ApiClient();
    
        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
    }
 }

?>