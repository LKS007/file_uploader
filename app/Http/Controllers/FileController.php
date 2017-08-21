<?php

namespace App\Http\Controllers;

//use Storage;
use App\File as Myfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('my_auth',['only' => ['index', 'create']]);
    }



    public function index()
    {
        $files = Myfile::all();
        return view('files.index',['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('files.create', ['email' => Auth::user()->email]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('new_file');
        if ($file->getClientSize() >= Config::get('uploadfile.min_size') && $file->getClientSize() <= Config::get('uploadfile.max_size')) {
            
            $new_file = new Myfile;
            $new_file->file_size = $file->getClientSize();
            $new_file->filename = $file->getClientOriginalName();
            $new_file->uploader_email = $request->input('uploader_email');

            //check unique file_path
            if (!Myfile::where('file_path', $file->getClientOriginalName())->get()->isEmpty()) {
                $new_file->file_path = $file->getClientOriginalName() . '_' . time();
            } else {
                $new_file->file_path = $file->getClientOriginalName();
            }

            $new_file->save();
            Storage::disk('local')->put($new_file->file_path,  File::get($file));

            return redirect()->action('FileController@edit', ['id' => $new_file->id]);
        }
        $request->session()->flash('message.content', 'You file has invalid size!!!');
        $request->session()->flash('message.level', 'danger');
        return redirect()->action('FileController@create');
        
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
        $file = Myfile::find($id);
        if (!$file) {
            Session::flash('message.content', 'You dont have file with this id');
            Session::flash('message.level', 'danger');
            return redirect()->action('FileController@index');
        }
            
        return view('files.edit', ['edit_file' => $file]);
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
        $file = Myfile::find($id);
        $file->filename = $request->filename;
        $file->uploader_email = $request->uploader_email;
        $file->save();
        return view('files.edit', ['edit_file' => $file]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Myfile::find($id);
        Storage::delete($file->file_path);
        $file->delete();
        return redirect()->action('FileController@index');
    }

    public function download($id)
    {
        $file = Myfile::find($id);
        $path = storage_path('app/' . $file->file_path);
        return response()->download($path);
    }
}
