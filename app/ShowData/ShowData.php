<?php

namespace App\ShowData;

abstract class ShowData {
    public final function show() {
        return [
            $this->all(),
            $this->related(),
            $this->complete()
        ];
    }

    public function all() {}

    public function related() {}

    public function complete() {}
}