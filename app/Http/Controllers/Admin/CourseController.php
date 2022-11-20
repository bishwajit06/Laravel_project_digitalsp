<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.course.index', compact('courses'));
    }

    public function funnytest()
    {
        return view('admin.course.index', compact('courses'));
    }

    // public function fetchcourse()
    // {
    //     $courses = Course::all();
    //     return response()->json([
    //         'courses' => $courses,
    //     ]);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | unique:courses',
            'fees' => 'required',
            'duration' => 'required',
            'image' => 'image'

        ],
        [
            'name.unique' => 'Please provide a Unique Course name',
        ]

        );

        $course = new Course();

        
        // get from image
        $image = $request->file('image');
        $slug = Str::slug($course->title);
        if (isset($image))
        {
            // Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $courseImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check course directory is exists
            if (!Storage::disk('public')->exists('course'))
            {
                Storage::disk('public')->makeDirectory('course');
            }
            // Resize image for course and upload
            $categoryCourse = Image::make($image)->resize(350,230)->stream();
            Storage::disk('public')->put('course/'.$courseImageName,$categoryCourse);

        }else{
            $courseImageName = NULL;
        }


        $course->name = $request->name;
        $course->slug = Str::slug($course->name);
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->fees = $request->fees;
        $course->image = $courseImageName;
        $course->save();

        Toastr::success('Course Successfully Saved', 'Success');
        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'fees' => 'required',
            'duration' => 'required',
            'image' => 'image'

        ]);

        $course = Course::find($id);


        // get from image
        $image = $request->file('image');

        $slug = Str::slug($course->title);
        if (isset($image))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $courseImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('course'))
            {
                Storage::disk('public')->makeDirectory('course');
            }

            //          Delete old image
        if (Storage::disk('public')->exists('course/'.$course->image))
        {
            Storage::disk('public')->delete('course/'.$course->image);
        }
//          Resize image for category and upload
            $categoryCourse = Image::make($image)->resize(350,230)->stream();
            Storage::disk('public')->put('course/'.$courseImageName,$categoryCourse);

        }else{
            $courseImageName = $course->image;
        }


        $course->name = $request->name;
        $course->slug = Str::slug($course->name);
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->fees = $request->fees;
        $course->image = $courseImageName;
        $course->save();

        Toastr::success('Course Successfully Updated', 'Success');
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!is_null($course)){
            if (Storage::disk('public')->exists('course/'.$course->image))
            {
                Storage::disk('public')->delete('course/'.$course->image);
            }

            $course->delete();
            Toastr::success('Course Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
