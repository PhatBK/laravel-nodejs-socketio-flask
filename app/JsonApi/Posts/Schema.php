<?php

namespace App\JsonApi\Posts;

use CloudCreativity\LaravelJsonApi\Schema\EloquentSchema;

class Schema extends EloquentSchema
{

    /**
     * @var string
     */
    protected $resourceType = 'posts';

    /**
     * @var array|null
     */
    protected $attributes = null;

}

