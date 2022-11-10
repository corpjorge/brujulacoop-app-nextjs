<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'survey_id' => $this->survey_id,
            'type' => $this->question_type_id,
            'question' => $this->question,
            'order' => $this->order,
            'option_id' => $this->option_id,
            'options' => new SurveyOptionCollection(
                $this->surveyOptions()
                    ->where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->get()
            )
        ];
    }
}
