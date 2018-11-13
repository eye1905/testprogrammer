<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use View;
use App\Usermodel as Models;

class BaseController extends Controller
{
    public function edit($id)
    {
        $data = $this->model->find($id);
        return json_encode($data);
    }

    public function destroy($id)
    {
       $data = $this->model->find($id);
       $data->delete();

        return response()->json($data);
    }
}
