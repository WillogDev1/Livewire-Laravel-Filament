<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShieldResource\Pages;
use App\Models\Shield;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ShieldResource extends Resource
{
    protected static ?string $model = Shield::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationGroup = 'Guardian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\CheckboxList::make('permissions')
                    ->relationship('permissions', 'name') // Relaciona com as permissões
                    ->columns(2)
                    ->helperText('Selecione as permissões para este papel.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('permissions_count')
                    ->label('Permissões')
                    ->counts('permissions') // Conta as permissões relacionadas
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListShields::route('/'),
            'create' => Pages\CreateShield::route('/create'),
            'edit' => Pages\EditShield::route('/{record}/edit'),
        ];
    }
}
