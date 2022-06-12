<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'category_id', 'cover', 'cover_mobile', 'tags', 'description', 'photos', 'status', 'created_by', 'updated_by'];
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
            $data = Project::where('status', 0)
                ->where('id', '<>', $id)
                ->get();
        } else {
            $data = Project::where('status', 0)
                ->get();
        }
        return $data;
    }

    public static function getBySlug($slug)
    {
        $data = Project::where('slug', $slug)
            ->where('status', 0)
            ->first();
        return $data;
    }

    public static function getListByArt($sowater_id)
    {
        $data = Poject::where('status', 0)
            ->where('sowater_id', $sowater_id)
            ->get();
        return $data;
    }
}
