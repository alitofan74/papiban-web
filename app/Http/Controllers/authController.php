<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use Kreait\Firebase\ServiceAccount;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }

    public function index()
    {

        $ref = $database->getReference('users');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'SubjectName' => 'Laravel'
        ]);
        return $key;
    }

    public function register()
    {
        return view("mimin.auth.register");
    }

    public function getData()
    {
        $b = call_fb('get', 'users', null);
        var_dump($b);

        // $createPost    =   $database->getReference('users')->getValue();
        // $auth = $firebase->getAuth();
        // var_dump($auth);
        // $userProperties = [
        //     'email' => 'a@gmail.com',
        //     'emailVerified' => false,
        //     'phoneNumber' => null,
        //     'password' => '123445',
        //     'displayName' => 'aaaa',
        //     'photoUrl' => null,
        //     'disabled' => false,
        // ];

        // $auth = $firebase->getAuth();
        // $createdUser = $auth->createUser($userProperties);
        // return response()->json($createdUser);
    }

    public function login()
    {
        return view("mimin.auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function insert(Request $request)
    {
        $full_name = $request->input('full_name');
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $password_confirm = $request->input('passwordconfirm');
        $email = $request->input('email');
        $data = array('full_name' => $full_name, "user_name" => $user_name, "password" => $password, "email" => $email);
        // var_dump($data);
        //add realtime
        $b = call_fb('create', 'users', $data);

        //add auth
        // $userProperties = [
        //     'email' => $email,
        //     'emailVerified' => false,
        //     'phoneNumber' => null,
        //     'password' => $password,
        //     'displayName' => $user_name,
        //     'photoUrl' => null,
        //     'disabled' => false,
        // ];

        // $auth = $firebase->getAuth();
        // $createdUser = $auth->createUser($userProperties);
        return redirect('register')->with('status', 'Account created!');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
