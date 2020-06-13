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
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebasekey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')
            ->create();
        $database = $firebase->getDatabase();
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
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebasekey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')
            ->create();
        $database   =   $firebase->getDatabase();
        $createPost    =   $database->getReference('users')->getValue();
        $auth = $firebase->getAuth();
        // var_dump($auth);
        $userProperties = [
            'email' => 'a@gmail.com',
            'emailVerified' => false,
            'phoneNumber' => null,
            'password' => '123445',
            'displayName' => 'aaaa',
            'photoUrl' => null,
            'disabled' => false,
        ];

        $auth = $firebase->getAuth();
        $createdUser = $auth->createUser($userProperties);
        return response()->json($createdUser);
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
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebasekey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('users');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set($data);

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
