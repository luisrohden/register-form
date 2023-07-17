<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $validadeRules = [
        'cpf' => 'required|min:11|unique:users|cpf',
                'firstname' => 'required|min:3',
                'lastname' =>'required|min:3',
                'born' => 'required|date',
                'genre' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
    ];
    public function index(){
        $users = User::all();
        //dd($users);
        $data = [
            'users' => $users,
        ];

        return view('user/index',$data);
    }
    public function view(Request $request){
        $user = User::find($request->user_id);
        $data = [
            'user' => $user,
        ];
        return view('user/view',$data);
    }
    public function edit(Request $request){
        $user = User::find($request->user_id);
        $data = [
            'user' => $user,
        ];
        return view('user/edit',$data);
    }
    public function editAction(Request $request){
        $user = User::find($request->user_id);
        $data = $request->only('cpf','firstname','lastname','born','genre','email');
        $data['born'] = join('-',array_reverse(explode('/',$data['born'])));
        $updateRule = [];
        $updateFields = [];
        foreach($data as $field => $value){
            if($value != $user->$field){
                $updateRule[$field] = $this->validadeRules[$field];
                $updateFields[$field] = $value;
            }
        }

        if(count($updateRule)){
            $validator = Validator::make(
                $updateFields,
                $updateRule
            );
            if ($validator->fails()) {
                Session::flash('form-errors',$validator->errors()->all());
                return view('back');
            }
        }
        if(count($updateFields)){
            foreach($updateFields as $field => $value){
                $user->$field = $value;
            }
        }
        $user->save();
        Session::flash('alert-text','Usuário atualizado com sucesso');
        return redirect('/');
    }
    public function register(){
        return view('user/register');
    }
    public function delete(Request $request){
        $user = User::find($request->user_id);
        return view('user/delete',['name' => $user->name]);
    }
    public function deleteAction(Request $request){
        $user = User::find($request->user_id);
        $user->delete();
        Session::flash('alert-text','Usuário excluído com sucesso');
        return redirect('/');

    }
    public function registerAction(Request $request){
        $data = $request->only('cpf','email','firstname','lastname','born','genre');
        $data['born'] = join('-',array_reverse(explode('/',$data['born'])));
        $validator = Validator::make(
            $data,
            $this->validadeRules
        );
        if ($validator->fails()) {
            Session::flash('form-errors',$validator->errors()->all());
            return view('back');
        }
        $data['name'] = $data['firstname'].' '.$data['lastname'];
        $data['password'] = '';
        //dd($data);
        $register = new User();
        $register->insert($data);
        Session::flash('alert-text','Usuário cadastrado com sucesso');
        return redirect('/');
    }
}
