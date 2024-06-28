<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'readme', 'upload_file', 'latest_fix', 'type_id'];

    public function type() {
        return $this->belongsTo(Type::class);
    }
    
    public function technologies() {

        return $this->belongsToMany(Technology::class);
    }
}
