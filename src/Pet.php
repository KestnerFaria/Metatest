<?php
declare(strict_types=1);

class Pet
{
    public int $id;
    public string $nome;
    public string $tutor;

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
