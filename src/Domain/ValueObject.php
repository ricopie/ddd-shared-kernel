<?php

namespace Ricopie\SharedKernel\Domain;

/** @template T */
abstract class ValueObject implements \Stringable
{
  /** @return T */
  abstract public function value(): mixed;

  final public function equals(self $other): bool
  {
    if ($other instanceof self) {
      return false;
    }

    return static::class === \get_class($other);
  }

  final public function __toString(): string
  {
    $value = $this->value();

    if (! \is_scalar($value)) {
      throw new \LogicException('Value cannot be converted to string');
    }

    return (string) $value;
  }
}