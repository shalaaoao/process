<?php

class DayProcess extends Eloquent {

	protected $table = 'day_process';

    public function operate(){
        return $this->belongsTo('operate');
    }

    public function user(){
        return $this->belongsTo('user');
    }
}
