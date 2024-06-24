<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emp;
use App\Models\UserData;
use App\Models\UserDoc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class InterViewerController extends Controller
{

    public function index($id, $v)
    {
        $userdata_r1 = UserData::where('Inter_Id_R1',$id)->get();
        $userdata_r2 = UserData::where('Inter_Id_R2',$id)->get();
        $userdata_r3 = UserData::where('Inter_Id_R3',$id)->get();
        $emp = Emp::all();

        if($v == "r1")
        {
            session()->put('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('all',1);
            return view('interviewer.round',compact('userdata_r1','emp'));
        }
        elseif($v == "r2")
        {
            
            
            session()->forget('r1',1);
            session()->put('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('interviewer.round',compact('userdata_r2','emp'));
        }
        elseif($v == "r3")
        {
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->put('r3',1);
            session()->forget('all',1);
            return view('interviewer.round',compact('userdata_r3','emp'));
        }
        elseif($v == "all")
        {
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->put('all',1);
            return view('interviewer.round',compact('userdata_r1','userdata_r2','userdata_r3','emp'));
        }
    }

    public function profile(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'phone' => ['required','digits:10'],
            'gender' => 'required',
        ],[
            'name.regex'=>'The Name Should be Only String',
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
        ]);
      $emp = Emp::find($request->empid);
      $emp1 = Emp::where('id',$request->empid)->get();
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
            foreach($emp1 as $data)
            {
                session()->put('file',$data->dp);
            }
          }
      $emp->name = $request->name;   
      $emp->password = $request->password;
      $emp->phone = $request->phone;  
      $emp->gender = $request->gender;  
      $emp->dp = session()->get('file'); 
      $up = $emp->update();
      if($up)
      {
            return redirect()->back()->with("status","Inter Viewer Has Been Updated");
      }
      else
      {
        return redirect()->back()->with("status","Inter Viewer Not Update");
      }
    }

    public function interview($id, $v)
    {
        
        if($v == "r1")
        {
            $userdata_r1 = UserData::where('id',$id)->get();
            $userdoc_r1 = UserDoc::where('User_Id',$id)->get();
            
            session()->put('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            return view('interviewer.doc',compact('userdata_r1','userdoc_r1'));
        }
        elseif($v == "r2")
        {
            $userdata_r2 = UserData::where('id',$id)->get();
            $userdoc_r2 = UserDoc::where('User_Id',$id)->get();
            session()->forget('r1',1);
            session()->put('r2',1);
            session()->forget('r3',1);
            return view('interviewer.doc',compact('userdata_r2','userdoc_r2'));
        }
        elseif($v == "r3")
        {
            $userdata_r3 = UserData::where('id',$id)->get();
            $userdoc_r3 = UserDoc::where('User_Id',$id)->get();
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->put('r3',1);
            return view('interviewer.doc',compact('userdata_r3','userdoc_r3'));
        }
    }

    public function roundresult(Request $request, $v)
    {
        $userdata = UserData::find($request->userid);
        if($v == "r1")
        {
            $userdata->R1_Result = $request->result1;
            $userdata->Inter_Id_R1 = $request->interid1;
            $userdata->update();
            return redirect()->back()->with("status","Interview Of Round 1 Updated");
        }
        elseif($v == "r2")
        {
            $userdata->R2_Result = $request->result2;
            $userdata->Inter_Id_R1 = $request->interid2;
            $userdata->update();
            return redirect()->back()->with("status","Interview Of Round 2 Updated");
        }
        elseif($v == "r3")
        {
            $userdata->R3_Result = $request->result3;
            $userdata->Inter_Id_R1 = $request->interid3;
            $userdata->update();
            return redirect()->back()->with("status","Interview Of Final Round Updated");

        }

    }
}
