<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createClient()
    {
        return view('auth.register-client');
    }

    //Second view for Company Register
    public function createCompany()
    {
        return view('auth.register-company');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeClient(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'integer', 'digits_between:4,20'],
            'address_road' => ['required', 'string', 'max:255'],
            'address_number' => ['required', 'integer', 'digits_between:1,3'],
            'zipcode' => ['required', 'integer', 'digits_between:4,5'],
            'company_name' => [ 'string', 'max:255'],




        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $request->profile_picture,
            'phone_number' => $request->phone_number,
            'address_road' => $request->address_road,
            'address_number' => $request->address_number,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'town' => $request->town,
            'company_name' => $request->town,
            'tva_number' => $request->tva_number,
            'role' => $request->role,
            'type' => 'client'

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function storeCompany(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'integer', 'digits_between:4,10'],
            'address_road' => ['required', 'string', 'max:255'],
            'address_number' => ['required', 'integer', 'digits_between:1,3'],
            'zipcode' => ['required', 'integer', 'digits_between:4,5'],
            'company_name' => [ 'string', 'max:255'],
       




        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $request->profile_picture,
            'phone_number' => $request->phone_number,
            'address_road' => $request->address_road,
            'address_number' => $request->address_number,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'town' => $request->town,
            'company_name' => $request->company_name,
            'category'=>$request->category,
            'tva_number' => $request->tva_number,
            'role' => $request->role,
            'type' => 'company'

        ]);
        

        event(new Registered($user));

        Auth::login($user);
        
        $user = Auth::user();  
         return redirect()->intended(RouteServiceProvider::HOME);  

      
    }  
}