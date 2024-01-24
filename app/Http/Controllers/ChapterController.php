<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterFormRequest;
use App\Models\Chapter;
use App\ShowData\ChapterShow;

class ChapterController extends Controller
{
    private $chapter;

    /**
     * Cria uma nova instância de ChapterController.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function __construct(Chapter $chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * Exibe uma lista de capítulos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = $this->chapter->paginate(10);

        $title = 'CAPÍTULOS';

        return view('chapter.index', compact('chapters', 'title'));
    }

    /**
     * Mostra o formulário pra cadastrar um novo capítulo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = $this->chapter->paginate(10);

        $title = 'CADASTRAR CAPÍTULO';

        return view('chapter.create', compact('chapters', 'title'));
    }

    /**
     * Guarda o registo do capítulo recém-cadastrado.
     *
     * @param  \App\Http\Requests\ChapterFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterFormRequest $request)
    {
        $request = $request->except('_token');

        $store = $this->chapter->store($request);

        if ($store['success']) {
            return redirect()
                ->route('chapter.index')
                ->with('success', $store['message']);
        }

        return redirect()
            ->back()
            ->with('error', $store['message']);
    }

    /**
     * Mostra o formulário pra editar um capítulo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = $this->chapter->find($id);

        if (!$chapter) {
            return redirect()
                ->route('chapter.index')
                ->with('error', 'Capítulo inexistente!');
        }

        $chapters = $this->chapter->paginate(10);

        $title = 'EDITAR CAPÍTULO';

        return view('chapter.create', compact('chapter', 'chapters', 'title'));
    }

    /**
     * Guarda a atualização de um capítulo específico.
     *
     * @param  \App\Http\Requests\ChapterFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterFormRequest $request, $id)
    {
        $request = $request->except('_token', '_method');

        $update = $this->chapter->up($request, $id);

        if ($update['success']) {
            return redirect()
                ->route('chapter.index')
                ->with('success', $update['message']);
        }

        return redirect()
            ->back()
            ->with('error', $update['message']);
    }

    /**
     * Exclui o registo de um capítulo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->chapter->del($id);

        if ($delete['success']) {
            return redirect()
                ->route('chapter.index')
                ->with('success', $delete['message']);
        }

        return redirect()
            ->back()
            ->with('error', $delete['message']);
    }

    /**
     * Confirma se pretende excluir o registo de um capítulo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $chapter = $this->chapter->find($id);

        if (!$chapter) {
            return redirect()
                ->route('chapter.index')
                ->with('error', 'Capítulo inexistente!');
        }

        $title = 'CAPÍTULO';

        return view('chapter.delete', compact('chapter', 'title'));
    }

    /**
     * Exibe uma lista de capítulos e as perguntas relaciondas a cada capítulo.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll(ChapterShow $chapterShow)
    {
        return response()->json($chapterShow->show());
    }
}
