<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke()
    {
        $contacts = Setting::all();
        foreach ($contacts as $contact) {
            if ($contact->key == '_maps_link') {
                $maps = $contact->value;
            } elseif ($contact->key == '_location') {
                $location = $contact->value;
            } elseif ($contact->key == '_email') {
                $email = $contact->value;
            } elseif ($contact->key == '_phone') {
                $phone = $contact->value;
            } elseif ($contact->key == '_npsn') {
                $npsn = $contact->value;
            }
        }
        return view(
            'pages.contact.index',
            [
                'maps' => $maps,
                'location' => $location,
                'email' => $email,
                'phone' => $phone,
                'npsn' => $npsn,
            ]

        );
    }
}
