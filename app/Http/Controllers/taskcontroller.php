<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user_login;
use App\Models\task;
use App\Models\user_task;
use App\Models\User;
use Hash;
use Session;

class taskcontroller extends Controller
{
    function postlogin(Request $req){
        $cred = $req->only('email', 'password');

        if(Auth::attempt($cred)){
            $user = Auth::user();
            return redirect('home');
        }else {
            $str = "Invalid email or password !!!";
            return redirect()->back()->with(['msg'=>$str]);
        }
    }

    function home(){
        if(Auth::check()){
            $uid = Auth::user()->id;
            $is_admin = Auth::user()->is_superuser;
            if($is_admin == 1){
                $users = User::all();
                $data = compact('users');
                return view('home')->with($data)->with('is_admin', $is_admin);
            }
            else{
                $assigned_task = user_task::where('user_id',$uid)->get();
                $task_detail=[];
                foreach ($assigned_task as $task) {
                    $t = task::where('id',$task->task_id)->first();
                    array_push($task_detail, $t);
                }
                $data = compact('assigned_task', 'task_detail');
                return view('home')->with($data)->with('is_admin', $is_admin);
            }
        }
        else{
            $str = "Login first !!!";
            return redirect('login')->with(['msg'=>$str]);
        }
    }

    function insert_user(Request $req)
    {
        if (isset($req['check'])) {
            User::create([
                'name'=>$req['name'],
                'email'=>$req['email'],
                'password'=>Hash::make($req['pass']),
                'is_superuser'=>1
            ]);
        }
        else{
            User::create([
                'name'=>$req['name'],
                'email'=>$req['email'],
                'password'=>Hash::make($req['pass']),
                'is_superuser'=>0
            ]);
        }

        $str = "New user added.";
        return redirect()->back()->with(['msg'=>$str]);
    }

    function insert_task(Request $req)
    {
        $new_task = new task();
        $new_task->title = $req['title'];
        $new_task->description = $req['desc'];
        $new_task->priority = intval($req['priority']);
        $new_task->save();

        $str = "New task added.";
        return redirect()->back()->with(['msg'=>$str]);
    }

    function post_changepass(Request $req){
        $user = Auth::user();

        if(!(Hash::check($req->get('old_pass'), $user->password))){
            $str = "Old password is wrong !!!";
        }
        elseif (strcmp($req->get('old_pass'), $req->get('new_pass')) == 0) {
            $str = "Old password and new password should not be same !!!";
        }
        else {
            $user->password = Hash::make($req->get('new_pass'));
            $user->save();

            Session::flush();
            Auth::logout();

            $str = "Password changed successfuly. Login with new password.";
            return redirect('login')->with(['msg'=>$str]);
        }
        return redirect()->back()->with(['err'=>$str]);
    }

    function assign_task(){
        $taskdata = task::all();
        $userdata = User::where('is_superuser',0)->get();
        $data = compact('taskdata', 'userdata');
        return view('assign_task')->with($data)->with('is_admin', Auth::user()->is_superuser);
    }

    function post_assign_task(Request $req){
        $user_list = $req['users'];
        $task_list = $req['tasks'];
        $s_date = $req['start_date'];
        $e_date = $req['end_date'];

        $insert_data = [];
        foreach($user_list as $uid){
            foreach ($task_list as $tid){
                $data = ['user_id'=>intval($uid), 'task_id'=>intval($tid), 'start_date'=>$s_date, 'end_date'=>$e_date];
                array_push($insert_data, $data);
            }
        }
        user_task::insert($insert_data);
        $str = "Tasks are assigned to selected users.";
        return redirect()->back()->with(['msg'=>$str]);
    }

    function add_user(){
        return view('add_user')->with('is_admin', Auth::user()->is_superuser);
    }

    function add_task(){
        return view('add_task')->with('is_admin', Auth::user()->is_superuser);
    }

    function changepass(){
        return view('change_password')->with('is_admin', Auth::user()->is_superuser);
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
