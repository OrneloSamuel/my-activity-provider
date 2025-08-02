<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerFormRequest;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    private $answer;

    /**
     * Cria uma nova instância de AnswerController.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Exibe uma lista de respostas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $answers = $this->answer->orderBy('answer')->paginate(10);

        $title = 'RESPOSTAS';

        return view('answer.index', compact('answers', 'title'));
    }

    /**
     * Mostra o formulário pra cadastrar um nova resposta.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::get();

        $title = 'CADASTRAR RESPOSTA';

        return view('answer.create', compact('questions', 'title'));
    }

    /**
     * Guarda o registo da resposta recém-cadastrada.
     *
     * @param  \App\Http\Requests\AnswerFormRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AnswerFormRequest $request)
    {
        $request = $request->except('_token');

        $store = $this->answer->store($request);

        if ($store['success']) {
            return redirect()
                ->route('answer.index')
                ->with('success', $store['message']);
        }

        return redirect()
            ->back()
            ->with('error', $store['message']);
    }

    /**
     * Mostra o formulário pra editar uma resposta específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View 
     */
    public function edit($id)
    {
        $questions = Question::get();

        $answer = $this->answer->find($id);

        if (!$answer) {
            return redirect()
                ->route('answer.index')
                ->with('error', 'Resposta inexistente!');
        }

        $title = 'EDITAR RESPOSTA';

        return view('answer.create', compact('answer', 'questions', 'title'));
    }

    /**
     * Guarda a atualização de uma resposta específica.
     *
     * @param  \App\Http\Requests\AnswerFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function update(AnswerFormRequest $request, $id)
    {
        $request = $request->except('_token', '_method');

        $update = $this->answer->up($request, $id);

        if ($update['success']) {
            return redirect()
                ->route('answer.index')
                ->with('success', $update['message']);
        }

        return redirect()
            ->back()
            ->with('error', $update['message']);
    }

    /**
     * Exclui o registo de uma resposta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View 
     */
    public function destroy($id)
    {
        $delete = $this->answer->del($id);

        if ($delete['success']) {
            return redirect()
                ->route('answer.index')
                ->with('success', $delete['message']);
        }

        return redirect()
            ->back()
            ->with('error', $delete['message']);
    }

    /**
     * Confirma se pretende excluir o registo de uma resposta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View 
     */
    public function delete($id)
    {
        $answer = $this->answer->find($id);

        if (!$answer) {
            return redirect()
                ->route('answer.index')
                ->with('error', 'Resposta inexistente!');
        }

        $title = 'RESPOSTA';

        return view('answer.delete', compact('answer', 'title'));
    }
}
