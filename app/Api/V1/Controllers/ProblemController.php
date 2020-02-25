<?php

namespace App\Api\V1\Controllers;

use App\Contest;
use App\Level;
use App\Problem;
use App\Transformers\ProblemTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SplFileObject;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProblemController extends Controller
{

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

//        $levels = Level::All();
//        $contests = Contest::All();
//
//        $level_map = array();
//        $contest_map = array();
//        foreach ($levels as $level) {
//            $level_map[$level->level] = $level->id;
//        }
//        foreach ($contests as $contest) {
//            $contest_map[$contest->original_code] = $contest->id;
//        }
//        $path =app_path()."/Api/V1/Controllers/problems.csv";
//        $f = fopen($path, "r");
////        $file = new SplFileObject(app_path()+"/Api/V1/Controllers/problems.csv");
////        $file->setFlags(SplFileObject::READ_CSV);
//        while ($line = fgetcsv($f)) {
//            $original_code = $line[0];
//            $contest = $line[1];
//            $title = $line[2];
//            $level = $line[3];
//
//            $level_id =$level_map[$level];
//            $problem = new Problem();
//
//            $problem->level_id = $level_id;
//            $problem->contest_id = $contest_map[$contest];
//            $problem->original_code = $original_code;
//            $problem->title = $title;
//            $problem->score = 0;
//            $problem->save();
//        }
//
//        fclose($f);

        $level_id = $request->level_id;

        $q = Problem::query();
        $q->where('contest_id', $contest_id);
        if (!is_null($level_id)) {
            $q->where('level_id', $level_id);
        }
        $problems = $q->paginate(5, ['*'], 'page', 2);

        return $this->response->paginator($problems, new ProblemTransformer);
    }


}
