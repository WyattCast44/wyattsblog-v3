<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function index()
    {
        view()->share('pageMeta', [
            'title' => 'Projects',
            'description' => 'Check out some of the projects I\'m currently working on!',
        ]);

        return view('projects.index');
    }

    public function show()
    {
        view()->share('pageMeta', [
            'title' => 'My Project',
        ]);

        return view('projects.show.index');
    }
}
