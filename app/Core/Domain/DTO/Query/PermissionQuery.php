<?php

namespace App\Core\Domain\DTO\Query;

class PermissionQuery
{
    public ?string $keyword;
    public ?string $sort;
    public ?string $direction;
    public ?int $perPage;
    public ?int $page;

    public function __construct(array $data = [])
    {
        $this->keyword   = $data['keyword']   ?? null;
        $this->sort      = $data['sort']      ?? 'order';
        $this->direction = $data['direction'] ?? 'asc';
        $this->perPage   = $data['per_page']  ?? null;
        $this->page      = $data['page']      ?? null;
    }
}
