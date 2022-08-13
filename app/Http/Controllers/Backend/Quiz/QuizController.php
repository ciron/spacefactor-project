<?php
namespace App\Http\Controllers\Backend\Quiz;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;


class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::orderBy('quizzes.id')->paginate();
        $data = [
            'title' => 'Quiz',
            'quizzes' => $quizzes
        ];
        return view('backend.quiz.index', $data);
    }
}