<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peopleinfo;

class DBController extends Controller
{
    public function getData()
    {
        $info = peopleinfo::all();
        return view('myview',['data'=>$info]);
    }
}
