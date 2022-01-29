<?php

namespace App\Http\Controllers;

use App\Http\Requests\MinimizeLinkRequest;
use App\Models\MinimizedLinks;
use App\Services\MinimizeLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class MinimizeLinkController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(MinimizedLinks $linksModel ,MinimizeLinkRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
        } catch (ValidationException $exception) {
            info($exception);
            return response()->json([
                'error' => $exception->getMessage(),
            ]);
        }

        $data['code'] = Str::random(15);

        $linksModel->create($data);

        return response()->json([
            'success' => 'Выполнено!',
            'link' => $data['link'],
            'minlink' => route('minimizedLink', ['code' => $data['code']]),
        ]);
    }

    public function redirectToMinLink(MinimizedLinks $minimizedLinks, $code)
    {
        return redirect($minimizedLinks->where('code', $code)->first()->link);
    }
}
