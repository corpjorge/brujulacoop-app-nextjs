<?php

namespace App\Http\Controllers;

use App\Models\SurveyOption;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SurveyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SurveyQuestion $surveyQuestion)
    {
        return view('admin.options', [
            'surveyQuestion' => $surveyQuestion
        ]);
    }

    public function datatable(SurveyQuestion $surveyQuestion)
    {
        $options = $surveyQuestion->surveyOptions;

        return DataTables::of($options)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return $row->is_active ? 'Visible' : 'Oculta';
            })
            ->addColumn('its_conditional', function ($row) {
                return $row->its_conditional ? 'Si' : 'No';
            })
            ->addColumn('actions', function ($row) {
                $routeEdit = route('admin.options.edit', [
                    'survey_question' => $row->survey_question_id,
                    'survey_option' => $row->id,
                ]);

                return "
                    <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                            Acciones
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li><a class='dropdown-item' href='{$routeEdit}'>Editar</a></li>
                        </ul>
                    </div>
                ";
            })
            ->rawColumns(['status', 'its_conditional', 'actions'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SurveyQuestion $surveyQuestion)
    {
        $questions = SurveyQuestion::where('survey_id', $surveyQuestion->survey_id)
            ->where('id', '!=', $surveyQuestion->id)
            ->get();

        return view('admin.forms.options', [
            'surveyQuestion' => $surveyQuestion,
            'statuses' => $this->statuses,
            'questions' => $questions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SurveyQuestion $surveyQuestion)
    {
        $params = $request->all();
        $option = SurveyOption::create($params);

        if (isset($request['question_id']) && $request['question_id'] && $request['question_id'] !== "") {
            $option->its_conditional = true;
            $option->save();

            $question = SurveyQuestion::find($request['question_id']);
            if ($question) {
                $question->option_id = $option->id;
                $question->save();
            }
        }

        return redirect()->route('admin.options.index', $surveyQuestion)->with([
            'message' => 'Opción creada con éxito.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyOption  $surveyOption
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestion $surveyQuestion, SurveyOption $surveyOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyOption  $surveyOption
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyQuestion $surveyQuestion, SurveyOption $surveyOption)
    {
        $questions = SurveyQuestion::where('survey_id', $surveyQuestion->survey_id)
            ->where('id', '!=', $surveyQuestion->id)
            ->get();

        return view('admin.forms.options', [
            'surveyQuestion' => $surveyQuestion,
            'surveyOption' => $surveyOption,
            'statuses' => $this->statuses,
            'questions' => $questions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyOption  $surveyOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyQuestion $surveyQuestion, SurveyOption $surveyOption)
    {
        $params = $request->all();
        $surveyOption->update($params);

        if (isset($request['question_id']) && $request['question_id'] && $request['question_id'] !== "") {
            $surveyOption->its_conditional = true;
            $question = SurveyQuestion::find($request['question_id']);
            if ($question) {
                $question->option_id = $surveyOption->id;
                $question->save();
            }
        } else {
            $surveyOption->its_conditional = false;
            $question = SurveyQuestion::where('option_id', $surveyOption->id)->first();
            if ($question) {
                $question->option_id = null;
                $question->save();
            }
        }

        $surveyOption->save();

        return redirect()->route('admin.options.edit', [
            'survey_question' => $surveyQuestion->id,
            'survey_option' => $surveyOption->id,
        ])->with([
            'message' => 'Opción actualizada con éxito.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyOption  $surveyOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestion $surveyQuestion, SurveyOption $surveyOption)
    {
        //
    }
}
