<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizActivity extends Model
{
    protected $fillable = [
        'activityID', 'inveniraStdID', 'resume', 'instruction', 'matter'
    ];

    public $timestamps = false;

    /**
     * Persiste no banco de dados uma nova instância da actividade.
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
                'message' => 'Actividade instanciada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao instanciar a actividade!'
            ];
        }
    }

    /**
     * Actualiza no banco de dados um registo de QuizActivity específico.
     *
     * @param  array  $request
     * @return array
     */
    public function accessing($request): array
    {
        $update = $this->where('activityID', $request['activityID'])->update($request);

        if ($update) {
            return [
                'success' => true,
                'message' => 'Dados da atividade guardados com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao guardar os dados da actividade!'
            ];
        }
    }
}
