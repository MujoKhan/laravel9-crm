<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Emp;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    public function index($id)
    {
        if($id == "HR")
        {
            $emp = Emp::where('post','HR')
                        ->where('permission', 'Yes')->get();
            return view('admin.show')->with('emp', $emp);
        }
        elseif($id == "Inter Viewer")
        {
            $emp = Emp::where('post','Inter Viewer')
                        ->where('permission', 'Yes')->get();
            return view('admin.show')->with('emp', $emp);
        }
        elseif($id == "Data Admin")
        {
            $emp = Emp::where('post','Data Admin')
                        ->where('permission', 'Yes')->get();
            return view('admin.show')->with('emp', $emp);
        }
        elseif($id == "show")
        {
            $emp = Emp::withTrashed()->get();
            return view('admin.approve')->with('allemp',$emp); 
        }
        elseif($id == "trash")
        {
            $emp = Emp::onlyTrashed()->get();
            return view('admin.trash')->with('allemp',$emp);  
        }
    }

    public function store(Request $request)
    {
        $valid = $request->validate(
            [
            'emprole' => 'required',
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
            'email' => 'required|email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'phone' => ['required','digits:10'],
          ],[
            'name.regex'=>'The Name Should be Only String',
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
          ]);
    
        $p = "No";
        $emp = new Emp;

        $emp->name = $request->name;  //or $request['name']
        $emp->email = $request->email;
        $emp->password = Hash::make($request->password);
        $emp->phone = $request->phone;
        $emp->post = $request->emprole;
        $emp->gender = $request->gender;
        $emp->permission = $p;
        $emp->save();   
       return redirect()->back()->with("status","New Employee Added!!!"); 
     
    }

    public function showempwork($id)
    {
      $allemp = Emp::all();
      $emp = Emp::where('id',$id)->get();
      foreach($emp as $data)
      {
        session()->put('post',$data->post);
        session()->put('empname',$data->name);
      }

      if(session()->get('post') == "HR")
      {
        
        $userdata = UserData::where('Hr_Id',$id)->get();
        session()->put('hr',1);
        session()->forget('intern',1);
        session()->forget('dadmin',1);
        return view('admin.work',compact('userdata','emp','allemp'));

      }
      elseif(session()->get('post') == "Inter Viewer")
      {
        $userdata = UserData::where('Inter_Id_R1',$id)
                            ->orWhere('Inter_Id_R2',$id)
                            ->orWhere('Inter_Id_R3',$id)->get();

        session()->forget('hr',1);
        session()->put('intern',1);
        session()->forget('dadmin',1);                   
        return view('admin.work',compact('userdata','emp','allemp'));
      }
      elseif(session()->get('post') == "Data Admin")
      {
        $userdata = UserData::where('Data_Admin_Id',$id)->get();
        session()->forget('hr',1);
        session()->forget('intern',1);
        session()->put('dadmin',1);
        return view('admin.work',compact('userdata','emp','allemp'));

      }
        
    }

    public function edit(Admin $Admin, $id,$v)
    {
        if($v == "emp")
        {
            $emp = Emp::where('id',$id)->get();
            session()->put('empedit',1);
            session()->forget('adminedit',1);
            return view('admin.edit-form',compact('emp'));
        }
        elseif($v == "admin")
        {
            session()->forget('empedit',1);
            session()->put('adminedit',1);
            return view('admin.edit-form');
        }
    }

    public function update(Admin $admin, $v, Request $request)
    {
      $valid = $request->validate([       
        'name' => ['required','regex:/^[a-zA-Z ]+$/'],
        'gender' => ['required','regex:/^[a-zA-Z ]+$/'],
         ],[
          'name.regex'=>'The Name Should be Only String',
          'gender.regex'=>'The Gender Should be Only String',
         ]
        );
        

      $admin1 = Admin::where('email',$request->email)->get();
      $emp1 = Emp::where('email',$request->email)->get();
     
      if($v == "admin")
      {
          if($request->hasfile('dp'))
          {
            $file = $request->file('dp');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('dp', $filename);
            session()->put('file',$filename);
          }
          else
          {
            
            foreach($admin1 as $data)
            {
              session()->put('file',$data->dp);
            }
          }
          $admin = Admin::where('email',$request->email)
          ->update([
            'name' => $request->name, 
            'dp'=> session()->get('file')
          ]);
     
          if($admin == 1)
          {
             return redirect()->back()->with("status", "Admin Has Been Updated");
          }
          else{
            return redirect()->back()->with("status", "Admin Not Update");
          }
          
      }
      elseif($v == "emp")
      {
         $emp = Emp::where('email',$request->email)
          ->update([
            'name' => $request->name, 
            'gender' => $request->gender,
          ]);
     
          if($emp == 1)
          {
          
            // return view('admin.admin-home');
            return redirect()->back()->with("status", "Employee Has Been Updated");
          }
          else{
            return redirect()->back()->with("status", "Employee Not Update");
          }
      }
    }

    public function approve($id)
    {
       $emp = Emp::find($id);
       $b = "Yes";
       $emp->permission = $b;
       $emp->update();
       return redirect()->back();
          
    }

    public function block($id)
    {
       $emp = Emp::find($id);
       $b = "No";
       $emp->permission = $b;
       $emp->update();
       return redirect()->back();
          
    }

    public function trash($id)
    {
       $emp = Emp::find($id);
       $emp->delete();
       return redirect()->back();
          
    }

    public function restore($id)
    {
      $emp = Emp::onlyTrashed()->find($id);
      $emp->restore();
      return redirect()->back();
          
    }

    public function delete($id)
    {
       $emp = Emp::onlyTrashed()->find($id);
       $emp->forceDelete();
       return redirect()->back();
          
    }

    public function check(Request $request)
    {
        $valid = $request->validate([
            
            'email'=> 'required|email|exists:admins,email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ],[
            'email.exists'=>'This Email Is Not Persent',
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
        ]);

        // $credentials = [
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        // ];
         $admin = Admin::where('email',$request['email'])->get();
        foreach($admin as $data)
        {
            session()->put('count',Hash::check($request['password'],$data->password));
        }

        // dd($credentials);
      
        if(session()->get('count') == 1)
        {
            if (Auth::guard('admin')->attempt($request->only('email','password')))
            {
            return redirect()->route('admin.home');
             }
        }
        else
        {
            return redirect()->route('admin.login')->with('status','Super Admin Not Allow you! Or Admin Not Found');
        }
        
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
