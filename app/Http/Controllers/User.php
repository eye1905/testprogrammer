<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Usermodel as Models;

class User extends BaseController
{
    public function __construct()
    {
        $this->model = new Models;
        $this->pk = $this->model->getKeyName();
    }

    public function index()
    {
        $title = 'Admin Programmer';
        $data['data'] = $this->model->index();

        return view('user', $data);
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
        $this->validate($request, [
            'namauser' => 'required',
            'emailuser' => 'required|email',
            'passworduser' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        $data=array(
            'remember_token'=> $request->_token,
            'name' => $request->namauser,
            'email' => $request->emailuser,
            'password' => $request->passworduser,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        );

        $this->model->insert($data);
        return Redirect::to('/')->with('success','Tambah User Sukses !');
    }

    public function update(Request $request)
    {
       $this->validate($request, [
            'namauser' => 'required',
            'emailuser' => 'required|email',
            'passworduser' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        $data=array(
            'remember_token'=> $request->_token,
            'name' => $request->namauser,
            'email' => $request->emailuser,
            'password' => $request->passworduser,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        );
        
        $this->model->where($this->pk, $request->iduser)->update($data);
        return Redirect::to('/User')->with('success','Update User Sukses !');
    }
}
