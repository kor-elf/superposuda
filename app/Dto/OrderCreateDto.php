<?php
namespace App\Dto;

class OrderCreateDto
{
    private string $lastName;
    private string $firstName;
    private string $patronymic;
    private ?string $comment;
    private string $article;
    private string $manufacturer;

    public function __construct(
        string $lastName,
        string $firstName,
        string $patronymic,
        ?string $comment,
        string $article,
        string $manufacturer
    )
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->patronymic = $patronymic;
        $this->comment = $comment;
        $this->article = $article;
        $this->manufacturer = $manufacturer;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getArticle(): string
    {
        return $this->article;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }
}
