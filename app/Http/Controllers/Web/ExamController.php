<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam ;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function show($id){
        $data['exam'] = Exam::findOrFail($id);
        return view("web.exams.show")->with($data);
    }

    public function start($examId){
        $user = Auth::user();
        $user->exams()->attach($examId);
        return redirect(url("exams/questions/$examId"));
    }

    public function submit($examId,Request $request){
        $request->validate([
            "answers"=>"required|array",
            "answers.*"=>"required|in:1,2,3,4"
        ]);

        $points = 0 ;
        $exam = Exam::findOrFail($examId);
        $totalQuesNum = $exam->questions->count();
        foreach($exam->questions as $question){
            if (isset($request->answers[$question->id])){
                $userAnswer = $request->answers[$question->id];
                $rightAnswer = $request->answers[$question->right_ans];
                if ($userAnswer == $rightAnswer){
                    $points+=1;
                }

            }
        }
        $score = ($points / $totalQuesNum) *100;
        $user = Auth::user();
        $pivotRow =$user->exams()->where('exam_id',$examId)->first();
        $submitTime = Carbon::now();
        $startTime = $pivotRow->pivot->created_at;
        $timeMins = $submitTime->diffInMinutes($startTime);
        
       
        $user->exams()->updateExistingPivot($examId,[
            "score"=>$score,
            "time_mins"=>$timeMins
        ]);

        return redirect(url("exams/show/$examId"));
        // dd($score);
        // dd($request->answers);
    }

    public function questions($id){
        $data['exam'] = Exam::findOrFail($id);
        return view("web.exams.questions")->with($data);
    }
}
