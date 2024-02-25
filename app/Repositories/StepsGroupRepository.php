<?php

namespace App\Repositories;

use App\Models\StepGroup;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class StepsGroupRepository
{

    public function getGroupsByRecipeId($recipeId) {
        try {
            $steps = StepGroup::join('steps', 'step_groups.id', '=', 'steps.group')
                ->where('steps.recipe_id', '=', $recipeId)
                ->get()
                ->toArray();

            $groupedSteps = [];

            foreach ($steps as $step) {
                $groupName = $step['name'];
                if (!isset($groupedSteps[$groupName])) {
                    $groupedSteps[$groupName] = [];
                }
                $groupedSteps[$groupName][] = $step;
            }

            return $groupedSteps;
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve step groups by recipe id: ' . $exception->getMessage());
            return null;
        }
    }

}
