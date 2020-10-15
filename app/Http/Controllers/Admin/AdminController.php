<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Admin;
use App\Http\Requests\AdminValidator;
use App\Http\Requests\AdminUpdateValidator;
use Hash;
use Auth;


class AdminController extends Controller
{
    protected $admin = null;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        $admin = $this->admin->get();
        return view('Admin.Admin.Index')->with('admin', $admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admin.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminValidator $request)
    {
        $data = $request->all();
//        dd($data);
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('Error', 'Password and confirm password does not match');
        } else {
                $password = Hash::make($request->password);
                $data['password'] = $password;
//        dd($password);
            $this->admin->fill($data);
            $success = $this->admin->save();
            if ($success) {
                return redirect()->route('Admin.index')->with('success', 'New user added');
            } else {
                return redirect()->route('Admin.index')->with('Error', 'Sorry! THere is an error adding new user ');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = $this->admin->find($id);
        if (!$admin) {
            return rediredt()->route('Admin.index')->with('Error', 'User not found');
        }
        return view('Admin.Admin.Update')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateValidator$request, $id)
    {
        $admin = $this->admin->find($id);
        if (!$admin) {
            return rediredt()->route('Admin.index')->with('Error', 'User not found');
        }
        $data = $request->all();
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('Error', 'Password and confirm password does not match');
        } else {
            $admin->fill($data);
            $success = $admin->save();
            if ($success) {
                return redirect()->route('Admin.index')->with('success', 'User updated');
            } else {
                return redirect()->route('Admin.index')->with('Error', 'Sorry! THere is an error updating user ');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = $this->admin->find($id);
        if (!$admin) {
            return rediredt()->route('Admin.index')->with('Error', 'User not found');
        }
        $success = $admin->delete();
        if ($success) {
            return redirect()->route('Admin.index')->with('success', 'New user deleted');
        } else {
            return redirect()->route('Admin.index')->with('Error', 'Sorry! THere is an error deleting new user ');
        }
    }

    public function PasswordChangeView()
    {
        $user = Auth::user();
//        dd($user);
        return view('Admin.Admin.ChangePassword')->with('user', $user);
    }

    public function PasswordChange(Request $request, $id)
    {
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('Error', 'Password and confirm password does not match');
        }
        $user = $this->admin->find($id);
//        dd($user);
        $data = $request->all();
        $old_password = Auth::user()->password;
//        $old_password = $password;
        $current = $request->old_password;
        $new_pwd = $request->password;
        if (Hash::check($current, $old_password)) {
            $user->password = Hash::make($new_pwd);
            $user->update();
            return redirect()->route('Dashboard')->with('success', 'Password Changed Successfully');
        } else {
            return redirect()->back()->with('Error', 'Current Password Incorrect please try again');
        }

    }
}
