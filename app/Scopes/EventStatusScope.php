<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EventStatusScope implements Scope
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('status', $this->status);
    }
}
