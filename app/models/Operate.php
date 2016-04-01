<?php



class Operate extends Eloquent {

	protected $table = 'operate';

    public function day_process(){
        return $this->hasMany('day_process');
    }


}
