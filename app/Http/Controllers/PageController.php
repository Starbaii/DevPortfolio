<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $name = "Andrei James C. Bendicio";
        $role = "Full-Stack Web Developer";
        return view('pages.home', compact('name', 'role'));
    }

    public function about()
    {
        $skills = ['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'MySQL', 'Tailwind CSS'];
        $bio = "I'm a passionate developer who loves building web applications.";
        return view('pages.about', compact('skills', 'bio'));
    }

    public function projects()
    {
        $projects = [
            ['id' => 1, 'title' => 'E-Commerce App', 'tech' => 'Laravel + Vue'],
            ['id' => 2, 'title' => 'Task Manager', 'tech' => 'Laravel + Livewire'],
            ['id' => 3, 'title' => 'Weather Dashboard', 'tech' => 'JavaScript API'],
            ['id' => 4, 'title' => 'Blog Platform', 'tech' => 'Laravel'],
        ];
        return view('pages.projects', compact('projects'));
    }

    public function projectDetail($id)
    {
        $projects = [
            1 => ['title' => 'E-Commerce App', 'description' => 'A full-featured online store.', 'tech' => 'Laravel + Vue'],
            2 => ['title' => 'Task Manager', 'description' => 'Productivity tool for teams.', 'tech' => 'Laravel + Livewire'],
            3 => ['title' => 'Weather Dashboard', 'description' => 'Real-time weather data.', 'tech' => 'JavaScript API'],
            4 => ['title' => 'Blog Platform', 'description' => 'Markdown-powered blog.', 'tech' => 'Laravel'],
        ];

        abort_if(!isset($projects[$id]), 404);
        $project = $projects[$id];
        return view('pages.project-detail', compact('project', 'id'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // In real app, save to DB or send email
        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
