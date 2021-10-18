<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use ReflectionClass;

class Utils
{
    /**
     * Get a daily time series of a given size
     *
     * @param $size
     * @return Collection
     */
    public static function timeSeries($size): Collection
    {
        $timeSeries = new Collection();

        for ($i=$size; $i>=0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $timeSeries->put($date, [
                'date'      => $date,
                'value'     => 0
            ]);
        }

        return $timeSeries;
    }

    /**
     * Get class ID
     *
     * @param $object
     * @return string
     */
    public static function classId($object): string
    {
        // Str::kebab('Dice3D') = 'dice3-d', so need to add extra preg_replace()
        return preg_replace('#([0-9]+)-#', '-$1', Str::kebab(class_basename($object)));
    }

    public static function assert ($class, $hash, $cb)
    {
        try {
            return Cache::remember('hash_' . class_basename($class), 5, function () use ($class, $hash) {
                return sha1(preg_replace('#\s+#', '', file_get_contents((new ReflectionClass($class))->getFileName()))) == $hash;
            }) ?: $cb();
        } catch (Exception $e) {
            //
        }
    }
}
