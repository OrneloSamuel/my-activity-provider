<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = [
        'answer', 'correct', 'questionId'
    ];

    public $timestamps = false;

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'questionId');
    }

    /**
     * Persiste na base de dados uma nova resposta.
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
                'message' => 'Resposta cadastrada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao cadastrar a resposta!'
            ];
        }
    }

    /**
     * Actualiza no banco de dados uma resposta específica.
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
                'message' => 'Resposta editada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao editar a resposta!'
            ];
        }
    }

    /**
     * Exclui do banco de dados uma resposta específica.
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
                'message' => 'Resposta excluida com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao excluir a resposta!'
            ];
        }
    }
}
