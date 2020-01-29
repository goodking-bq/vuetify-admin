<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $attributes = parent::toArray($request);

        $attributes += [
            'reviews' => ReviewEmbedded::collection($this->reviews),
            'links' => [
                'self' => route('books.show', $this->id),
            ],
        ];

        return $attributes;
    }
}