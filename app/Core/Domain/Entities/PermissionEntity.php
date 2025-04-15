<?php

namespace App\Core\Domain\Entities;

class PermissionEntity
{
    public ?int $id;
    public ?string $title;
    public ?string $name;
    public ?string $guard_name;
    public ?string $description;
    public ?string $url;
    public ?int $parent_id;
    public ?int $order;
    public ?string $action;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->guard_name = $data['guard_name'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->url = $data['url'] ?? null;
        $this->parent_id = $data['parent_id'] ?? null;
        $this->order = $data['order'] ?? null;
        $this->action = $data['action'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}