<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author', 'edition', 'year', 'genre', 'company', 'synopsis'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];    

    //Datas
    public function getCreatedAtAttribute($value) 
    {
        return date("d/m/Y H:m:s", strtotime($value));
    }
    public function getUpdatedAtAttribute($value) 
    {
        return date("d/m/Y H:m:s", strtotime($value));
    }
    public function getDeletedAtAttribute($value) 
    {
        if (is_null($value)) {
            return $value;
        }
        return date("d/m/Y H:m:s", strtotime($value));
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
}