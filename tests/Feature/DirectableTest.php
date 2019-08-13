<?php

namespace Jxclsv\Referable\Tests\Feature;

use Jxclsv\Referable\Models\DirectReferralWallet;
use Jxclsv\Referable\Models\User;
use Jxclsv\Referable\Tests\TestCase;

class DirectableTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_have_directs_and_add_balance_with_bonus()
    {
        $this->user->createDirectReferralWallet();

        $this->user->addDirects(
            factory(User::class)->create(['sponsor_id' => $this->user->id])
        );

        $this->user->addDirects(
            factory(User::class)->create(['sponsor_id' => $this->user->id])
        );

        $this->assertCount(2, $this->user->directReferralBonuses);
        $this->assertEquals(200, $this->user->directReferralWallet->fresh()->balance);
    }
}
