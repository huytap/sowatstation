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
    protected $fillable = ['name', 'full_name', 'title', 'type', 'slug', 'background', 'about', 'biography', 'avatar', 'avatar_hover', 'priority', 'on_column', 'show_homepage', 'work_at', 'meta_title', 'meta_description', 'meta_thumnail', 'status', 'created_by', 'updated_by'];
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
    public static function getList($type = [0, 1])
    {
        $data = Sowater::where('status', 0)
            ->wherein('type',  $type)
            ->orderByRaw('priority asc')
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
    public static function getSlugById($id)
    {
        $data = Sowater::where('status', 0)
            ->where('id', $id)
            ->first();
        return $data ? $data->slug : '';
    }
    public static function getAvatarById($id)
    {
        $data = Sowater::where('status', 0)
            ->where('id', $id)
            ->first();
        return $data ? $data->avatar : '';
    }
  	public static function getList2()
    {
        $data = Sowater::where('status', 0)
            //->wherein('type',  $type)
            ->orderByRaw('priority asc')
            ->get();
        return $data;
    }
}
