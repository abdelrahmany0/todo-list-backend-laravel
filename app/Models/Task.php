<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $name;

    public function getCreatedAtAttribute($value){
        return date('d-m-Y', strtotime($value));
    }
    public function getUpdatedAtAttribute($value){
        return date('d-m-Y', strtotime($value));
    }
}
