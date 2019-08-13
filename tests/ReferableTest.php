<?php

namespace Jxclsv\Referable\Tests\Unit;

use Jxclsv\Referable\Models\User;
use Jxclsv\Referable\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReferableTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function true_for_true()
    {
        $this->assertTrue(true);
    }
}
