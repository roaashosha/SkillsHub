<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CanEnterExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $examId = $request->route("exam");
        $attempedExam = $user->exams()->where('exam_id',$examId);
        if ($attempedExam){
            return redirect()->back()->with('error', 'You have already attempted this exam.');
        }
        return $next($request);
    }
}
