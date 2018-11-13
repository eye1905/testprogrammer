<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\KotaModel as Models;
use App\ProvinsiModel;

class Kota extends  BaseController
{
    public function __construct()
    {
        $this->model = new Models;
        $this->modelprovinsi = new ProvinsiModel;
        $this->pk = $this->model->getKeyName();
    }

    public function index()
    {
        $data['data'] = $this->model->index();
        $data['data2'] = ProvinsiModel::index();

        return view('kota', $data);
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
         	'idprovinsi' => 'required',
            'namakota' => 'required'
        ]);

        $data=array('idprovinsi' => $request->idprovinsi, 'namakota' => $request->namakota);

        $this->model->insert($data);
        return Redirect::to('/Kota')->with('success','Tambah Kota Sukses !');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
         	'idprovinsi' => 'required',
            'namakota' => 'required'
        ]);

        $data=array('idprovinsi' => $request->idprovinsi, 'namakota' => $request->namakota);
        
        $this->model->where($this->pk, $request->iduser)->update($data);
        return Redirect::to('/Kota')->with('success','Update Kota Sukses !');
    }

    public function filter(Request $request)
    {
    	$this->validate($request, [
         	'filterprovinsi' => 'required'
        ]);
        
        $data['data'] = $this->model->getIdProvinsi($request->filterprovinsi);
        $data['data2'] = ProvinsiModel::index();

        return view('kota', $data);
    }
}
