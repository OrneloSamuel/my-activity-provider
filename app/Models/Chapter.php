<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public $timestamps = false;

    /**
     * Persiste na base de dados um novo capítulo.
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
                'message' => 'Capítulo cadastrado com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao cadastrar o capítulo!'
            ];
        }
    }

        /**
     * Actualiza no banco de dados um capítulo específico.
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
                'message' => 'Capítulo editado com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao editar o capítulo!'
            ];
        }
    }

    /**
     * Exclui do banco de dados um capítulo específico.
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
                'message' => 'Capítulo excluido com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao excluir o capítulo!'
            ];
        }
    }
}
