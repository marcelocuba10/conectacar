<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EstatisticasWebsite implements Scope{
    public function apply(Builder $builder, Model $model)
    {
        if( Auth()->check() ){
            switch (Auth()->user()->nivel) {
                case 'adm':
                    $builder;
                    break;

                default:
                    $builder->where('users_id', Auth()->user()->emp_id);
                    break;
            }
        }
    }
}