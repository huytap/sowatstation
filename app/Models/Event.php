<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'sub_title', 'date', 'sowater_id', 'slug', 'cover', 'banner', 'short_desc', 'description', 'address', 'location', 'status', 'created_by', 'updated_by'];
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('title', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public static function getList($id = 0)
    {
        if ($id) {
            $data = Event::where('status', 0)
                ->where('id', '<>', $id)
                ->get();
        } else {
            $data = Event::where('status', 0)
                ->get();
        }
        return $data;
    }

    public static function getBySlug($slug)
    {
        $data = Event::where('slug', $slug)
            ->where('status', 0)
            ->first();
        return $data;
    }

    public static function getListByArt($sowater_id)
    {
        $data = Event::where('status', 0)
            ->where('sowater_id', $sowater_id)
            ->get();
        return $data;
    }
}
