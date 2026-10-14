<?php

class Perro extends Animal
{
    #[Override]
    public function hacerRuido()
    {
        return "guau!";
    }
}
