<?php

namespace App\Transformers;

use App\Problem;
use League\Fractal\TransformerAbstract;

class ProblemTransformer extends TransformerAbstract
{
    //
    public function transform(Problem $problem)
    {
        return [
            'problem_id' => $problem->id,
            'level_id' => $problem->level_id,
            'contest_id' => $problem->contest_id,
            'original_code' => $problem->original_code,
            'title' => $problem->title,
            'score' => $problem->score,
            'last_path' => $problem->last_path,
            'tags' => $problem->tags()->get(),
        ];
    }
}
