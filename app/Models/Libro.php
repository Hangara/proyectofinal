<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre','user_id','Editorial','Categoria','Isbn','Paginas','Encuadernacion','Tipo','Foto'];
    //protected $guarded =['id'];
    public $timestamps =false;

    public function user(){
        return $this->belongsTo(User::class);
        
    }
}
