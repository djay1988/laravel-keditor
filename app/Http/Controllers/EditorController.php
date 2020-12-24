<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.new');
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
    public function show($id=false)
    {
        return view('pages.preview');
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
    public function upload(Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'image-file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {

            $year = date("Y");
            $month = date("m");
            $input = $request->all();

            $_folder = isset($input['folder']) ? $input['folder'] : 'images';
            $folder = $_folder . '/' . $year . '/' . $month . '/';

            $name = md5(time()) . '.' . $request->{'image-file'}->getClientOriginalExtension();
            $uploadedFile = $request->{'image-file'};
            $uploadedFile->storeAs($folder, $name, 'public');


            $image = 'storage/' . $folder . $name;
            $url = url($image);


            return response()->json(['type' => 'OK', 'file' => $image, 'url' => $url]);
        }
        return response()->json(['type' => 'ERR', 'error' => $validator->errors()->all()]);
    }
}
