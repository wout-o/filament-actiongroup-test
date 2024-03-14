<?php

use App\Filament\Resources\TestResource\Pages\EditTest;
use App\Models\Test;

use function Pest\Livewire\livewire;

it('does show the "approve" button when the record can be approved', function () {
    $test = Test::factory()->create([
        'is_approvable' => true,
    ]);

    livewire(EditTest::class, ['record' => $test->getRouteKey()])
        ->assertActionVisible('approve');
});

it('does not show the "approve" button when the record cannot be approved', function () {
    $test = Test::factory()->create([
        'is_approvable' => false,
    ]);

    livewire(EditTest::class, ['record' => $test->getRouteKey()])
        ->assertActionHidden('approve');
});
