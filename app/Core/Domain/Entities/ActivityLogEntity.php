<?php

namespace App\Core\Domain\Entities;

class ActivityLogEntity
{
    public ?int $id;
    public ?int $shop_id;
    public int $user_id;
    public string $prefix;
    public string $method;
    public string $url;
    public string $input;
    public string $description;
    public string $ip;
    public string $user_agent;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->shop_id = $data['shop_id'] ?? null;
        $this->user_id = $data['user_id'];
        $this->prefix = $data['prefix'];
        $this->method = $data['method'];
        $this->url = $data['url'];
        $this->input = $data['input'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->ip = $data['ip'];
        $this->user_agent = $data['user_agent'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}