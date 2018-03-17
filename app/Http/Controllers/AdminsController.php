<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Auth;



class AdminsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
         //
         $this->middleware('auth');

         $this->middleware('sale', ['except' => [
             'index',
             'create',
             'store',
             'show',
             'edit',
             'update',
             'destroy'
         ]]);
     }

     public function index()
     {
      $role = auth()->user()->role->name;

              if( $role === 'owner') {
                  $users = User::all();
              } else if( $role === 'manager') {
                $my_id =auth()->user()->id;
                $users = User::where([ [ 'id', '!=', $my_id ], ['role_id', '>', 1] ] )->get( array('id','role_id', 'name', 'email', 'image', 'phone'));
                //$users = User::where('role_id', '>', 1 )->get( array('id','role_id', 'name', 'email', 'image', 'phone'));
              } else if( $role === 'sale') {
                  return redirect('/school');
              }

              return view('admins.index', compact( 'users' ,'role' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
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
          'email' => 'required|email|unique:users',
          'phone' => 'required|min:6',
          'role_id' => 'required',
          'image' => 'image|max:1999',
          'password' => 'required|min:6',
          'confirm_password' => 'required|min:6|same:password'
      ]);

          $fileNameWithExt = $request->file( 'image')->getClientOriginalName();
          // Get just file name
          $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
          // Get the extension
          $extension = $request->file('image')->getClientOriginalExtension();
          // Final file name
          $fileNameToStore = $fileName .'_'.time().'.'.$extension;
          // Upload image - save
          $path = $request->file('image')->storeAs('public/images/admins', $fileNameToStore );

        $user = new User();
        $user->name = $request->input( 'name' );
        $user->role_id = $request->input( 'role_id' );
        $user->email = $request->input( 'email' );
        $user->phone = $request->input( 'phone' );
        $user->image = $fileNameToStore;
        $user->password = Hash::make( $request->password );
        $user->save();

        return redirect('/admins')->with('success', 'Admin was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      return view('admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
      'phone' => 'required|min:6',
      'image' => 'image|max:1999',
      ]);

    $user = User::find( $id );

    // Handel file upload
    if($request->hasFile('image')){
        // get file name with ext
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        // get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // get just the ext
        $extansion = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename .'_' .time() .'.' .$extansion;
        // Upload the Image
        $path = $request->file('image')->storeAs('public/images/admins', $fileNameToStore);
    } else {
        $fileNameToStore = 'image-placeholder.png';
    }
        $user->name = $request->input( 'name' );
        $user->email = $request->input( 'email' );
        $user->phone = $request->input( 'phone' );


        if($request->hasFile('image')){
            if($user->avatar != 'avatar-placeholder.png'){
        // Delete image
        Storage::delete('public/images/admins' .$user->image);
     }
        $user->image = $fileNameToStore;
    }
        $user->save();

        return redirect('/admins')->with('success', 'Admin was created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect('/admins')->with('success', 'Admin was deleted');

    }
}
