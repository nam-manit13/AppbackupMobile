<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (session()->has('admin')) {
            //
            return view('index');
        }
        return view('layout.login');
    }
    public function login()
    {
        return view('layout.login');
    }
    public function logout()
    {
        session()->forget('admin');
        return view('layout.login');
    }
    public function adduser()
    {
        if (session()->has('admin')) {
            return view('adduser');
        }
        return view('layout.login');
    }
    public function showbintype()
    {
        if (session()->has('admin')) {
            return view('showbintype');
        }
        return view('layout.login');
    }
    public function showbincycle()
    {
        if (session()->has('admin')) {
            return view('showbincycle');
        }
        return view('layout.login');
    }
    public function showbintime()
    {
        if (session()->has('admin')) {
            return view('showbintime');
        }
        return view('layout.login');
    }
    public function reportbin()
    {

        if (session()->has('admin')) {
            return view('reportbin');
        }
        return view('layout.login');
    }
    public function settingbin()
    {

        if (session()->has('admin')) {
            return view('settingbin');
        }
        return view('layout.login');
    }
    public function deleteuser()
    {

        if (session()->has('admin')) {
            return view('deleteuser');
        }
        return view('layout.login');
    }
    public function addbin()
    {

        if (session()->has('admin')) {
            //
            return view('addbin');
          
        }
        return view('layout.login');
    }
    public function test()
    {
        // echo('login');
        return view('test');
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
