<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // About Us Page
    public function about()
    { 
        return view('frontend.pages.about');
    }
    // Our Course Page
    public function course()
    { 
        return view('frontend.pages.course');
    }
    // Our Teams Page
    public function team()
    { 
        return view('frontend.pages.team');
    }
    // Contact Page
    public function contact()
    { 
        return view('frontend.pages.contact');
    }


    public function fetchcourse()
    {
        $courses = Course::latest()->get();
            return response()->json([
                'courses' => $courses
            ]);
        
    }

    public function courseAll()
    {
        return view('frontend.pages.course-all');

    }
}
