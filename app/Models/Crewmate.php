<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;

class Crewmate extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'points', 'hall_id'
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

    public function getPoints()
    {
        return $this->attributes['points'];
    }
    public function setPoints($points)
    {
        $this->attributes['points'] += $points;
    }

    public function getHallId()
    {
        return $this->attributes['hall_id'];
    }
    public function setHallId($hallId)
    {
        $this->attributes['hall_id'] = $hallId;
    }

    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public static function validate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'hall_id' => ['required', 'numeric', 'max:255'],
        ]);
    }
}