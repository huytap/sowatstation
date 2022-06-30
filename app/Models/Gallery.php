<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Gallery extends Model
{
    protected $table = 'galleries';
    const CREATE_AT = 'create_at';
    use HasFactory;
    protected $fillable = ['event_id', 'photo', 'original_name', 'file_size', 'file_type', 'priority', 'link_url', 'status', 'created_by', 'updated_by'];
    public function scopeSearch($query)
    {
        if ($status = request()->status) {
            $query = $query->where('status', '=', $status);
        }
        return $query;
    }
    public static function getList($event_id = 0, $limit = 0, $type = 0)
    {
        if ($limit) {
            $data = Gallery::where('status', 0)
                ->where('event_id', $event_id)
                ->where('type', $type)
                ->orderBy('priority')
                ->paginate($limit);
        } else {
            $data = Gallery::where('status', 0)
                ->where('event_id', $event_id)
                ->where('type', $type)
                ->orderBy('priority')
                ->get();
        }
        return $data;
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $userid = (!Auth::guest()) ? Auth::user()->id : null;
            $model->created_by = $userid;
            $model->updated_by = $userid;
        });
        static::updating(function ($model) {
            $userid = (!Auth::guest()) ? Auth::user()->id : null;
            $model->updated_by = $userid;
        });
    }
}
