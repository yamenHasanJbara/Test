<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Info extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['address', 'phone', 'birthday', 'gender', 'nationality', 'university',
        'degree', 'summary', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getInfoByUserId($id)
    {
        return self::where('user_id', '=', $id)->exists();
    }
}
