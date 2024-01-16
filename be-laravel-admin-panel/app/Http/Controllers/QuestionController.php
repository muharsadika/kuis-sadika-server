<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }

    public function show(Question $question): View
    {
        return view('questions.show', compact('question'));
    }

    public function create(): View
    {
        return view('questions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question = Question::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question created successfully');
    }

    public function edit(Question $question): View
    {
        return view('questions.edit', compact('question'));
    }

    public function Update(Request $request, Question $question): RedirectResponse
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deteled successfully');
    }
}
