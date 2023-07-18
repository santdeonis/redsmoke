<?php

namespace App\Entities\DataTransferObjects;

class BreadcrumbDTO
{
    public function __construct(
        protected string $route,
        protected string $title,
    )
    {
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
