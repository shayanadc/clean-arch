<?php

namespace Tests\Feature;

use App\BcryptHashMaker;
use App\Entities\UserEntity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeHashTest extends TestCase
{
    /**
     * @test
     */
    public function it_makes_hash_from_string()
    {
        BcryptHashMaker::setTest('5GV1TVWVKtbWxgPRZCReCkqpnYF0Q8RGfdYBjE0wgmp3UX');
        $hashMaker = new BcryptHashMaker();
        $new = new UserEntity();
        $this->assertEquals('5GV1TVWVKtbWxgPRZCReCkqpnYF0Q8RGfdYBjE0wgmp3UX', $new->makePassword('password', $hashMaker));
    }
}
