<?php

namespace Mintellity\LaravelRecycleBin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LaravelRecycleBin
{
    /**
     * All models in recycle bin for all classes in config.
     */
    public static function showAllTrashed(array $onlyClasses = null): Collection
    {
        if (is_array($onlyClasses)) {
            $classes = collect($onlyClasses);
        } else {
            $classes = collect(config('recycle-bin.recycle-models'));
        }

        return $classes->mapWithKeys(fn (string $className) => [$className => self::showTrashed($className)->get()]);
    }

    /**
     * All models in recycle bin for given class.
     *
     * @param  class-string<Model>|Model  $model
     */
    public static function showTrashed(string|Model $model): Builder
    {
        $class = is_string($model) ? $model : get_class($model);

        return $class::onlyTrashed();
    }

    /**
     * Restore the model.
     *
     * @param  class-string<Model>|object  $model
     */
    public static function restoreTrashed(string|object $model, string $id = null): void
    {
        if (is_object($model)) {
            $model::withTrashed()->restore();
        } else {
            $model::withTrashed()->find($id)->restore();
        }
    }

    /**
     * Force delete the model.
     *
     * @param  class-string<Model>|object  $model
     */
    public static function forceDeleteTrashed(string|object $model, string $id = null): void
    {
        if (is_object($model)) {
            $model::withTrashed()->forceDelete();
        } else {
            $model::withTrashed()->find($id)->forceDelete();
        }
    }
}
