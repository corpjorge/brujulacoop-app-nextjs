<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey)
    {
        return view('admin.questions', [
            'survey' => $survey,
        ]);
    }

    public function datatable(Survey $survey)
    {
        $questions = $survey->surveyQuestions;

        return DataTables::of($questions)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return $row->is_active ? 'Visible' : 'Oculta';
            })
            ->addColumn('type', function ($row) {
                return $row->questionType->name;
            })
            ->addColumn('actions', function ($row) {
                $routeEdit = route('admin.questions.edit', [
                    'survey' => $row->survey_id,
                    'survey_question' => $row->id
                ]);
                $options = route('admin.options.index', $row);
                $actions = "
                    <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                            Acciones
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li><a class='dropdown-item' href='{$routeEdit}'>Editar</a></li>
                ";

                if ($row->question_type_id === 1) {
                    $actions .= "
                            <li><a class='dropdown-item' href='{$options}'>Opciones</a></li>
                    ";
                }

                $actions .= "
                        </ul>
                    </div>
                ";
                return $actions;
            })
            ->rawColumns(['status', 'type', 'actions'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey)
    {
        return view('admin.forms.questions', [
            'survey' => $survey,
            'statuses' => $this->statuses,
            'types' => QuestionType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Survey $survey)
    {
        SurveyQuestion::create($request->all());
        return redirect()->route('admin.questions.index', $survey)->with([
            'message' => 'Pregunta creada con éxito.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey, SurveyQuestion $surveyQuestion)
    {
        return view('admin.forms.questions', [
            'survey' => $survey,
            'question' => $surveyQuestion,
            'statuses' => $this->statuses,
            'types' => QuestionType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey, SurveyQuestion $surveyQuestion)
    {
        $surveyQuestion->update($request->all());
        return redirect()->route('admin.questions.edit', [
            'survey' => $survey->id,
            'survey_question' => $surveyQuestion->id,
        ])->with([
            'message' => 'Pregunta actualizada con éxito.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestion $surveyQuestion)
    {
        //
    }
}
