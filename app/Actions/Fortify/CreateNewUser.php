<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $roles = Role::pluck('name', 'name')->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:40'],
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'website' => ['required', 'url', 'max:255'],
            'city' => ['required','string', 'max:15'],
            'profile_photo_path' => ['required', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:2048'],
            'password' => ['required','string', 'max:25','min:8','confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if (request()->has('profile_photo_path')) {
            $imageuploaded = request()->file('profile_photo_path');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/users');
            $imageuploaded->move($imagepath, $imagename);
            $user = User::create([
                'name' => $input['name'],
                'company_name' => $input['company_name'],
                'phone' => $input['phone'],
                'email' => $input['email'],
                'website' => $input['website'],
                'Status' => 'غير نشط',
                'city' => $input['city'],
                'profile_photo_path' => $imagename,
                'password' => Hash::make($input['password']),
                'roles_name' => ["new"],
            ]);
            $user->assignRole(('new'));
            return $user;


        }
    }
}
