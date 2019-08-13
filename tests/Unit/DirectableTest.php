<?php

namespace Jxclsv\Referable\Tests\Unit;

use Jxclsv\Referable\Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Jxclsv\Referable\Models\User;

class DirectableTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function user_has_collections_of_direct_referrals()
    {
        $this->assertInstanceOf(Collection::class, $this->user->directs);
    }

    /** @test */
    public function user_can_have_sponsor()
    {
        $newUser = factory(User::class)->create(['sponsor_id' => $this->user->id]);

        $this->assertEquals($newUser->sponsor->id, $this->user->id);
    }

    /** @test */
    public function user_can_have_many_directs()
    {
        $john = factory(User::class)->create(['sponsor_id' => $this->user->id]);
        
        $mary = factory(User::class)->create(['sponsor_id' => $this->user->id]);

        $this->assertCount(2, $this->user->directs);
        $this->assertTrue($this->user->directs->contains('id', $john->id));
        $this->assertTrue($this->user->directs->contains('id', $mary->id));
    }
}
