<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sowater extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sowaters';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'avatar', 'avatar_hover', 'priority', 'on_column', 'show_homepage', 'status', 'created_by', 'updated_by'];
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('full_name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public static function getShowHome()
    {
        $data = Sowater::where('status', 0)
            ->where('show_homepage', 1)
            ->get();
        return $data;
    }

    public static function getList()
    {
        $data = Sowater::where('status', 0)
            ->get();
        return $data;
    }

    public static function getInfo($id)
    {
        $data = Sowater::where('status', 0)
            ->where('id', $id)
            ->first();
        return $data;
    }

    public static function getBySlug($slug)
    {
        $data = Sowater::where('slug', $slug)
            ->where('status', 0)
            ->first();
        return $data;
    }
}
