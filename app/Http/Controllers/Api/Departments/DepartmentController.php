<?php

namespace App\Http\Controllers\Api\Departments;

use Exception;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class DepartmentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Department::all();

        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $this->validate($request, $rules);
        $data = Department::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Department  $department
     * @return JsonResponse
     */
    public function show(Department $department)
    {
        return $this->showOne($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Department  $department
     * @return JsonResponse
     */
    public function update(Request $request, Department $department)
    {
        $department->fill($request->all());
        if ($department->isClean()) {
            return $this->errorNoClean();
        }
        $department->save();

        return $this->showOne($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Department  $department
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return $this->showOne($department);
    }
}
