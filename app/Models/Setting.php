<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
    const CREATED_AT = 'created_at';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable = ['type', 'key', 'photo', 'value', 'status', 'created_by', 'updated_by'];
    // protected $attributes = [
    //     'delayed' => false,
    // ];
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('key', 'like', '%' . $key . '%');
        }
        return $query;
    }
    public static function getValue($key)
    {
        $data = Setting::where('status', 0)
            ->where('key', $key)
            ->first();
        return isset($data->value) ? $data->value : '';
    }
    public static function getImage($key)
    {
        $data = Setting::where('status', 0)
            ->where('key', $key)
            ->first();
        return isset($data->photo) ? $data->photo : '';
    }
}
