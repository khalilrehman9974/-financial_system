<?php

namespace App\Services;


use App\Models\CoaMainHead;
use Symfony\Component\Console\Input\Input;

    /*
     * Class BankService
     * @package App\Services
     * */

    use App\Models\Donor;
    // use Illuminate\Support\Facades\Input;

    class CoaMainHeadService
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

    public function search($params)
    {
        $q = CoaMainHead::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }

        $area = $q->orderBy('name', 'ASC')->paginate(CoaMainHead::PER_PAGE);
        return $area;
    }

}


