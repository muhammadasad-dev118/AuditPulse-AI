<?php

namespace App\Filament\Resources;

use App\Models\AuditResult;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Pages;
use BackedEnum; // <-- required for v5 type

class AuditResultResource extends Resource
{
    protected static ?string $model = AuditResult::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-collection';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('friendly_name')->required(),
            Forms\Components\Textarea::make('description'),
            Forms\Components\DatePicker::make('created_at'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('friendly_name'),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('created_at')->date(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuditResults::route('/'),
            'create' => Pages\CreateAuditResult::route('/create'),
            'edit' => Pages\EditAuditResult::route('/{record}/edit'),
        ];
    }
}