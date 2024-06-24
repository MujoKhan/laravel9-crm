<?php

namespace App\Imports;

use App\Models\UserData;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = UserData::where('Email',$row[1])->get();
        $id = Auth::guard('emp')->user()->id;
        if($user->count()>0)
        {
            $user= UserData::where('Email',$row[1])->update([
                'Name'=>$row[0],
                'Phone' => $row[2],
                'Gender' => $row[3],
                'Course' => $row[4],
                'Data_Admin_id' => $id,
            ]);
        }
        else
        {
            return new UserData([
                'Name' => $row[0],
                'Email' => $row[1],
                'Phone' => $row[2],
                'Gender' => $row[3],
                'Course' => $row[4],
                
            ]);
        } 
    }
}
