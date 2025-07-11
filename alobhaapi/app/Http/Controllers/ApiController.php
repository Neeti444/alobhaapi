<?php

namespace App\Http\Controllers;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json(Information::all());
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'post_applied'    => 'required|string|max:255',
            'name'            => 'required|string|max:255',
            'dob'             => 'nullable|string',
            'address'         => 'nullable|string',
            'contact'         => 'nullable|string',
            'email'           => 'nullable|string',
            'expected_ctc'    => 'nullable|string',
            'current_ctc'     => 'nullable|string',
            'notice_period'   => 'nullable|string',
            'total_exp'       => 'nullable|string',
            'name_of_company' => 'nullable|array',
            'qualification'   => 'nullable|array',
            'strengths'       => 'nullable|string',
            'improvement'     => 'nullable|string',
            'leaving_reason'  => 'nullable|string',
            'ach_last_com'    => 'nullable|string',
            'future_add'      => 'nullable|string',
            'reference'       => 'nullable|string',
        ]);

        $information = Information::create($data);

        return response()->json([
            'message' => 'Information created successfully.',
            'information' => $information
        ], 201);
    }

        public function list()
        {
            $lists = Information::all(); 
            return view('list', compact('lists'));
        }

}


