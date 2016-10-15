<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Status;

class RESTAPIController extends Controller
{
	public function add(Request $request)
	{
		return response()->json(Status::add($request));
	}

	public function search(Request $request)
	{
		return response()->json(Status::search($request));
	}

	public function remove(Request $request, $id)
	{
		return response()->json(Status::remove($id));
	}

	public function get(Request $request, $id)
	{
		return response()->json(Status::get($id));
	}
}
