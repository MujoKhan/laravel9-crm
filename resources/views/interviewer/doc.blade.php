@extends('interviewer.app')
@section('interviewer-content')
@if(session()->get('r1') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card ">
               
                <div class="card-header bg-primary">

                    1st Interview
                   
                </div>
                <div class="card-body colorDesign">
                    <div class="row ">
                        <div class="col-md-6 ">
                            @foreach($userdoc_r1 as $doc1)
                            <img src="{{ asset('marksheet/'.$doc1->User_Photo)}}" class="rounded mx-auto d-block "
                                width="60%" height="30%" alt="">
                            @endforeach

                            <div class="row mt-2">
                                @foreach($userdata_r1 as $r1)
                                <div class="col-md-5 offset-md-4">
                                    <table class="">
                                        <tr>
                                            <th>Name :- </th>
                                            <th>{{$r1->Name}}</th>
                                        </tr>
                                        <tr>
                                            <th>Email :- </th>
                                            <th>{{$r1->Email}}</th>
                                        </tr>
                                        <tr>
                                            <th>Phone :- </th>
                                            <th>{{$r1->Phone}}</th>
                                        </tr>
                                        <tr>
                                            <th>Course :- </th>
                                            <th>{{$r1->Course}}</th>
                                        </tr>
                                        <tr>
                                            <th>Gender :- </th>
                                            <th>{{$r1->Gender}}</th>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($userdoc_r1 as $doc1)
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Resume)}}" target="_blank"><button
                                            class="btn btn-primary w-50">Resume</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_10_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">10th</button></a>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_12_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">12th</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_1st)}}" target="_blank"><button
                                            class="btn btn-primary w-50">1st Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_2nd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">2nd Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_3rd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">3rd Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_4th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">4th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_5th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">5th Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Ug_6th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">6th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc1->User_Id_Proof)}}" target="_blank"><button
                                            class="btn btn-primary w-50">ID Proof</button></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                @foreach($userdata_r1 as $r1)
                                <div class="col-md-12  mt-3">
                                    <form action="{{ route('user.interviewer.round-result',['v'=>'r1'])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="userid" value="{{$r1->id}}">
                                        <label for="">Response</label>
                                        <input type="hidden" name="interid1" value="{{Auth::guard('emp')->user()->id}}">
                                        <select name="result1" id="" class="form-control">
                                            <option value="Completed">Completed</option>
                                            <option value="Not Completed">Not Completed</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        <button class="btn btn-success w-50 mt-3 mx-auto d-block">DONE</button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@elseif(session()->get('r2') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card ">
                <div class="card-header bg-primary">

                    2nd Interview

                </div>
                <div class="card-body colorDesign">
                    <div class="row ">
                        <div class="col-md-6 ">
                            @foreach($userdoc_r2 as $doc2)
                            <img src="{{ asset('marksheet/'.$doc2->User_Photo)}}" class="rounded mx-auto d-block "
                                width="60%" height="30%" alt="">
                            @endforeach

                            <div class="row mt-2">
                                @foreach($userdata_r2 as $r2)
                                <div class="col-md-5 offset-md-4">
                                    <table class="">
                                        <tr>
                                            <th>Name :- </th>
                                            <th>{{$r2->Name}}</th>
                                        </tr>
                                        <tr>
                                            <th>Email :- </th>
                                            <th>{{$r2->Email}}</th>
                                        </tr>
                                        <tr>
                                            <th>Phone :- </th>
                                            <th>{{$r2->Phone}}</th>
                                        </tr>
                                        <tr>
                                            <th>Course :- </th>
                                            <th>{{$r2->Course}}</th>
                                        </tr>
                                        <tr>
                                            <th>Gender :- </th>
                                            <th>{{$r2->Gender}}</th>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($userdoc_r2 as $doc2)
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Resume)}}" target="_blank"><button
                                            class="btn btn-primary w-50">Resume</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_10_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">10th</button></a>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_12_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">12th</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_1st)}}" target="_blank"><button
                                            class="btn btn-primary w-50">1st Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_2nd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">2nd Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_3rd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">3rd Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_4th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">4th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_5th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">5th Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Ug_6th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">6th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc2->User_Id_Proof)}}" target="_blank"><button
                                            class="btn btn-primary w-50">ID Proof</button></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                @foreach($userdata_r2 as $r2)
                                <div class="col-md-12  mt-3">
                                    <form action="{{ route('user.interviewer.round-result',['v'=>'r2'])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="userid" value="{{$r2->id}}">
                                        <label for="">Response</label>
                                        <input type="hidden" name="interid2" value="{{Auth::guard('emp')->user()->id}}">
                                        <select name="result2" id="" class="form-control">
                                            <option value="Completed">Completed</option>
                                            <option value="Not Completed">Not Completed</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        <button class="btn btn-success w-50 mt-3 mx-auto d-block">DONE</button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@elseif(session()->get('r3') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card ">
                <div class="card-header bg-primary">

                    3rd Interview

                </div>
                <div class="card-body colorDesign">
                    <div class="row ">
                        <div class="col-md-6 ">
                            @foreach($userdoc_r3 as $doc3)
                            <img src="{{ asset('marksheet/'.$doc3->User_Photo)}}" class="rounded mx-auto d-block "
                                width="60%" height="30%" alt="">
                            @endforeach

                            <div class="row mt-2">
                                @foreach($userdata_r3 as $r3)
                                <div class="col-md-5 offset-md-4">
                                    <table class="">
                                        <tr>
                                            <th>Name :- </th>
                                            <th>{{$r3->Name}}</th>
                                        </tr>
                                        <tr>
                                            <th>Email :- </th>
                                            <th>{{$r3->Email}}</th>
                                        </tr>
                                        <tr>
                                            <th>Phone :- </th>
                                            <th>{{$r3->Phone}}</th>
                                        </tr>
                                        <tr>
                                            <th>Course :- </th>
                                            <th>{{$r3->Course}}</th>
                                        </tr>
                                        <tr>
                                            <th>Gender :- </th>
                                            <th>{{$r3->Gender}}</th>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($userdoc_r3 as $doc3)
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Resume)}}" target="_blank"><button
                                            class="btn btn-primary w-50">Resume</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_10_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">10th</button></a>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_12_Class)}}" target="_blank"><button
                                            class="btn btn-primary w-50">12th</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_1st)}}" target="_blank"><button
                                            class="btn btn-primary w-50">1st Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_2nd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">2nd Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_3rd)}}" target="_blank"><button
                                            class="btn btn-primary w-50">3rd Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_4th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">4th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_5th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">5th Sem</button></a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Ug_6th)}}" target="_blank"><button
                                            class="btn btn-primary w-50">6th Sem</button></a>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <a href="{{ asset('marksheet/'.$doc3->User_Id_Proof)}}" target="_blank"><button
                                            class="btn btn-primary w-50">ID Proof</button></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                @foreach($userdata_r3 as $r3)
                                <div class="col-md-12  mt-3">
                                    <form action="{{ route('user.interviewer.round-result',['v'=>'r3'])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="userid" value="{{$r3->id}}">
                                        <label for="">Response</label>
                                        <input type="hidden" name="interid3" value="{{Auth::guard('emp')->user()->id}}">
                                        <select name="result3" id="" class="form-control">
                                            <option value="Completed">Completed</option>
                                            <option value="Not Completed">Not Completed</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        <button class="btn btn-success w-50 mt-3 mx-auto d-block">DONE</button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endif
@endsection