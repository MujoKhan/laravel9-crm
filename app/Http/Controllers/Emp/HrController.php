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

class HrController extends Controller
{
    public function index($id, $v)
    {
        $userdata = UserData::where('Hr_Id',$id)->get();
        $interviewer = Emp::where('post','Inter Viewer')->get();
        $emp = Emp::all();

        if($v == "show")
        { 
            session()->put('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer','emp')); 
        }
        elseif($v == "r1")
        {
            session()->forget('edithr',1);
            session()->put('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer','emp'));
        }
        elseif($v == "r2")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->put('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer','emp'));
        }
        elseif($v == "r3")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->put('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer','emp'));
        }
        elseif($v == "selected")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->put('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer'));
        }
        elseif($v == "off")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->put('off',1);
            session()->forget('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer'));
        }
        elseif($v == "Not Interested")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->put('notinterested',1);
            session()->forget('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer'));
        }
        elseif($v == "all")
        {
            session()->forget('edithr',1);
            session()->forget('r1',1);
            session()->forget('r2',1);
            session()->forget('r3',1);
            session()->forget('selected',1);
            session()->forget('off',1);
            session()->forget('notinterested',1);
            session()->put('all',1);
            return view('hr.edit-assign',compact('userdata','interviewer'));
        }
    }

    public function edit($id)
    {
        $userdata = UserData::where('id',$id)->get();
        return view('hr.form',compact('userdata'));
    }

    public function update(Request $request, $id)
    {
        $userdata = UserData::find($id);

        $userdoc = UserDoc::where('User_Id',$id)->get(); 
        $userdocinsert = new UserDoc;

        if($request->hasfile('cv'))
          {
            $file = $request->file('cv');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('cv',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('cv',$data->User_Resume);
                }
          }
          if($request->hasfile('photo'))
          {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('photo',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('photo',$data->User_Photo);
                }
          }
          if($request->hasfile('m10th'))
          {
            $file = $request->file('m10th');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('m10th',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('m10th',$data->User_10_Class);
                }
          }
          if($request->hasfile('m12th'))
          {
            $file = $request->file('m12th');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('m12th',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('m12th',$data->User_12_Class);
                }
          }
          if($request->hasfile('u1m'))
          {
            $file = $request->file('u1m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u1m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u1m',$data->User_Ug_1st);
                }
          }
          if($request->hasfile('u2m'))
          {
            $file = $request->file('u2m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u2m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u2m',$data->User_Ug_2nd);
                }
          }
          if($request->hasfile('u3m'))
          {
            $file = $request->file('u3m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u3m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u3m',$data->User_Ug_3rd);
                }
          }
          if($request->hasfile('u4m'))
          {
            $file = $request->file('u4m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u4m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u4m',$data->User_Ug_4th);
                }
          }
          if($request->hasfile('u5m'))
          {
            $file = $request->file('u5m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u5m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u5m',$data->User_Ug_5th);
                }
          }
          if($request->hasfile('u6m'))
          {
            $file = $request->file('u6m');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('u6m',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('u6m',$data->User_Ug_6th);
                }
          }
          if($request->hasfile('idproof'))
          {
            $file = $request->file('idproof');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('marksheet', $filename);
            session()->put('idproof',$filename);
          }
          else{
                foreach($userdoc as $data)
                {
                    session()->put('idproof',$data->User_Id_Proof);
                }
          }
          
          if($userdoc->count()>0)
          {
            $userdata->Name = $request->name;
            $userdata->Email  = $request->email;
            $userdata->Phone = $request->phone;
            $userdata->Gender = $request->gender;
            $userdata->DOB = $request->dob;
            $userdata->Course = $request->course;
            $userdata->Address = $request->address;
            $userdata->City = $request->city;
            $userdata->State = $request->state;
            $userdata->Call_Response = $request->callresp;
            $userdata->update();

            $userdoc1 = UserDoc::where('User_Id',$id)
                ->update([
                    'User_Photo' => session()->get('photo'),
                    'User_Resume' => session()->get('cv'),
                    'User_10_Class' => session()->get('m10th'),
                    'User_12_Class' => session()->get('m12th'),
                    'User_Ug_1st' => session()->get('u1m'),
                    'User_Ug_2nd' => session()->get('u2m'),
                    'User_Ug_3rd' => session()->get('u3m'),
                    'User_Ug_4th' => session()->get('u4m'),
                    'User_Ug_5th' => session()->get('u5m'),
                    'User_Ug_6th' => session()->get('u6m'),
                    'User_Id_Proof' => session()->get('idproof'),
                 

                ]);
            // $userdocupdate->User_Photo = session()->get('photo');
            // $userdocupdate->User_Resume = session()->get('cv');
            // $userdocupdate->User_10_Class = session()->get('m10th');
            // $userdocupdate->User_12_Class = session()->get('m12th');
            // $userdocupdate->User_Ug_1st = session()->get('u1m');
            // $userdocupdate->User_Ug_2nd = session()->get('u2m');
            // $userdocupdate->User_Ug_3rd = session()->get('u3m');
            // $userdocupdate->User_Ug_4th = session()->get('u4m');
            // $userdocupdate->User_Ug_5th = session()->get('u5m');
            // $userdocupdate->User_Ug_6th = session()->get('u6m');
            // $userdocupdate->User_Id_Proof = session()->get('idproof');
            // $userdocupdate->update();
            return redirect()->back()->with("status","Data Updated");
          }
          else
          {
            $userdata->Name = $request->name;
            $userdata->Email  = $request->email;
            $userdata->Phone = $request->phone;
            $userdata->Gender = $request->gender;
            $userdata->DOB = $request->dob;
            $userdata->Course = $request->course;
            $userdata->Address = $request->address;
            $userdata->City = $request->city;
            $userdata->State = $request->state;
            $userdata->Call_Response = $request->callresp;
            $userdata->update();

            $userdocinsert->User_Id = $id;
            $userdocinsert->User_Photo = session()->get('photo');
            $userdocinsert->User_Resume = session()->get('cv');
            $userdocinsert->User_10_Class = session()->get('m10th');
            $userdocinsert->User_12_Class = session()->get('m12th');
            $userdocinsert->User_Ug_1st = session()->get('u1m');
            $userdocinsert->User_Ug_2nd = session()->get('u2m');
            $userdocinsert->User_Ug_3rd = session()->get('u3m');
            $userdocinsert->User_Ug_4th = session()->get('u4m');
            $userdocinsert->User_Ug_5th = session()->get('u5m');
            $userdocinsert->User_Ug_6th = session()->get('u6m');
            $userdocinsert->User_Id_Proof = session()->get('idproof');
            $userdocinsert->save();
            return redirect()->back()->with("status","New Data Inserted");
          }
          
    }

     public function profile(Request $request)
    {
        $valid = $request->validate([
          'name' => ['required','regex:/^[a-zA-Z ]+$/'],
        //   'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
          'phone' => ['required','digits:10'],
          'gender'=>'required',
        ],[
          'name.regex'=>'The Name Should be Only String',
        //   'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
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
        return redirect()->back()->with("status","HR Has Been Updated");
      }
      else
      {
        return redirect()->back()->with("status","HR Not Update");
      }  
    }


    public function assign( $id, $v)
    {
      $userdata = UserData::where('id',$id)->get();
      $interviewer = Emp::where('post','Inter Viewer')
                  ->where('permission','Yes')->get();
      if($v == "r1")
      {
        session()->put('r1',1);
        session()->forget('r2',1);
        session()->forget('r3',1);
        session()->forget('selection',1);
        return view('hr.assign',compact('userdata','interviewer'));
      }
      elseif($v == "r2")
      {
        session()->forget('r1',1);
        session()->put('r2',1);
        session()->forget('r3',1);
        session()->forget('selection',1);
        return view('hr.assign',compact('userdata','interviewer'));
      }
      elseif($v == "r3")
      {
        session()->forget('r1',1);
        session()->forget('r2',1);
        session()->put('r3',1);
        session()->forget('selection',1);
        return view('hr.assign',compact('userdata','interviewer'));
      }
      elseif($v == "selection")
      {
        session()->forget('r1',1);
        session()->forget('r2',1);
        session()->forget('r3',1);
        session()->put('selection',1);
        return view('hr.assign',compact('userdata'));
      }
    }

    public function allround(Request $request, $id, $r)
    {
        if($r == "r1")
        {
            $userdata = UserData::find($id);
            $userdata->Round_1 = 1;
            $userdata->Inter_Id_R1 = $request->interid;
            $userdata->update();
            // return view('hr.hr-home');
            return redirect()->back()->with("status","User Has Been Assgined For Round 1");
        }
        elseif($r == "r2")
        {
            $userdata = UserData::find($id);
            $userdata->Round_2 = 1;
            $userdata->Inter_Id_R2 = $request->interid;
            $userdata->update();
            return redirect()->back()->with("status","User Has Been Assgined For Round 2");
        }
        elseif($r == "r3")
        {
            $userdata = UserData::find($id);
            $userdata->Round_3 = 1;
            $userdata->Inter_Id_R3 = $request->interid;
            $userdata->update();
            return redirect()->back()->with("status","User Has Been Assgined For Final Round");
        }
        elseif($r == "selection")
        {
            $userdata = UserData::find($id);
            $userdata->Select_Status = $request->selected;
            $userdata->update();
            return redirect()->back()->with("status","User Response Has Been Submitted");
        }
    }
}
