<?php

namespace App\Http\Controllers\API\Result_test;

use App\Http\Controllers\Controller;
use App\Models\Result_test;
use Illuminate\Http\Request;
use App\Http\Requests\Result_testRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Result_test as Result_testResources;

class Result_testController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result_testResults = Result_testResources::collection(Result_test::all());
        return $this->sendResponse($result_testResults);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Result_testRequest $request)
    {
        $validatedData = $request->validated();
        $result_testResult = new Result_testResources(Result_test::create($validatedData));
        return $this->sendResponse($result_testResult);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result_test  $result_test
     * @return \Illuminate\Http\Response
     */
    public function show(Result_test $result_test)
    {
        $result_testResult = new Result_testResources($result_test);
        return $this->sendResponse($result_testResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result_test  $result_test
     * @return \Illuminate\Http\Response
     */
    public function update(Result_testRequest $request, Result_test $result_test)
    {
        $validatedData = $request->validated();
        $result_testResult = tap($result_test)
                        ->update($validatedData);
        return $this->sendResponse($result_testResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result_test  $result_test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result_test $result_test)
    {
        $result_testResult = $result_test
                        ->delete();
        return $this->sendResponse($result_test);
    }
}
