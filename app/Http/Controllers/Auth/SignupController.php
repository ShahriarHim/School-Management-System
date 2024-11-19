<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('pages.signup');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'fb' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect('/signup')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = 'images/' . $imageName;
        }

        $user->designation = $request->designation;
        $user->description = $request->description;
        $user->fb = $request->fb;
        $user->twitter = $request->twitter;
        $user->linkedin = $request->linkedin;
        $user->save();

        return redirect('/login')->with('success', 'Signup successful!');
    }
}
