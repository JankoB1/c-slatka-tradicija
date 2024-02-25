<?php

namespace App\Services;

use App\Repositories\StepsGroupRepository;

class StepGroupService
{

    protected StepsGroupRepository $stepsGroupRepository;

    public function __construct() {
        $this->stepsGroupRepository = new StepsGroupRepository();
    }
    public function getGroupsByRecipeId($recipeId) {
        return $this->stepsGroupRepository->getGroupsByRecipeId($recipeId);
    }

}
