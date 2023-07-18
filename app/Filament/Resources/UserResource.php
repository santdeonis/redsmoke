<?php

namespace App\Filament\Resources;

use App\Enums\UserRoleEnum;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Exception;
use Filament\Forms;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Request;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label(__('user.label.name'))
                            ->placeholder(__('user.placeholder.name')),

                        Forms\Components\TextInput::make('username')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->required()
                            ->label(__('user.label.username'))
                            ->placeholder(__('user.placeholder.username')),
                    ]),

                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->options(UserRoleEnum::toSelect())
                            ->required()
                            ->label(__('user.label.role'))
                            ->placeholder(__('user.placeholder.role')),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->label(__('user.label.email'))
                            ->placeholder(__('user.placeholder.email')),


                        Forms\Components\TextInput::make('phone')
                            ->mask(fn(Mask $mask) => $mask->pattern('+{7} (000) 000 0000'))
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->label(__('user.label.phone')),
                    ]),

                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->same('passwordConfirmation')
                            ->password()
                            ->minLength(8)
                            ->required(function () {
                                $urlExploded = explode('/', Request::route()->uri);
                                $actionName = end($urlExploded);
                                return $actionName === 'create';
                            })
                            ->label(__('user.label.password'))
                            ->placeholder(__('user.placeholder.password')),

                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->same('password')
                            ->password()
                            ->requiredWith('password')
                            ->label(__('user.label.password_confirm'))
                            ->placeholder(__('user.placeholder.password_confirm')),
                    ])->visibleOn(['create', 'edit']),

                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\DateTimePicker::make('created_at')
                            ->label(__('user.label.created_at')),

                        Forms\Components\DateTimePicker::make('updated_at')
                            ->label(__('user.label.updated_at')),

                        Forms\Components\DateTimePicker::make('deleted_at')
                            ->visible(function (User $record) {
                                return !is_null($record->deleted_at);
                            })
                            ->label(__('user.label.deleted_at'))
                    ])
                    ->visibleOn('view'),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('user.label.id')),

                Tables\Columns\TextColumn::make('role')
                    ->getStateUsing(function (User $record) {
                        return UserRoleEnum::find($record->role)->getValue();
                    })
                    ->label(__('user.label.role')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('user.label.name'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('username')
                    ->label(__('user.label.username'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('user.label.email'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label(__('user.label.phone')),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),

                Tables\Filters\SelectFilter::make('role')
                    ->options(
                        UserRoleEnum::toSelect(),
                    )->label(__('user.filter.role')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getLabel(): ?string
    {
        return __('user.view.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('user.view.plural_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('user.view.plural_model_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('user.view.navigation_label');
    }
}
