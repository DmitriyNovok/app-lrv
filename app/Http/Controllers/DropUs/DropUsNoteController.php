<?php

namespace App\Http\Controllers\DropUs;

use App\Http\Controllers\Controller;
use App\Mail\DropUsNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DropUsNoteController extends Controller
{
    public function sendNote(Request $request)
    {
        $message = $request->all();
        Mail::to($message['user_email'])->send(new DropUsNote($message));
    }
}
