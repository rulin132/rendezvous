<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use Uuids;

    /**
     * Model non-incremental and non-numeric ID
     *
     * @var bool
     */
    public $incrementing = false;
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
