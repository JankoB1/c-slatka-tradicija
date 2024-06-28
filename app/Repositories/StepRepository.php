<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\StepGroup;
use App\Models\Step;
use Illuminate\Support\Facades\Log;

class StepRepository
{
    public function addSteps(Request $request, int $recipe_id)
    {
        $all_steps = $request->input('steps');
        $steps = $all_steps['stepGroups'];
        $steps_without_group = $all_steps['steps'];

        foreach ($steps as $step) {
            $step_group = StepGroup::create([
                'name' => $step['name'],
            ]);
            foreach($step['steps'] as $item) {
                Step::create([
                    'recipe_id' => $recipe_id,
                    'title' => $item,
                    'group' => $step_group->id,
                ]);
            }
        }

        foreach($steps_without_group as $item) {
            Step::create([
                'recipe_id' => $recipe_id,
                'title' => $item,
                'group' => null,
            ]);
        }
    }

    public function deleteSteps($id) {
        try {
            $steps = Step::where('recipe_id', '=', $id)->get();
            foreach ($steps as $step) {
                $step->delete();
            }
        }
        catch (QueryException $exception) {
            Log::error('Can\'t delete steps: ' . $exception->getMessage());
            return null;
        }
    }
}
