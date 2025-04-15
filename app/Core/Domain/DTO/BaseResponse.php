<?php

namespace App\Core\Domain\DTO;

class BaseResponse
{
    public bool $success;
    public $data;  // Không chỉ định kiểu để hỗ trợ PHP 7.4
    public ?string $message;
    public ?int $code;

    /**
     * BaseResponse constructor.
     *
     * @param bool $success Indicates the success status of the response.
     * @param mixed $data Optional data associated with the response.
     * @param string|null $message Optional message providing additional information about the response.
     * @param int|null $code Optional HTTP status code associated with the response.
     */

    public function __construct(bool $success, $data = null, ?string $message = null, ?int $code = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * Create a success response.
     *
     * @param mixed $data Optional data associated with the response.
     * @param string $message Optional message providing additional information about the response.
     * @param int $code Optional HTTP status code associated with the response.
     *
     * @return static
     */
    public static function success($data = null, string $message = "Thành công", int $code = 200): self
    {
        return new self(true, $data, $message, $code);
    }

    /**
     * Create an error response.
     *
     * @param string $message Optional message providing additional information about the response.
     * @param int $code Optional HTTP status code associated with the response. Defaults to 400.
     *
     * @return static
     */
    public static function error(string $message, int $code = 400): self
    {
        return new self(false, null, $message, $code);
    }
}
