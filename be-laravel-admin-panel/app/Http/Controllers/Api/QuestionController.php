<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'List questions',
            'data' => QuestionResource::collection($questions)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question = Question::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Create question success',
            'data' => new QuestionResource($question)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // $question = Question::findOrFail($question->id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Detail question',
            'data' => new QuestionResource($question)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Update question success',
            'data' => new QuestionResource($question)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Delete question success',
            'data' => new QuestionResource($question)
        ], 200);
    }
}
