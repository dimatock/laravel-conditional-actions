<?php

namespace Tests\Dummy;

use ConditionalActions\Contracts\StateContract;
use ConditionalActions\Entities\Actions\BaseAction;

class DummyAction extends BaseAction
{
    public $isFired = false;

    /**
     * Applies action to the state and returns a new state.
     *
     * @param StateContract $state
     *
     * @return StateContract
     */
    public function apply(StateContract $state): StateContract
    {
        $this->isFired = true;

        return $state;
    }
}
