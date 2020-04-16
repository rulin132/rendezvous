<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use Uuids;

    /**
     * Model non-incremental and non-numeric ID
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'body', 'user_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
