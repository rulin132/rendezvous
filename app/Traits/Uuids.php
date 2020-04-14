<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Uuid\Uuid;

/**
 * Trait UuidModel
 * @package App\Traits
 */
trait Uuids
{

    /**
     * Binds creating/saving events to create UUIDs (and also prevent them from being overwritten).
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Don't let people provide their own UUIDs, we will generate a proper one.
            $model->id = self::generateNewId();
        });

        static::saving(function ($model) {
            // What's that, trying to change the UUID huh?  Nope, not gonna happen.
            $original_uuid = $model->getOriginal('uuid');

            if ($original_uuid !== $model->uuid) {
                $model->id = $original_uuid;
            }
        });
    }

    /**
     * Get a new version 4 (random) UUID.
     *
     * @return string A 22 character Unique Identifier
     */
    public static function generateNewId(): string
    {
        // 1. Generate the UUID.
        $uuid = Uuid::uuid4();
        // 2. Strip the dashes.
        $uuid = str_replace('-', '', $uuid);

        // 3. Convert from hex to base62.
        $uuid = gmp_strval(gmp_init(($uuid), 16), 62);

        // We pad zeros to the beginning, as the result returned by gmp_strval after base conversion
        // is not always 22 characters long.
        $uuid = str_pad($uuid, 22, '0', STR_PAD_LEFT);

        return $uuid;
    }
}
