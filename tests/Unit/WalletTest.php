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
    public function user_can_have_direct_referral_wallet()
    {
        $this->user->createDirectReferralWallet();

        $this->assertDatabaseHas(config('referral.table_names.wallets'), [
            'user_id' => $this->user->id
        ]);

        $this->assertEquals(0, $this->user->directReferralWallet->balance);
        $this->assertInstanceOf(DirectReferralWallet::class, $this->user->directReferralWallet);
    }

    /** @test */
    public function it_can_add_balance()
    {
        $this->user->createDirectReferralWallet();

        $this->user->addDirects(
            $this->factory->create(User::class, ['sponsor_id' => $this->user->id])
        );

        $this->user->addDirects(
            $this->factory->create(User::class, ['sponsor_id' => $this->user->id])
        );

        $this->assertEquals(200, $this->user->directReferralWallet->fresh()->balance);
        $this->assertCount(2, $this->user->directReferralBonuses);
    }
}
