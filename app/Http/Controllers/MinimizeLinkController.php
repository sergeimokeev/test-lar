<?php

namespace App\Http\Controllers;

use App\Http\Requests\MinimizeLinkRequest;
use App\Services\MinimizeLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MinimizeLinkController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(MinimizeLinkRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $data['code'] = Str::random(15);

        foreach ($data as $key => $value) {
            session()->put($key, $value);
        }
        return response()->json([
            'success' => 'Выполнено!',
            'minlink' => route('minimizedLink', ['code' => $data['code']]),
        ]);
    }

    public function redirectToMinLink()
    {
        if (session()->get('code') !== request()->query('code'))
            abort(404);
        return redirect(session()->get('link'));
    }
}
