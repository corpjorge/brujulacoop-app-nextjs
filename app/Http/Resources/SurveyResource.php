<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'attempts' => $this->attempts,
            'order' => $this->order,
            'questions' => new SurveyQuestionCollection(
                $this->surveyQuestions()
                    ->where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->get()
            )
        ];
    }
}
