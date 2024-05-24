<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function blog()
    {
        return view('blog');
    }

    public function candidate()
    {
        return view('candidate');
    }

    public function contact()
    {
        return view('contact');
    }

    public function elements()
    {
        return view('elements');
    }

    public function fieldworkDetails()
    {
        return view('fieldwork_details');
    }

    public function fieldworks()
    {
        return view('fieldworks');
    }

    public function jobDetails()
    {
        return view('job_details');
    }

    public function jobs()
    {
        return view('jobs');
    }

    public function singleBlog()
    {
        return view('single-blog');
    }
}
