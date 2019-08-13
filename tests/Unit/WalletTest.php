<?php

namespace Jxclsv\Referable\Tests\Unit;

use Jxclsv\Referable\Models\DirectReferralWallet;
use Jxclsv\Referable\Models\User;
use Jxclsv\Referable\Tests\TestCase;

class WalletTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_add_balance()
    {
        $this->user->createDirectReferralWallet();

        $this->user->directReferralWallet->addBalance();
        $this->user->directReferralWallet->addBalance();

        $this->assertEquals(200, $this->user->directReferralWallet->fresh()->balance);
    }
}
