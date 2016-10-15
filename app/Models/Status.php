<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class Status extends Model
{
	protected $table = 'status';
	public $timestamps = false;

	public static function add(Request $request)
	{
		$status = new Status();
		$status->email = trim($request->email);
		$status->status = trim($request->status);

		$result = false;
		try {
			$result = $status->save();
		} catch (\Exception $e) {
			return Error::where('code', 400)->first();
		}

		if ($result) {
			if (filter_var($status->email, FILTER_VALIDATE_EMAIL)) {
				Status::sendEmail($status->email);
			}
		}

		return [
			'status' => 'ok',
		];
	}

	private static function sendEmail($to)
	{
		Mail::to($to)->queue(new ConfirmationEmail());
	}

	public static function search(Request $request)
	{
		$builder = null;
		$defaultRows = 20;
		$defaultPage = 1;
		$q = $request->query->get('q', null);
		$p = $request->query->get('p', $defaultPage);
		$r = $request->query->get('r', $defaultRows);

		// status criteria
		if (!empty($q)) {
			$builder = self::where('status', 'like', join(['%',$q,'%'], ''));
		}

		// limit of rows
		if (!empty($r)) {
			if (isset($builder)) {
				$builder->take($r);
			} else {
				$builder = self::take($r);
			}
		}

		// pagination
		if (!empty($p)) {
			if (!empty($r)) {
				$builder->skip($p - 1);
			} else {
				$builder = self::take($defaultRows)->skip($p - 1);
			}
		}

		// order for all request
		if (isset($builder)) {
			$builder->orderBy('created_at', 'desc');
		}

		return $builder->get();
	}

	public static function remove($id)
	{
		try {
			$status = self::find($id);
			$result = $status->delete();
		} catch (\Exception $e) {
			return Error::where('code', 401)->first();
		}

		return [
			'email' => $status->email,
		];
	}

	public static function get($id)
	{
		try {
			return self::findOrFail($id);
		} catch (\Exception $e) {
			return Error::where('code', 401)->first();
		}

		return [
			'email' => $status->email,
		];
	}
}
