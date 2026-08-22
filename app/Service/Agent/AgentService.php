<?php

namespace App\Service\Agent;

use Jenssegers\Agent\Agent;

class AgentService
{

  private Agent $agent;

  public function __construct()
  {
    $this->agent = new Agent();
  }

  public function getAgent()
  {
    return $this->agent;
  }

  public function getDevice()
  {
    return $this->agent->device();
  }

}