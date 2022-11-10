<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyOptionResource extends JsonResource
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
            'survey_question_id' => $this->survey_question_id,
            'response' => $this->response,
            'order' => $this->order,
            'its_conditional' => $this->its_conditional,
            'question_id' => $this->question_id,
        ];
    }
}
