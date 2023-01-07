<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Reservasi;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    // CRUD User ---------------------------------------------------------------------------------------------------------------
    public function user(){
        $user = Auth::user();
        $user = User::all();
        return view('user', compact('user'));
    }

    public function submit_user(Request $req){

        $user = new User;

        $validate = $req->validate([
            'name' => 'required|max:255', 
            'email' => 'required', 
            'phone' => 'required', 
            'address' => 'required',
        ]);

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');
        $user->password = bcrypt('12345') ;
        $user->roles_id = 2 ;
        
        if($req->hasFile('picture')){
            $extension = $req->file('picture')->extension();

            $filename = 'picture_user'.time().'.'. $extension;

            $req->file('picture')->storeAs('public/picture_user', $filename);

            $user->picture = $filename;
        }

        $user->save();

        $notification = array(
            'message' =>'Data User berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    public function update_user(Request $req) { 

        $user = User::find($req->get('id'));

        $validate = $req->validate([
            'name' => 'required|max:255', 
            'email' => 'required', 
            'phone' => 'required', 
            'address' => 'required',
        ]);

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');
        $user->password = bcrypt('12345') ;
        $user->roles_id = 2 ;

        if ($req->hasFile('picture')) {
            $extension = $req->file('picture')->extension(); 
            $filename = 'picture_user_'.time().'.'.$extension;
            $req->file('picture')->storeAs('public/picture_user', $filename ); 
            
            Storage::delete('public/picture_user/'.$req->get('old_picture')); 
            $user->picture = $filename; 
        } 
        
        $user->save(); 

        $notification = array( 
            'message' => 'Data User berhasil diubah', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    

}
