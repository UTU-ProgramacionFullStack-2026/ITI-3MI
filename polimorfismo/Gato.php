<?php

class Gato extends Animal
{
    #[Override]
    public function hacerRuido()
    {
        return "miau!";
    }
}
