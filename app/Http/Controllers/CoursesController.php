<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Course;
class CoursesController extends Controller
{
  public function __construct(){
      //$this->middleware( 'owner' );
      //$this->middleware( 'manager',  ['except' => ['delete']] );
      //$this->middleware( 'sale',  ['except' => ['delete','edit']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('courses.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
          'course_name' => 'required',
          'course_price' => 'required',
          'course_description' => 'required|max:255',
          'image' => 'image|max:1999',
      ]);
      $fileNameWithExt = $request->file( 'image')->getClientOriginalName();
      // Get just file name
      $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
      // Get the extension
      $extension = $request->file('image')->getClientOriginalExtension();
      // Final file name
      $fileNameToStore = $fileName .'_'.time().'.'.$extension;
      // Upload image - save
      $path = $request->file('image')->storeAs('public/images/courses', $fileNameToStore );

      $course = new Course();
      $course->course_name = $request->input( 'course_name' );
      $course->price = $request->input( 'course_price' );
      $course->description = $request->input( 'course_description' );

      $course->image = $fileNameToStore;
      $course->save();

      return redirect('/school')->with('success', 'Course was created');
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
        'course_name' => 'required',
        'course_price' => 'required',
        'image' => 'image|max:1999',
        'course_description' => 'required',
      ]);

      $course = Course::find( $id );

      if( $request->file( 'image') ) {
          Storage::delete('public/images/courses/'.$course->image );
          $fileNameWithExt = $request->file( 'image')->getClientOriginalName();
          // Get just file name
          $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
          // Get the extension
          $extension = $request->file('image')->getClientOriginalExtension();
          // Final file name
          $fileNameToStore = $fileName .'_'.time().'.'.$extension;
          // Upload image - save
          $path = $request->file('image')->storeAs('public/images/courses', $fileNameToStore );
          $course->image = $fileNameToStore;

      }

      $course->course_name = $request->input( 'course_name' );
      $course->price = $request->input( 'course_price' );
      $course->description = $request->input( 'course_description' );
      $course->save();
      return redirect('/school')->with('success', 'Course was created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $course = Course::find( $id );
      $course->delete();
      return redirect('/school')->with('success', 'Course was deleted');
    }
}
