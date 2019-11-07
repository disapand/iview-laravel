<?php
namespace App\Observers;

use App\Models\Member;

class MemberObserver {

    public function creating(Member $member)
    {
        $member->verification_token = str_random(30);
    }
}