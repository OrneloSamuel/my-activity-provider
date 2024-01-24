<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnalytic extends Model
{
    protected $fillable = [
        'access', 'instruction', 'matter', 'time', 'numberQuestions', 'rightQuestions', 'wrongQuestions', 'avgTime', 'maxTime',
        'minTime', 'qualAnalytics', 'quizActivityId'
    ];

    public $timestamps = false;

    /**
     * Persiste no banco de dados um novo registo de analytics.
     *
     * @param  array  $request
     * @return array
     */
    public function store($request): array
    {
        $lastActivity = $this
            ->join('quiz_activities', 'quiz_analytics.quizActivityId', 'quiz_activities.id')
            ->where('activityID', $request['activityID'])
            ->where('inveniraStdID', $request['inveniraStdID'])
            ->select(
                'quiz_analytics.access',
                'quiz_analytics.instruction',
                'quiz_analytics.matter'
            )
            ->orderBy('quiz_analytics.id', 'DESC')
            ->first();

        $request['access']      = ($lastActivity->access) ? $lastActivity->access : $request['access'];
        $request['instruction'] = ($lastActivity->instruction) ? $lastActivity->instruction : $request['instruction'];
        $request['matter']      = ($lastActivity->matter) ? $lastActivity->matter : $request['matter'];

        $quizActivity = new QuizActivity;

        $request['quizActivityId'] = $quizActivity
            ->where('activityID', $request['activityID'])
            ->where('inveniraStdID', $request['inveniraStdID'])
            ->first()
            ->id;

        $store = $this->create($request);

        if ($store) {
            return [
                'success' => true,
                'message' => 'Analytics guardados com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Erro ao guardar analytics!'
            ];
        }
    }

    /**
     * Selecciona no banco de dados todos os analytics referente a QuizActivity.
     *
     * @param  mixed  $request
     * @return array
     */
    public function show($request)
    {
        $analitics = $this
            ->join('quiz_activities', 'quiz_analytics.quizActivityId', 'quiz_activities.id')
            ->where('activityID', $request['activityID'])
            ->select(
                'quiz_activities.inveniraStdID',
                'quiz_analytics.access',
                'quiz_analytics.instruction',
                'quiz_analytics.matter',
                'quiz_analytics.time',
                'quiz_analytics.numberQuestions',
                'quiz_analytics.rightQuestions',
                'quiz_analytics.wrongQuestions',
                'quiz_analytics.avgTime',
                'quiz_analytics.maxTime',
                'quiz_analytics.minTime',
                'quiz_analytics.qualAnalytics'
            )
            ->get();

        return $analitics;
    }
}
