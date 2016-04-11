<?php

namespace ZsikTa\LaravelRandomModel;

trait RandomQueryable
{
    /**
     * Scope a query to only one random item.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRandom($query)
    {
        $total = $query->count();

        if ($total > 1) {
            $offset = mt_rand(0, $total - 1);
            $query = $query->skip($offset)->take(1);
        }

        return $query;
    }

    /**
     * Return a random instance of model.
     *
     * @return static|null
     */
    public static function getRandom()
    {
        return static::random()->first();
    }

    /**
     * Return a random instance of model or fail.
     *
     * @return static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getRandomOrFail()
    {
        return static::random()->firstOrFail();
    }
}
