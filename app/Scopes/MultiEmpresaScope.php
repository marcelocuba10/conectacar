<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MultiEmpresaScope implements Scope{
    public function apply(Builder $builder, Model $model)
    {
        if( Auth()->check() ){
            switch (Auth()->user()->nivel) {
                case 'adm':
                    $builder;
                    break;

                default:
                    $builder->where('emp_id', Auth()->user()->emp_id)->orwhere('emp_id', 0);
                    break;
            }
        }
    }
}