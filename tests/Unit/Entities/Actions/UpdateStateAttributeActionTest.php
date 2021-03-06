<?php

namespace Tests\Unit\Entities\Actions;

use ConditionalActions\Entities\Actions\UpdateStateAttributeAction;
use ConditionalActions\Entities\State;
use Tests\ConditionalActionsTestCase;

class UpdateStateAttributeActionTest extends ConditionalActionsTestCase
{
    public function test_state_attribute_updated()
    {
        $state = new State([
            'one' => 'first',
            'two' => 'second',
        ]);
        /** @var UpdateStateAttributeAction $action */
        $action = \app(UpdateStateAttributeAction::class);
        $action->setParameters([
            'one' => 'updated',
            'four' => 'new attribute',
        ]);

        $newState = $action->apply($state);

        $this->assertEquals('updated', $newState->getAttribute('one'));
        $this->assertEquals('second', $newState->getAttribute('two'));
        $this->assertEquals('new attribute', $newState->getAttribute('four'));
    }
}
