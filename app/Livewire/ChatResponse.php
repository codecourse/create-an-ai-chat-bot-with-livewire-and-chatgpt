<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Livewire\Component;

class ChatResponse extends Component
{
    public array $prompt;

    public array $messages;

    public ?string $response = null;

    public function mount()
    {
        $this->js('$wire.getResponse()');
    }

    public function getResponse()
    {
        $stream = app('openai')->chat()->createStreamed([
            'model' => 'gpt-4',
            'messages' => $this->messages
        ]);

        foreach ($stream as $response) {
            $content = Arr::get($response->choices[0]->toArray(), 'delta.content');

            $this->response .= $content;

            $this->stream(
                to: 'stream-' . $this->getId(),
                content: $content,
                replace: false
            );
        }
    }

    public function render()
    {
        return view('livewire.chat-response');
    }
}
