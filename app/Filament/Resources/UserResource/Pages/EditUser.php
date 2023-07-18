<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Services\Users\PhoneService;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['phone'])) {
            $data['phone'] = PhoneService::formatPhone(($data['phone']));
        }

        if (!isset($data['password'])) {
            unset($data['password']);
        }

        unset($data['passwordConfirmation']);

        return $data;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
