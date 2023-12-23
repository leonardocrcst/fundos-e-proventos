<?php

namespace App\Application\UseCase\Dto;

class ResponseDto
{
    private int $status = 200;
    private ?array $body = null;
    private ?string $message = null;

    public function getStatusCode(): int
    {
        return $this->status;
    }

    public function withBody(array $body): ResponseDto
    {
        $this->body = $body;
        return $this;
    }

    public function withStatus(int $status): ResponseDto
    {
        $this->status = $status;
        return $this;
    }

    public function withMessage(string $message): ResponseDto
    {
        $this->message = $message;
        return $this;
    }

    public static function create(): ResponseDto
    {
        return new self();
    }

    public function __toString(): string
    {
        $return = [
            'statusCode' => $this->status
        ];
        if (!empty($this->message)) {
            $return['message'] = $this->message;
        }
        if (!empty($this->body)) {
            $return['data'] = $this->body;
        }
        return json_encode($return, JSON_NUMERIC_CHECK);
    }
}
