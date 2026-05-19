<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
     protected $guarded  = ['id'];
     protected $table = "album";
     
     public function album()
    {
        return $this->belongsTo(album::class);
    }

}
