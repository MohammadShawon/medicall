<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;

class MessageController extends Controller
{
    public function test() {
        Talk::setAuthUserId(auth()->user()->id);
        dd(Talk::sendMessageByUserId(1, 'Hello'));
    }
}
