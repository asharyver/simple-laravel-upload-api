<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;

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
            $upload = new Upload();
            $upload->file_path = url('uploads/'.$newName);
            $upload->save();
            $path = $file->move(public_path('uploads'), $newName);
        } catch(\Exception $e){
            echo $e->getMessage();
            echo "<br>".$e->getLine();
            die();
        }
    }
}
