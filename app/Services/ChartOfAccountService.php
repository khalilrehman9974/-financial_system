<?php

namespace App\Services;

/*
 * Class ChartOfAccountService
 * @package App\Services
 * */
use App\Models\ChartOfAccount;

class ChartOfAccountService
{
    /*
    * Store company data.
    * @param $model
    * @param $where
    * @param $data
    *
    * @return object $object.
    * */
    public function findUpdateOrCreate($model, array $where, array $data)
    {
        $object = $model::firstOrNew($where);

        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

    /*
        * Get list of accounts.
        * @param $request
        *
        * @return array $data.
        * */
    public function getAccounts()
    {
        return ChartOfAccount::pluck('name', 'id');
    }

}