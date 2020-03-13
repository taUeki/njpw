<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\TestMail;

class TestMailController extends Controller
{
    public function send()
    {
        return Mail::to('t.k.xxskt@gmail.com')->send(new TestMail());
    }
}
