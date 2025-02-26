<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoansResource\Pages;
use App\Filament\Resources\LoansResource\RelationManagers;
use App\Models\Loans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoansResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('anggota_id')
                ->relationship('anggota','nama_asset')
                    ->required(),
                Forms\Components\Select::make('asset_id')
                ->relationship('asset','nama_asset')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_peminjaman')
                ->default(now())//jangan lupa di migrasi kasih ini juga atau nullable
                // ->disabled()
                ->readOnly()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengembalian')
                ->default(now()->addDays(7)),
                Forms\Components\Select::make('status')
                ->options(['dipinjam'=> 'dipinjam'])->default('dipinjam')    
                ->disabled()
                // ->readonly()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('anggota.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('asset.nama_asset')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_peminjaman')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoans::route('/create'),
            'edit' => Pages\EditLoans::route('/{record}/edit'),
        ];
    }
}
