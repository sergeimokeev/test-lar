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
        session()->put('link', $data['link']);

        return response()->json([
            'success' => 'Выполнено!',
            'minlink' => route('minimizedLink', ['code' => $data['code']]),
        ]);
    }

    public function redirectToMinLink()
    {
        return redirect(session()->get('link'));
    }
}
