<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
     public function index()
    {
        $messages = [
            ['id' => 1, 'from' => 'Alice', 'subject' => 'Project Inquiry', 'date' => '2025-01-10'],
            ['id' => 2, 'from' => 'Bob', 'subject' => 'Collaboration', 'date' => '2025-01-11'],
            ['id' => 3, 'from' => 'Carol', 'subject' => 'Freelance Work', 'date' => '2025-01-12'],
        ];
        return view('dashboard.messages', compact('messages'));
    }
}
