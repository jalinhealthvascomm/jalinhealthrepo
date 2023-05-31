<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\Input;
use Spatie\Permission\Models\Permission as ModelsPermission;

class backendUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $availableRoles = Role::latest()->pluck('name','name');
        return view('admin.users.create', compact('availableRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'role' => ['required'],
        ]);

        $attributes['password'] = bcrypt($attributes['password'] );
        session()->flash('saveSuccess', 'Your account has been created.');
        $user = User::create($attributes);
        $user->givePermissionTo('administrator');
        $user->assignRole('administrator');
        return redirect()->route('admin.users-list.'.$attributes['role']);
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
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $availableRoles = Role::latest()->pluck('name','name');
        $user = User::where('id', '=', $id)->firstOrFail();

        return view('admin.users.edit', compact('user', 'availableRoles'));
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
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $attributes = [];
        $user = User::where('id', '=', $id)->firstOrFail();

        if ($request->Input('password')) {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'password' => ['required', 'min:5', 'max:20'],
            ]);
            $attributes['password'] = bcrypt($attributes['password'] );
        }else{
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                // 'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            ]);
        }
        
        $user->update($attributes);
        return redirect()->route('admin.users-list.'.$user->getRoleNames()[0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::where('id', '=', $id)->firstOrFail();
        $user->delete();
        Session::flash('saveSuccess', 'User Deleted!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete_user($user)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::where('id', '=', $user)->firstOrFail();
        $user->delete();
        Session::flash('saveSuccess', 'User Deleted!');
        return redirect()->back();
    }

    public function user_admin(){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::role('administrator')->get();
        return view('admin.users.index', compact('users'));
    }

    public function user_member(){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::role('membership')->get();
        return view('admin.users.index', compact('users'));
    }
}
