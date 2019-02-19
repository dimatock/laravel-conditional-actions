<?php

namespace ConditionalActions\Entities\Conditions;

use ConditionalActions\Contracts\StateContract;
use ConditionalActions\Contracts\TargetContract;

class AllOfCondition extends BaseCondition
{
    /**
     * Checks that the condition is met.
     *
     * @param TargetContract $target
     * @param StateContract $state
     *
     * @return bool
     */
    public function check(TargetContract $target, StateContract $state): bool
    {
        $actions = [];

        foreach ($target->getChildrenConditions($this->id) as $condition) {
            if ($condition->check($target, $state) !== $this->expectedResult()) {
                return false;
            } else {
                $actions = \array_merge($actions, $condition->getActions());
            }
        }

        $this->addActions(...$actions);

        return true;
    }
}
