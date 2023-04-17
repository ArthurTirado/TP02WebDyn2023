<?php declare(strict_types=1);

function is_post() : bool
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function is_null_or_blank(?string $value): bool {
    return strlen(trim($value ?? "")) === 0;
}
