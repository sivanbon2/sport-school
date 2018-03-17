<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;


use App\Student;

class StudentsController extends Controller
{

    public function __construct(){
        //$this->middleware( 'owner' );
        //$this->middleware( 'manager',  ['except' => ['delete']] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:6',
            'featured_image' => 'image|max:1999',

        ]);

        $fileNameWithExt = $request->file( 'image')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
        // Get the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Final file name
        $fileNameToStore = $fileName .'_'.time().'.'.$extension;
        // Upload image - save
        $path = $request->file('image')->storeAs('public/images/students', $fileNameToStore );

        $student = new Student();
        $student->name = $request->input( 'name' );
        $student->email = $request->input( 'email' );
        $student->phone = $request->input( 'phone' );
        $student->image = $fileNameToStore;

        $student->save();
        $student->courses()->sync( $request->input('courses'), true);
        return redirect('/school')->with('success', 'Student was created');
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
        $this->validate( $request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'featured_image' => 'image|max:1999',
        ]);

        $student = Student::find( $id );

        if( $request->file( 'image') ) {
            Storage::delete('public/images/students/'.$student->image );
            // Handel file upload
            $fileNameWithExt = $request->file( 'image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
            // Get the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Final file name
            $fileNameToStore = $fileName .'_'.time().'.'.$extension;
            // Upload image - save
            $path = $request->file('image')->storeAs('public/images/students', $fileNameToStore );
            $student->image = $fileNameToStore;
        }

        $student->name = $request->input( 'name' );
        $student->email = $request->input( 'email' );
        $student->phone = $request->input( 'phone' );

        $student->courses()->sync( $request->input('courses'), true );

        $student->save();
        return redirect('/school')->with('success', 'Student was edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find( $id );
        $student->delete();
        return redirect('/school')->with('success', 'Student was deleted');
    }
}
