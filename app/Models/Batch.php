<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{   
    protected $table='batches';
    protected $primarykey='id';
    protected $fillable=['name','course_id','start_date'];
    use HasFactory;

    // I am gonna make relation with Course model to access it's data
    public function course(){ // Bringing data from Course Model
        return $this->belongsTo(Course::class); // Have access to all attribute/column of Course Class
    }
}
