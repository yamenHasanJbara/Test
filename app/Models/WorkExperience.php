<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = ['position_name', 'description', 'start_date', 'end_date', 'city', 'country', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
