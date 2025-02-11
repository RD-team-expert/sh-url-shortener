<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Feedback;

class UsersController extends Controller

{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('AddUser');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


     public function showFeedbacks()
     {
         $feedbacks = Feedback::with('user')->latest()->get();
         return view('feedbacks', compact('feedbacks'));
     }



    public function storeFeedback(Request $request)
    {
        // Validate the feedback
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        // Store the feedback
        Feedback::create([
            'user_id' => Auth::id(),
            'feedback' => $request->feedback,
        ]);

        // Flash success message to the session
        session()->flash('success', 'Feedback submitted successfully!');

        // Redirect back to the feedback form page
        return redirect()->route('feedback.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:Admin,User'], // Validate role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Save role to the database
        ]);

        event(new Registered($user));

        // Flash success message to the session
        session()->flash('success', 'User Added Successfully');

        //  Auth::login($user);
        return view('AddUser');
    }
    // users page controller
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Return the 'users_table' view with the users data
        return view('users_table', compact('users'));
    }


}


