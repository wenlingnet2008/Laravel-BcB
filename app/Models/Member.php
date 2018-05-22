<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'userid';

    protected $fillable = [
        'true_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function saveMember(){
        $this->password = bcrypt($this->password);
        $this->save();
    }

    public function company(){
        return $this->hasOne('App\Models\Company', 'userid');
    }

    private function generateUserName(){
        if($this->where('name',$this->true_name)->first()){
            return uniqid(substr($this->true_name, 0, 17));
        }
        return $this->true_name;
    }
}
