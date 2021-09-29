<?php

namespace Sparkout\Post;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkout\Post\Skeleton\SkeletonClass
 */
class PostFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'post';
    }
}
