<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Admin extends Eloquent implements UserInterface, RemindableInterface {
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    
	protected $table = 'admins';
	protected $softDelete = true;
	protected $guarded = array('id');
	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail() 
	{
		return $this->email;
	}

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($token)
    {
        $this->remember_token = $token;
    }

    public function getRememberTokenName()
    {
        return "remember_token";
    }

}