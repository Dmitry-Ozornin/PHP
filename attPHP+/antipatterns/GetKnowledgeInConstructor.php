<?php
class GetKnowledgeInConstructor
{
    private User $user;
    private Order $order;


    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }
}