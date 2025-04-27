<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\Toggle::make('is_admin')
                ->name('Administrador')
                ->required(),
            Forms\Components\Toggle::make('can_access_panel_admin')
                ->name('Pode acessar o painel administrativo')
                ->required(),
            Forms\Components\Select::make('roles')
                ->label('Roles')
                ->relationship('roles', 'name') // Relaciona com os papéis
                ->multiple() // Permite selecionar múltiplos papéis
                ->preload()
                ->helperText('Selecione o(s) papel(is) para este usuário.'),
            Forms\Components\Select::make('permissions')
                ->label('Permissions')
                ->relationship('permissions', 'name') // Relaciona com as permissões
                ->multiple() // Permite selecionar múltiplas permissões
                ->preload()
                ->helperText('Selecione permissões específicas para este usuário.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('roles.name')
                ->label('Roles')
                ->sortable()
                ->wrap(),
            Tables\Columns\TextColumn::make('permissions.name')
                ->label('Permissions')
                ->sortable()
                ->wrap(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
        ];
    }
}
