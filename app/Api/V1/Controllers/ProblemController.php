<?php

namespace App\Api\V1\Controllers;

use App\Contest;
use App\Level;
use App\Problem;
use App\ProblemTag;
use App\Transformers\ProblemTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SplFileObject;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProblemController extends Controller
{
    public function add_last_path()
    {

        $path = app_path() . "/Api/V1/CSV/problems.csv";
        $f = fopen($path, "r");
        while ($line = fgetcsv($f)) {
            $title = $line[2];
            $last_path = $line[4];
            $problem = Problem::query()->where("title", $title);
            $problem->update(['last_path' => $last_path]);
        }

        fclose($f);
    }

    public function import()
    {

        $levels = Level::All();
        $contests = Contest::All();

        $level_map = array();
        $contest_map = array();
        foreach ($levels as $level) {
            $level_map[$level->level] = $level->id;
        }
        foreach ($contests as $contest) {
            $contest_map[$contest->original_code] = $contest->id;
        }
        $path = app_path() . "/Api/V1/CSV/problems.csv";
        $f = fopen($path, "r");
        while ($line = fgetcsv($f)) {
            $original_code = $line[0];
            $contest = $line[1];
            $title = $line[2];
            $level = $line[3];

            $level_id = $level_map[$level];
            $problem = new Problem();

            $problem->level_id = $level_id;
            $problem->contest_id = $contest_map[$contest];
            $problem->original_code = $original_code;
            $problem->title = $title;
            $problem->score = 0;
            $problem->save();
        }

        fclose($f);
    }

    public function get($problem_id)
    {

        try {
            $problem = Problem::findOrFail($problem_id);
        } catch (ModelNotFoundException $e) {
            throw new BadRequestHttpException('Not found problem_id.');
        }

        return $problem;
    }

    public function list($contest_id, Request $request)
    {
        $level_id = $request->level_id;
        $page = $request->page;

        $q = Problem::query();
        $q->where('contest_id', $contest_id);
        if (!is_null($level_id)) {
            $q->where('level_id', $level_id);
        }
        $problems = $q->paginate(10, ['*'], 'page', $page);
        return $this->response->paginator($problems, new ProblemTransformer);
    }

    public function update($problem_id, Request $request)
    {
        $is_answer = $request->get('is_answer');
        $is_favorite = $request->get('is_favorite');
        $problem = Problem::query()->where('id', $problem_id)->first();

        $problem->is_answer = $is_answer;
        $problem->is_favorite = $is_favorite;
        $problem->save();

        return response('', Response::HTTP_NO_CONTENT);
    }
    public function add_tag($problem_id, $tag_id)
    {
        $problem = Problem::query()->where('id', $problem_id)->first();
        $problem->tags()->attach([$tag_id]);

        return response('',Response::HTTP_CREATED);
    }

    public function delete_tag($problem_id, $tag_id)
    {
        $problem = Problem::query()->where('id', $problem_id)->first();
        $problem->tags()->detach([$tag_id]);

        return response('',Response::HTTP_NO_CONTENT);
    }


}
