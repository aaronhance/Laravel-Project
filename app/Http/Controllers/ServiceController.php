<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Server;

class ServiceController extends Controller
{
    public function servers(){
        $servers = Auth::user()->Server;
        return view('servers')->with('servers', $servers);
    }

    public function server(Server $server){
        return view("services.server")->with('server', $server);
    }
}
