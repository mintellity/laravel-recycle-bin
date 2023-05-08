<?php

namespace Mintellity\LaravelRecycleBin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LaravelRecycleBin
{
    /**
     * All models in recycle bin for all classes in config.
     *
     * @return Collection
     */
    public static function showAllTrashed(): Collection
    {
        return collect(config('recycle-bin.recycle-models'))
            ->mapWithKeys(fn (string $className) => self::showTrashed($className));
    }

    /**
     * All models in recycle bin for given class.
     *
     * @param class-string<Model>|Model $model
     * @return Collection
     */
    public static function showTrashed(string|Model $model): Collection
    {
        $class = is_string($model) ? $model : get_class($model);

        return $class::onlyTrashed()->get();
    }
}
