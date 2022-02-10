<?php
namespace App\Helpers;

final class FunctionResult
{
    public bool $success = false;
    public $returnValue;
    public ?string $errorMessage;

    private function __construct() {}

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getReturnValue()
    {
        return $this->returnValue;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public static function success($returnValue = null): FunctionResult
    {
        $result = new self();
        $result->success = true;
        $result->returnValue = $returnValue;
        return $result;
    }

    public static function error(string $errorMessage): FunctionResult
    {
        $result = new self();
        $result->success = false;
        $result->errorMessage = $errorMessage;
        return $result;
    }
}
