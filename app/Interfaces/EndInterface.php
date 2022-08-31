<?php

namespace App\interfaces;
interface EndInterface
{

    public function addAccount($request);
    public function admin_dashboard();
    public function moderator_dashboard();
    public function payment_history();
    public function patitient_profile();
    public function submit_mcq($request);
    
}
