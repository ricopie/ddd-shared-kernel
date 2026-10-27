<?php

namespace Ricopie\SharedKernel\DataType;

use Ricopie\SharedKernel\Domain\ValueObject;

/** @extends ValueObject<string> */
abstract class StringDataType extends ValueObject
{
  public function __construct(protected string $value)
  {
    $this->validate($value);
  }

  final public function value(): string
  {
    return $this->value;
  }

  protected function validate(string $value): void
  {
    if (trim($value) === "") {
      throw new \InvalidArgumentException("String value cannot be empty.");
    }
  }
}