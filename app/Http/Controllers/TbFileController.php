<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TbFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $file = $request->file('file_upload');
            $newName = $file->getClientOriginalName();
            $path = $file->move(storage_path('uploads'), $newName);
            return "sukses";
        } catch(\Exception $e){
            echo $e->getMessage();
            echo "<br>".$e->getLine();
            die();
        }
    }
}
