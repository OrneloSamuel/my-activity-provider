<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionFormRequest;
use App\Models\Question as QuestionModel;
use App\Question\Decorators\TagDecorator;
use App\Question\Question;

class QuestionController extends Controller
{
    private $question;

    /**
     * Cria uma nova instância de QuestionController.
     *
     * @param  \App\Models\Question  $question
     * @return void
     */
    public function __construct(QuestionModel $question)
    {
        $this->question = $question;
    }

    /**
     * Exibe uma lista de perguntas no formato JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myQuestions = $this->question->all();

        foreach ($myQuestions as $myQuestion) {
            $question       = new Question($myQuestion);
            $tagQuestion    = new TagDecorator($question);
            $tagQuestions[] = $tagQuestion->question();
        }
        
        return response()->json($tagQuestions);
    }

    /**
     * Mostra o formulário pra cadastrar um nova pergunta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = $this->question->paginate(10);

        $title = 'CADASTRAR PERGUNTA';

        return view('question.create', compact('questions', 'title'));
    }

    /**
     * Guarda o registo da pergunta recém-cadastrada.
     *
     * @param  \App\Http\Requests\QuestionFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionFormRequest $request)
    {
        $request = $request->except('_token');

        $store = $this->question->store($request);

        if ($store['success']) {
            return redirect()
                ->route('question.index')
                ->with('success', $store['message']);
        }

        return redirect()
            ->back()
            ->with('error', $store['message']);
    }

    /**
     * Mostra o formulário pra editar uma pergunta específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->question->find($id);

        if (!$question) {
            return redirect()
                ->route('question.index')
                ->with('error', 'Resposta inexistente!');
        }

        $questions = $this->question->paginate(10);

        $title = 'EDITAR PERGUNTA';

        return view('question.create', compact('question', 'questions', 'title'));
    }

    /**
     * Guarda a atualização de uma pergunta específica.
     *
     * @param  \App\Http\Requests\QuestionFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionFormRequest $request, $id)
    {
        $request = $request->except('_token', '_method');

        $update = $this->question->up($request, $id);

        if ($update['success']) {
            return redirect()
                ->route('question.index')
                ->with('success', $update['message']);
        }

        return redirect()
            ->back()
            ->with('error', $update['message']);
    }

    /**
     * Exclui o registo de uma pergunta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->question->del($id);

        if ($delete['success']) {
            return redirect()
                ->route('question.index')
                ->with('success', $delete['message']);
        }

        return redirect()
            ->back()
            ->with('error', $delete['message']);
    }

    /**
     * Confirma se pretende excluir o registo de uma pergunta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $question = $this->question->find($id);

        if (!$question) {
            return redirect()
                ->route('question.index')
                ->with('error', 'Resposta inexistente!');
        }

        $title = 'PERGUNTA';

        return view('question.delete', compact('question', 'title'));
    }
}
