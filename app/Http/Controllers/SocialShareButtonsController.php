<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            url()->current(),
            'Have a look at this medicine !',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        return view('posts', compact('shareComponent'));
    }
}
