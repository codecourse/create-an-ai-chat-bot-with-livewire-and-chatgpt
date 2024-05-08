<div class="w-3/4 space-y-0.5 has-[.stream:empty]:hidden">
    <div class="text-xs">Bot</div>
    <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
        <div wire:stream="stream-{{ $this->getId()  }}">{{ $response }}</div>
    </div>
</div>
