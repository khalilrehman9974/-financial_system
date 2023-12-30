<?php

namespace App\Services;


use App\Models\CoaMainHead;

    /*
     * Class StoreIssueNoteService
     * @package App\Services
     * */

    use App\Models\Donor;

    class StoreIssueNoteService
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

        foreach ($data as $property => $value){
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

}


