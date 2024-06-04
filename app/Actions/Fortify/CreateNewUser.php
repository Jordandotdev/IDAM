<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        $roleMap = [
            'Customer' => 3,
            'PropertyOwner' => 4,
            // Add other roles as needed
        ];
        $roleId = $roleMap[$input['role']]?? null;
    
        Validator::make($input, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()? ['accepted', 'required'] : '',
        ])->validate();
    
        $user = User::create([
            'role' => $roleId,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    
        $role = Role::where('name', $input['role'])->firstOrFail();
        $user->roles()->attach($role->id);

        return $user;
    }
}