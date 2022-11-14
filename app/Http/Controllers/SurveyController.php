<?php

namespace App\Http\Controllers;

use App\Exports\SurveyAnswersExport;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use App\Models\SurveyAnswer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surveys');
    }

    public function datatable()
    {
        $surveys = Survey::all();

        return DataTables::of($surveys)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return $row->is_active ? 'Visible' : 'Oculta';
            })
            ->addColumn('actions', function ($row) {
                $routeEdit = route('admin.surveys.edit', $row);
                $routeExport = route('admin.surveys.export', $row);
                $questions = route('admin.questions.index', $row);

                return "
                    <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                            Acciones
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li><a class='dropdown-item' href='{$routeEdit}'>Editar</a></li>
                            <li><a class='dropdown-item' href='{$questions}'>Ver Preguntas</a></li>
                            <li><a class='dropdown-item' href='{$routeExport}'>Exportar respuestas</a></li>
                        </ul>
                    </div>
                ";
            })
            ->rawColumns(['status', 'actions'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.surveys', [
            'statuses' => $this->statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Survey::create($request->all());

        return redirect()->route('admin.surveys.index')->with([
            'message' => 'La encuesta ha sido creada.'
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        return view('admin.forms.surveys', [
            'statuses' => $this->statuses,
            'survey' => $survey,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->all());

        return redirect()->route('admin.surveys.edit', $survey)->with([
            'message' => 'La encuesta ha sido actualizada.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }

    public function surveys()
    {
        return view('surveys');
    }

    public function firstActive(Request $request)
    {
        $user = $request->user();
        $first = Survey::where('is_active', true)->orderBy('order', 'ASC')->first();
        $participation = 0;

        if ($user) {
            $participation = $user->surveyAnswers()->count();
        }

        return response()->json([
            'survey' => new SurveyResource($first),
            'participation' => $participation,
        ], 200);
    }

    public function storeAnswers(Request $request, Survey $survey)
    {
        $responses = $request['responses'];

        SurveyAnswer::create([
            'user_id' => $request->user()->id,
            'survey_id' => $survey->id,
            'responses' => json_encode($responses),
        ]);

        return response()->json([
            'message' => 'La participación ha sido guardada',
        ], 201);
    }

    public function export(Survey $survey)
    {
        return Excel::download(new SurveyAnswersExport($survey->id), "{$survey->slug}.xlsx");
    }
}
