<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['nullable', 'string', 'max:15'],
            'password' => $this->passwordRules(),
            'agree' => ['required'],
        ])->validate();

        return User::create([
            'name' => $input['first_name'] . ' ' . $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'] ?? null,
            'roles' => 'USER', // Default role
            'password' => Hash::make($input['password']),
        ]);
    }
}
