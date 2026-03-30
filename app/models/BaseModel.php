<?php

class BaseModel implements ArrayAccess
{
    public function offsetExists($offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset): mixed
    {
        return $this->$offset ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset): void
    {
        $this->$offset = null;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
