<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $counter = 10;

    public function start()
    {
        while ($this->counter > 0) {
            $this->stream(
                to: 'count',
                content: $this->counter,
                replace: true
            );

            sleep(1);
            $this->counter = $this->counter - 1;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
