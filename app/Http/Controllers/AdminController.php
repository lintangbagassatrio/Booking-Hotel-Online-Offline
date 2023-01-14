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

    public function getDataUser($id){

        $user = User::find($id);
        
        return response()->json($user);
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

    public function delete_user($id) { 

        $user = User::find($id); 

        Storage::delete('public/picture_user/'.$user->cover);
        
        $user->delete(); 
        
        $success = true; 
        $message = "Data buku berhasil dihapus"; 
        
        return response()->json([ 
            'success' => $success, 
            'message' => $message, 
        ]); 
    }

    // CRUD Kamar ---------------------------------------------------------------------------------------------------------------
    public function kamar(){
        $user = Auth::user();
        $kamar = Kamar::all();
        return view('kamar', compact('user','kamar'));
    }

    public function submit_kamar(Request $req){

        $kamar = new Kamar;

        $validate = $req->validate([
            'kelas' => 'required|max:255', 
            'status' => 'required', 
            'harga' => 'required', 
            'fasilitas' => 'required',
        ]);

        $kamar->kelas = $req->get('kelas');
        $kamar->status = $req->get('status');
        $kamar->harga = $req->get('harga');
        $kamar->fasilitas = $req->get('fasilitas');
        
        if($req->hasFile('picture')){
            $extension = $req->file('picture')->extension();

            $filename = 'picture_kamar'.time().'.'. $extension;

            $req->file('picture')->storeAs('public/picture_kamar', $filename);

            $kamar->picture = $filename;
        }

        $kamar->save();

        $notification = array(
            'message' =>'Data Kamar berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('admin.kamar')->with($notification);
    }

    public function getDataKamar($id){

        $kamar = Kamar::find($id);
        
        return response()->json($kamar);
    }

    public function update_kamar(Request $req) { 

        $kamar = Kamar::find($req->get('id'));

        $validate = $req->validate([
            'kelas' => 'required|max:255', 
            'status' => 'required', 
            'harga' => 'required', 
            'fasilitas' => 'required',
        ]);

        $kamar->kelas = $req->get('kelas');
        $kamar->status = $req->get('status');
        $kamar->harga = $req->get('harga');
        $kamar->fasilitas = $req->get('fasilitas');

        if ($req->hasFile('picture')) {
            $extension = $req->file('picture')->extension(); 
            $filename = 'picture_kamar_'.time().'.'.$extension;
            $req->file('picture')->storeAs('public/picture_kamar', $filename ); 
            
            Storage::delete('public/picture_kamar/'.$req->get('old_picture')); 
            $kamar->picture = $filename; 
        } 
        
        $kamar->save(); 

        $notification = array( 
            'message' => 'Data Kamar berhasil diubah', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kamar')->with($notification);
    }

    public function delete_kamar($id) { 

        $kamar = Kamar::find($id); 

        Storage::delete('public/picture_kamar/'.$kamar->cover);
        
        $kamar->delete(); 
        
        $success = true; 
        $message = "Data buku berhasil dihapus"; 
        
        return response()->json([ 
            'success' => $success, 
            'message' => $message, 
        ]); 
    }

    // CRUD Reservasi ---------------------------------------------------------------------------------------------------------------

    public function reservasi(){

        $kamar = Kamar::all();
        $user = User::all();

        $users = User::all();

        $user = Auth::user();
        $reservasi = Reservasi::all();

        return view('reservasi',compact('users','kamar','reservasi'));

    }

    public function getDataReservasi($id){

        $reservasi = Reservasi::find($id);
        
        return response()->json($reservasi);
    }

    public function submit_reservasi(Request $req)
    {
        $validate = $req->validate([
            'users_id' => 'required',
            'kamars_id' => 'required',
            'jumlahkamar' => 'required',
            'jumlahorang' => 'required',
            'datein' => 'required',
            'dateout' => 'required',
        ]);

        $reservasi = new Reservasi;
        
        $reservasi->users_id = $req->get('users_id');
        $reservasi->kamars_id = $req->get('kamars_id');
        $reservasi->jumlahkamar = $req->get('jumlahkamar');
        $reservasi->jumlahorang = $req->get('jumlahorang');
        $reservasi->datein = $req->get('datein');
        $reservasi->dateout = $req->get('dateout');

        $reservasi->save();

        $notification = array(
            'message' => 'Data reservasi berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.reservasi')->with($notification);

    }

    public function update_reservasi(Request $req) { 

        $reservasi = Reservasi::find($req->get('id'));

        $validate = $req->validate([
            'jumlahkamar' => 'required', 
            'jumlahorang' => 'required', 
            'datein' => 'required', 
            'dateout' => 'required',
        ]);

        $reservasi->jumlahkamar = $req->get('jumlahkamar');
        $reservasi->jumlahorang = $req->get('jumlahorang');
        $reservasi->datein = $req->get('datein');
        $reservasi->dateout = $req->get('dateout');
        
        $reservasi->save(); 

        $notification = array( 
            'message' => 'Data Reservasi berhasil diubah', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.reservasi')->with($notification);
    }

    public function delete_Reservasi($id)
    {
        $reservasi = Reservasi::find($id);

        $reservasi->delete();

        $success = true;
        $message = "Data Reservasi berhasil dihapus";

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    
}