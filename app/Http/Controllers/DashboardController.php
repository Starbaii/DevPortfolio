<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index()
    {
        $user = Auth::user();
        $stats = [
            'projects' => 12,
            'messages' => 5,
            'visitors' => 245,
        ];
        return view('dashboard.index', compact('user', 'stats'));
    }

    public function skills()
    {
        $skills = [
            ['name' => 'Laravel', 'level' => 90],
            ['name' => 'PHP', 'level' => 85],
            ['name' => 'JavaScript', 'level' => 80],
            ['name' => 'Tailwind CSS', 'level' => 88],
        ];
        return view('dashboard.skills', compact('skills'));
    }
    
    public function profileDetails()
{
    $user = Auth::user();
    $details = [
        'full_name' => $user->name,
        'email' => $user->email,
        'role' => 'Full-Stack Web Developer',
        'location' => 'Manila, Philippines',
        'bio' => 'Passionate developer building modern web apps with Laravel and Tailwind CSS.',
        'socials' => [
            ['platform' => 'GitHub', 'handle' => '@andreibendicio', 'url' => 'https://github.com'],
            ['platform' => 'LinkedIn', 'handle' => 'in/andreibendicio', 'url' => 'https://linkedin.com'],
            ['platform' => 'Twitter', 'handle' => '@andrei_dev', 'url' => 'https://twitter.com'],
        ],
    ];
    return view('dashboard.profile-details', compact('user', 'details'));
}

public function myProjects()
{
    $myProjects = [
        ['id' => 1, 'title' => 'E-Commerce App', 'tech' => 'Laravel + Vue', 'status' => 'Completed', 'visibility' => 'Public'],
        ['id' => 2, 'title' => 'Task Manager', 'tech' => 'Laravel + Livewire', 'status' => 'In Progress', 'visibility' => 'Private'],
        ['id' => 3, 'title' => 'Weather Dashboard', 'tech' => 'JavaScript API', 'status' => 'Completed', 'visibility' => 'Public'],
        ['id' => 4, 'title' => 'Blog Platform', 'tech' => 'Laravel', 'status' => 'Draft', 'visibility' => 'Private'],
    ];
    return view('dashboard.my-projects', compact('myProjects'));
}
}
