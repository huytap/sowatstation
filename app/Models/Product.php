<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'sowater_id', 'cover', 'cover_mobile', 'sub_title', 'description', 'photos', 'background', 'link_order', 'meta_title', 'meta_description', 'status', 'created_by', 'updated_by'];
    public function sowater()
    {
        return $this->belongsTo('App\Models\Sowater', 'sowater_id');
    }
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
            $data = Product::where('status', 0)
                ->where('id', '<>', $id)
                ->orderByDesc('id')
                ->get();
        } else {
            $data = Product::where('status', 0)
                ->orderByDesc('id')
                ->get();
        }
        return $data;
    }
    public static function getBySlug($slug)
    {
        $data = Product::where('slug', $slug)
            ->where('status', 0)
            ->first();
        return $data;
    }
    public static function getListByArt($sowater_id, $id = 0)
    {
        if ($id) {
            $data = Product::where('status', 0)
                ->where('id', '<>', $id)
                ->whereIn('sowater_id', explode(',', $sowater_id))
                ->orderByDesc('id')
                ->paginate(3);
        } else {
            $data = Product::where('status', 0)
                ->whereRaw('FIND_IN_SET("'.$sowater_id.'", sowater_id)')
                ->orderByDesc('id')
                ->paginate(3);
        }
        return $data;
    }
}
