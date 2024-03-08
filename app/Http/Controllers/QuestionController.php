<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('services.questions.index', [
            'questions' => SpladeTable::for(Question::class)
                ->withGlobalSearch(columns:['title','description'])
                ->column('title', label: "зоголовок", sortable: true)
                ->column('description', label: "текст", sortable: true)
              ->column('action', label: "Действие", canBeHidden: false)
                ->paginate(10)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question = new question();

        $question -> title = $request -> input('title');
        $question -> description = $request -> input('description');
        $question -> save();

        Toast::title('Вопрос добавлен');

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(question $question)
    {
        return view('services.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {

        $question -> title = $request -> input('title');
        $question -> description = $request -> input('description');
        $question -> update();

        Toast::title('Информация обновлена');

        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        Toast::title('Информация удалена');
        return redirect()->route('question.index');

    }
}
