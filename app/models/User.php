<?php

class User extends Eloquent{


    protected $guarded = array('id');
    protected $hidden = array('password');
	protected $table = 'user';

    public function day_process(){
        return $this->hasMany('day_process');
    }
}
