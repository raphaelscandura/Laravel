<x-layout title="Editar série">
    <x-form action="{{ route('series.update', $serie->id) }}" nome="{{ $serie->nome }}"/>
</x-layout>