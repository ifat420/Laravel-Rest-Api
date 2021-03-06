<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\isNull;

class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => Task::collection($this-> whenLoaded('tasks')),
            'tasks_count' => $this-> when(!isNull($this->tasks_count), $this->task_count),
            'image' => $this->image_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public function with($request) {
        return [
            'status' => 'Ok'
        ];
    }
}
