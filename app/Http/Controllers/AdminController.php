<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Server;
use App\Type;

class AdminController extends Controller
{
    public function clients() { 
        $clients = User::all();
        return view('admin.clients')->with('clients', $clients);
    }

    public function servers(){
        $servers = Server::all();
        return view('admin.servers.servers')->with('servers', $servers);
    }    

    public function client(User $client) {
        $servers = $client->Server;
        return view('admin.client')->with('user', $client)->with('servers', $servers);
    }

    public function newServer(){
        $types = Type::all();
        $users = User::all()->pluck('email');
        return view('admin.servers.new')->with('types', $types)->with('users', $users);
    }

     public function createServer(){
         $server = new Server;
         $server->name = request('name');
         $server->user_id = User::where('email', request('user'))->first()->id;
         $server->type_id = Type::where('name', request('type'))->first()->id;
         $server->max_players = request('slots');
         $server->max_memory = request('mem');
         $server->cpu_priority = request('proc');
         $server->server_secret = str_random(8);
         $server->current_players = 0;
         $server->status = "offline";
         $server->suspeneded = false;
         $server->max_disk = 999;

         $server->save();
         //decide on a server
                 //host.get avalible ip/port
         //start task to create, socket to server
     }
}
