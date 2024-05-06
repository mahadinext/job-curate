<?php

namespace App\Http\Controllers\v1\Ajax;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Ajax\ValidationDataService;

class ValidationDataController extends Controller
{
    /**
     * Fetch expected data
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        // try {
        //     // return response()->json($request->field);
        //     $validationDataService = new ValidationDataService($request);
        //     $response = $validationDataService->getResponse();
        //     return response()->json($response);
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
