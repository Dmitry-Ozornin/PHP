<?php

class StaticCallsInConstructor
{
    private User $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
