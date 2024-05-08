<?php

namespace App\Livewire;

use Livewire\Component;

class ChatResponse extends Component
{
    public array $prompt;

    public array $messages;

    public string $response;

    public function mount()
    {
        $this->getResponse();
    }

    public function getResponse()
    {
        $response = app('openai')->chat()->create([
            'model' => 'gpt-4',
            'messages' => $this->messages
        ]);

        $this->response = $response->choices[0]->toArray()['message']['content'];
    }

    public function render()
    {
        return view('livewire.chat-response');
    }
}
