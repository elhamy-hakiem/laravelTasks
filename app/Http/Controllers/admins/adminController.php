<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{
    //
    public function index()
    {
        if(auth()->check()){

        $admins =  admin::get(); // get all Admins



        return view('admins.index', ['data' => $admins]);
        }else{
            return redirect(url('Login'));
        }
    }
    #############################################################################################################
        public function create()
        {

            return view ('admins.create');
        }

    ##############################################################################################################

    public function store(Request $request)
    {

        $data =  $this->validate($request, [
            'name'     => "required",
            'email'    => "required|email",
            'password' => "required|min:6",
            'image'    => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);


        # Hashing the password before saving it to the database
        $data['password']  = bcrypt($data['password']);


        # Uploading the image to the server
        $imageName = time() . uniqid() . '.' . $request->image->extension();

        $request->image->move(public_path('images/admins'), $imageName);

        $data['image'] = $imageName;


        $op =  admin::create($data);    // insert into users (name,email,passsowrd) values ($data['name'],$data['email'],$data['password'])

        if ($op) {
            $message = "Student Created Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Student Not Created";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Admins/Create'));
    }

    ##############################################################################################################
    public function remove(Request $request)
    {
        // code . . .

        # Fetch User Data . . .
        $admin = admin::find($request->id);

        $op =   admin::where('id', $request->id)->delete();   // delete from users where id = $id

        if ($op) {

            # Remove image . . .
            unlink(public_path('images/admins/' . $admin->image));

            $message = "Admin Removed Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Admin Not Removed";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Admins'));
    }
}
