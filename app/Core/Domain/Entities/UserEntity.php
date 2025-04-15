<?php

namespace App\Core\Domain\Entities;

class UserEntity
{
    public ?int $id;
    public ?int $shop_id;
    public string $username;
    public ?string $fullname;
    public int $account_type;
    public ?string $email;
    public ?string $email_verified_at;
    public ?string $password;
    public ?int $balance;
    public ?int $status;
    public ?int $required_login_gmail;
    public ?string $remember_token;
    public ?string $provider_id;
    public ?int $google2fa_enable;
    public ?string $google2fa_secret;
    public ?string $two_factor_recovery_codes;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->shop_id = $data['shop_id'] ?? null;
        $this->username = $data['username'];
        $this->fullname = $data['fullname'] ?? null;
        $this->account_type = $data['account_type'] ?? 1;
        $this->email = $data['email']??null;
        $this->email_verified_at = $data['email_verified_at'] ?? null;
        $this->password = $data['password']??null;
        $this->status = $data['status']??null;
        $this->required_login_gmail = $data['required_login_gmail']??0;
        $this->balance = $data['balance'] ?? null;
        $this->remember_token = $data['remember_token'] ?? null;
        $this->provider_id = $data['provider_id'] ?? null;
        $this->google2fa_enable = $data['google2fa_enable'] ?? 0;
        $this->google2fa_secret = $data['google2fa_secret'] ?? null;
        $this->two_factor_recovery_codes = $data['two_factor_recovery_codes'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}
