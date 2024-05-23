<?php

namespace app\traits;

trait DefaultTraits {

    public function getNameAttribute($value){
        return strtoupper($value);
    }

    public function getNameAndEmailAttribute(){
        return $this->name . ' o email desse cara é ' .  $this->email;
    }

}