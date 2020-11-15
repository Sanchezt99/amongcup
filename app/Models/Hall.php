<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Crewmate;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'password', 'matches'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }
    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getMatches()
    {
        return $this->attributes['matches'];
    }
    public function addMatch()
    {
        $this->attributes['matches']++;
    }

    public function crew(){
        return $this->hasMany(Crewmate::class);
    }

}
