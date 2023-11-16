<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function login(Request $request){

     $username = $request->input('username');
     $password = $request->input('pswd');


     
 }
}
