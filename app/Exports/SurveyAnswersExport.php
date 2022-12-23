<?php

namespace App\Exports;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Maatwebsite\Excel\Concerns\FromArray;

class SurveyAnswersExport implements FromArray
{
    public $survey = null;
    public $questions = [];
    public $answers = [];

    public function __construct($survey_id)
    {
        $this->survey = Survey::find($survey_id);
        $this->questions = SurveyQuestion::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();
        $this->answers = SurveyAnswer::where('survey_id', $survey_id)
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        $response = [];
        $header = [
            'id', 'Id Usuario', 'Nombre', 'Email', 'No. Documento',
        ];

        foreach ($this->questions as $question) {
            array_push($header, $question->question);
        }

        $response[] = $header;

        foreach ($this->answers as $answer) {
            $row = [
                $answer->id,
                $answer->user->id,
                $answer->user->name,
                $answer->user->email,
                $answer->user->document,
            ];
            $userResponses = json_decode($answer->responses);

            foreach ($this->questions as $question) {
                $filtered_arr = array_filter(
                    $userResponses,
                    function ($obj) use ($question) {
                        return $obj->id === $question->id;
                    }
                );
                $filtered_arr = array_values($filtered_arr);
                // dd($filtered_arr);
                $textResponse = "";
                if ($filtered_arr && isset($filtered_arr[0]) && isset($filtered_arr[0]->response)) {
                    $textResponse = $filtered_arr[0]->response;
                } else if ($filtered_arr && isset($filtered_arr[0]) && isset($filtered_arr[0]->responses)) {
                    foreach ($filtered_arr[0]->responses as $userResponse) {
                        $textResponse .= "{$userResponse->response}; ";
                    }
                }
                // $userResponse = $filtered_arr && isset($filtered_arr[0]) ? $filtered_arr[0]->response : "";
                array_push($row, $textResponse);
            }

            $response[] = $row;
        }

        return $response;
    }
}
