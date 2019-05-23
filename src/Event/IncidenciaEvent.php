<?php

namespace App\Event;
use App\Entity\Incidencia;
use Symfony\Component\EventDispatcher\Event;
use App\Entity\Issue;

class IncidenciaEvent extends Event
{
    const SAVED = 'issue.save';

    private $issue;

    public function __construct(Incidencia $issue) {
        $this->issue = $issue;
    }

    public function getIssue() {
        return $this->issue;
    }
}