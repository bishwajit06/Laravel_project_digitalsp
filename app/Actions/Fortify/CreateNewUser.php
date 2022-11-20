<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Course;
use App\Models\Payment;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:20', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'payment_method' => ['required'],
            'payment_number' => ['required', 'string', 'max:255'],
            'transaction_id' => ['required', 'string', 'max:255']
        ])->validate();
        
        $user = User::create([
            //'course_id' => $input['course_id'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'address' => $input['address']
        ]);

        $user->courses()->attach($input['courses']);
        
        $payment = Payment::create([
            'user_id' => $user->id,
            'payment_method' => $input['payment_method'],
            'payment_number' => $input['payment_number'],
            'transaction_id' => $input['transaction_id']
        ]);

        $payment->courses()->attach($input['courses']);

        return $user;
        
    }


}
