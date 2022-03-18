<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Postcard extends Model
{
    use HasFactory;

    protected $table = 'postcards';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'cover', 'type', 'gif', 'video', 'description', 'status', 'created_by', 'updated_by'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         dd(is_object(Auth::guard(config('app.guards.web'))->user()));
    //         $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
    //         $model->updated_by = NULL;
    //     });

    //     static::updating(function ($model) {
    //         $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
    //     });
    // }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('title', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public static function getList()
    {
        $data = Postcard::where('status', 0)
            ->get();
        return $data;
    }
}
