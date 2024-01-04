<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'chapterId'
    ];

    public $timestamps = false;

    /**
     * Persiste na base de dados uma nova pergunta.
     *
     * @param  array  $request
     * @return array
     */
    public function store($request): array
    {
        $store = $this->create($request);

        if ($store) {
            return [
                'success' => true,
                'message' => 'Pergunta cadastrada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao cadastrar a pergunta!'
            ];
        }
    }

    /**
     * Actualiza no banco de dados uma pergunta específica.
     *
     * @param  array  $request
     * @param  int  $id
     * @return array
     */
    public function up($request, $id): array
    {
        $update = $this->where('id', $id)->update($request);

        if ($update) {
            return [
                'success' => true,
                'message' => 'Pergunta editada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao editar a pergunta!'
            ];
        }
    }

    /**
     * Exclui do banco de dados uma pergunta específica.
     *
     * @param  int  $id
     * @return array
     */
    public function del($id): array
    {
        $delete = $this->find($id)->delete();

        if ($delete) {
            return [
                'success' => true,
                'message' => 'Pergunta excluida com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao excluir a pergunta!'
            ];
        }
    }
}
