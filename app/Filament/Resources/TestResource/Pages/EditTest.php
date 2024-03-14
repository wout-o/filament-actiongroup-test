<?php

namespace App\Filament\Resources\TestResource\Pages;

use App\Filament\Resources\TestResource;
use Filament\Actions;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\EditRecord;

class EditTest extends EditRecord
{
    protected static string $resource = TestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            ActionGroup::make([
                Actions\Action::make('approve'),
                Actions\Action::make('decline'),
            ])
                ->label(__('Respond to request'))
                ->visible(fn () => $this->record->is_approvable)
                ->button(),
        ];
    }
}
