<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
//use DataTables;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->where('utype', 'USR')->get();
        return view('admin.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:20', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);

    //     $profileImage = $request->file('image');
    //         $slug = Str::slug($request->first_name);

    //         if (isset($profileImage))
    //         {
    // //      Make unique name for image
    //         $currentdate = Carbon::now()->toDateString();
    //         $profileImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$profileImage->getClientOriginalExtension();

    // //      Check profile directory is exists
    //         if (!Storage::disk('public')->exists('profile'))
    //         {
    //             Storage::disk('public')->makeDirectory('profile');
    //         }



    // //      Resize image for profile and upload
    //         $profileImageSize = Image::make($profileImage)->resize(250,250)->stream();
    //         Storage::disk('public')->put('profile/'.$profileImageName,$profileImageSize);

    //     }else{
    //         $profileImageName = NULL;
    //     }

        $user = User::create([
            //'course_id' => $input['course_id'],
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address
        ]);

        $user->courses()->attach($request->courses);

        $payment = Payment::create([
            'user_id' => $user->id,
            'payment_method' => $request->payment_method,
            'payment_number' => $request->payment_number,
            'transaction_id' => $request->transaction_id
        ]);

        $payment->courses()->attach($request->courses);

            Toastr::success('Student has been Successfully Created', 'Success');
            return redirect()->route('admin.user.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)){
            if (Storage::disk('public')->exists('users/'.$user->image))
            {
                Storage::disk('public')->delete('users/'.$user->image);
            }
            foreach ($user->payments as $payment) {
                $payment->courses()->detach();
            }
            
            $user->delete();
            $user->courses()->detach();
            $user->payments()->delete();
            
            Toastr::success('Student Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }

    public function userApproved($id)
    {

       $user = User::find($id);
       $user->status = 0;
       $user->save();
        Toastr::success('User successfully Approved', 'Success');
        return redirect()->back();
    }

    public function UserUnApproved($id)
    {

       $user = User::find($id);
       $user->status = 1;
       $user->save();
        Toastr::success('User successfully Unapproved', 'Success');
        return redirect()->back();
    }
}
