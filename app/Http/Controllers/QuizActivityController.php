<?php

namespace App\Http\Controllers;

use App\Models\QuizActivity;
use App\Models\QuizAnalytic;
use Illuminate\Http\Request;

class QuizActivityController extends Controller
{
    private $quizActivity;
    private $quizAnalytic;

    public function __construct(QuizActivity $quizActivity, QuizAnalytic $quizAnalytic)
    {
        $this->quizActivity = $quizActivity;
        $this->quizAnalytic = $quizAnalytic;
    }

    public function config()
    {
        $title = 'Teste de Aptidão Sobre a Matéria - Configuração';

        return view('quiz-activity.create', compact('title'));
    }

    public function params()
    {
        $paramsUrl = array(
            array(
                'name' => 'resume', 
                'type' => "text", 
            ),
            array(
                'name' => 'instruction', 
                'type' => 'URL', 
            ),
            array(
                'name' => 'matter', 
                'type' => 'URL', 
            ) 
        );

        return response()->json($paramsUrl);
    }

    public function deploy(int $activityID)
    {
        if ($activityID) {
            $store = $this->quizActivity->store(['activityID' => $activityID]);
        } else {
            return 'Parâmetro inválido!';
        }

        if ($store['success']) {
            return 'https://my-activity-provider/api/accessing'; //https://my-activity-provider-c21fad9b3b83.herokuapp.com/api/accessing
        }

        return $store['message'];
    }

    public function accessing(Request $request)
    {
        if (!$request['activityID']) {
            //Inserir dados de teste
            $request['activityID']    = 12;
            $request['inveniraStdID'] = 1002;
            $request['resume']        = 'Resumo 2';
            $request['instruction']   = 'Instrução 2';
            $request['matter']        = 'URL 2';
        }

        $request = $request->all();

        $accessing = $this->quizActivity->accessing($request);

        if ($accessing['success']) {
            return 'https://my-activity-provider/api/activity'; //'https://my-activity-provider-c21fad9b3b83.herokuapp.com/api/activity'
        }

        return $accessing['message'];
    }

    public function activity(Request $request)
    {
        if (!$request['activityID']) {
            //Inserir dados de teste
            $request['activityID']      = 123;
            $request['inveniraStdID']   = 1001;
            $request['access']          = 1;
            $request['instruction']     = 1;
            $request['matter']          = 1;
            $request['time']            = '00:25:37';
            $request['numberQuestions'] = 13;
            $request['rightQuestions']  = 9;
            $request['wrongQuestions']  = 4;
            $request['avgTime']         = '00:02:07';
            $request['maxTime']         = '00:05:01';
            $request['minTime']         = '00:00:57';
            $request['qualAnalytics']   = '';
        }

        $request = $request->all();

        $store = $this->quizAnalytic->store($request);

        //Em gesto de teste
        return $store['message'];
    }

    public function listAnalytics()
    {
        $analitics = array(
            'quantAnalytics' => [
                array(
                    'name' => 'access', 
                    'type' => "boolean", 
                ),
                array(
                    'name' => 'instruction', 
                    'type' => 'boolean', 
                ),
                array(
                    'name' => 'matter', 
                    'type' => 'boolean', 
                ),
                array(
                    'name' => 'time', 
                    'type' => "time", 
                ),
                array(
                    'name' => 'numberQuestions', 
                    'type' => 'integer', 
                ),
                array(
                    'name' => 'rightQuestions', 
                    'type' => 'integer', 
                ),
                array(
                    'name' => 'wrongQuestions', 
                    'type' => 'integer', 
                ),
                array(
                    'name' => 'avgTime', 
                    'type' => 'time', 
                ),
                array(
                    'name' => 'maxTime', 
                    'type' => 'time', 
                ),
                array(
                    'name' => 'minTime', 
                    'type' => 'time',
                ),
            ],
            'qualAnalytics' => [
                array(
                    'name' => 'qualAnalytics', 
                    'type' => 'URL',
                ),
            ]
        );

        return response()->json($analitics);
    }

    public function analytics(Request $request)
    {
        if (!$request['activityID']) {
            //Inserir dado de teste
            $request['activityID'] = 123;
        }

        $analytics = $this->quizAnalytic->show($request);

        return response()->json($analytics);
    }

    public function test(Request $request)
    {
        return response()->json($request->options);
    }
}
