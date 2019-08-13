<?php

namespace Jxclsv\Referable\Tests\Unit;

use Jxclsv\Referable\Tests\TestCase;

class BonusTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function bonus_route_index()
    {
        $this->actingAs($this->user);

        $this->get('bonuses/direct-referral')
            ->assertResponseOk(200)
            ->see("You don't have Direct Referral Bonuses.");
    }
}
