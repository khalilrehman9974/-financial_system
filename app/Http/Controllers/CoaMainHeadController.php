<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoaMainHeadRequest;
use App\Models\CoaMainHead;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Services\CoaMainHeadService;
use Illuminate\Support\Facades\Auth;

class CoaMainHeadController extends Controller
{
    private $coaMainHeadService;
    private $permissionService;
    const PER_PAGE = 10;

    public function __construct(CoaMainHeadService $coaMainHeadService, PermissionService $permissionService)
    {
        $this->coaMainHeadService = $coaMainHeadService;
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $mainHeads = CoaMainHead::paginate(self::PER_PAGE);
        $permission = $this->permissionService->getUserPermission(Auth::user()->id, '24');

        return view('coa.main_head.index', compact('mainHeads', 'permission'));
    }


    public function create()
    {
        $pageTitle = 'Create Main Head';
        $permission = $this->permissionService->getUserPermission(Auth::user()->id, '24');
        return view('coa.main_head.create', compact('permission','pageTitle'));
    }


    public function store(CoaMainHeadRequest $request)
    {
        $data = $request->except('_token','id');
        $this->coaMainHeadService->findUpdateOrCreate(CoaMainHead::class, ['id'=>!empty(request('id')) ? request('id') : null], $data);
        $message = config(
            'constants.add'
        );
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('mainHead/list');
    }


    public function edit($id)
    {
        $mainHead = CoaMainHead::find($id);
        $permission = $this->permissionService->getUserPermission(Auth::user()->id, '13');

        return view('coa.main_head.create', compact('mainHead', 'permission'));

    }


    public function destroy()
    {
        $deleted = CoaMainHead::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete') ;
        } else {
            $message = config('constants.wrong') ;
        }
        session()->flash('message', $message);
        return redirect('mainHead/list');
    }

}
