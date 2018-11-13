<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\ProvinsiModel as Models;

class Provinsi extends BaseController
{
    public function __construct()
    {
        $this->model = new Models;
        $this->pk = $this->model->getKeyName();
    }

    public function index()
    {
        $data['data'] = $this->model->index();

        return view('provinsi', $data);
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
            'namaprovinsi' => 'required'
        ]);

        $data=array('namaprovinsi' => $request->namaprovinsi);

        $this->model->insert($data);
        return Redirect::to('/Provinsi')->with('success','Tambah Provinsi Sukses !');
    }

    public function update(Request $request)
    {
       $this->validate($request, [
            'namaprovinsi' => 'required'
        ]);
        $data=array('namaprovinsi' => $request->namaprovinsi);
        
        $this->model->where($this->pk, $request->idprovinsi)->update($data);
        return Redirect::to('/Provinsi')->with('success','Update Provinsi Sukses !');
    }
}
