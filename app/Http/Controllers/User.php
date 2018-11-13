<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Usermodel as Models;
use App\KotaModel;

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
        $data['data2'] = KotaModel::index();

        return view('createuser', $data);
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
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'tgllahir' => 'required',
            'idkota' => 'required',
            'alamat' => 'required'
        ]);

        $data=array(
            'remember_token'=> $request->_token,
            'username' => $request->username,
            'name' => $request->nama,
            'tgllahir' => $request->tgllahir,
            'idkota' => $request->idkota,
            'email' => $request->email,
            'password' => $request->password,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        );

        $this->model->insert($data);
        return Redirect::to('/')->with('success','Tambah User Sukses !');
    }

    public function show($id)
    {
        $data['data'] = $this->model->find($id);
        $data['data2'] = KotaModel::index();

        return view('edituser', $data);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'tgllahir' => 'required',
            'idkota' => 'required',
            'alamat' => 'required'
        ]);

        $data=array(
            'username' => $request->username,
            'name' => $request->nama,
            'tgllahir' => $request->tgllahir,
            'idkota' => $request->idkota,
            'email' => $request->email,
            'password' => $request->password,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        );
        
        $this->model->where($this->pk, $request->iduser)->update($data);
        return Redirect::to('/User')->with('success','Update User Sukses !');
    }
}
