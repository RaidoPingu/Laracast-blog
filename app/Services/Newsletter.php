<?php

namespace App\Services;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {

        $list ??= config('services.mailchimp.list');

        return $this->client()->lists->addListMember(config('services.mailchimp.list'), [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }

    protected function client()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'YOUR_SERVER_PREFIX'
        ]);
    }
}
