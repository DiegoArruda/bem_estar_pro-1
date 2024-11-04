<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['id','title','link','content_type_id'];


    public function contentType()
    {

        return $this->belongsTo(ContentType::class);
    }
}
