<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\MyParent;
use App\Models\Section;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;
    /***
     * Display the login view.
     */

    public function dashboard()
    {
        $data = [
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'parents' => MyParent::count(),
            'sections' => Section::count(),
            'lastWorksStudents' => Student::latest()->take(5)->get(),
            'lastWorksTeachers' => Teacher::latest()->take(5)->get(),
            'lastWorksParents' => MyParent::latest()->take(5)->get(),
            'lastWorksParentsFeeInvoice' => FeeInvoice::latest()->take(5)->get(),
        ];
        return view('pages.Admins.dashboard', $data);
    }
    public function index()
    {
        return view('auth.selection');
    }
    public function create($type): View
    {
        return view('auth.login', compact('type'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        if (Auth::guard($this->checkGuard($request->type))->attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success(trans('Auth.login'));
            return $this->redirect($request->type);
        }
        toastr()->error(trans('Auth.error'));
        return redirect()->back();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard($request->type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->info(trans('Auth.logout'));

        return redirect('/');
    }
}
