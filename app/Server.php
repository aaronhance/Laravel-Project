<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
    public function Type(){
        return $this->hasOne('App\Type', 'id', 'type_id');
    }

    public function Host(){
        return $this->hasOne('App\Host', 'id', 'host_id');
    }
}
