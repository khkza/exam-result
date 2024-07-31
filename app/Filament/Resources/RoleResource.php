<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Permission\NavigationPermission;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RoleResource\Pages\EditRole;
use App\Filament\Resources\RoleResource\Pages\ListRoles;
use App\Filament\Resources\RoleResource\Pages\CreateRole;
use App\Filament\Resources\RoleResource\RelationManagers;

class RoleResource extends Resource
{
    use NavigationPermission;

    protected static ?string $permission = 'role-list';

    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $permissions = [];
        $configPermissions = collect(config('permissions'));
        foreach ($configPermissions as $label => $group) {
            $permissions[] = CheckboxList::make('permissions')
                ->options(collect($group)->pluck('en', 'slug')->toArray())
                ->label($label)
                ->default([])
                ->bulkToggleable()
                ->columns(2);
        }

        $selectedAllPermissions = $configPermissions
            ->collapse()
            ->pluck('slug')
            ->toArray();

        return $form
            ->schema([
                TextInput::make('name')
                            ->required()
                            ->inlineLabel()
                            ->unique(ignorable: fn ($record) => $record),
                        TextInput::make('level')
                            ->required()
                            ->integer()
                            ->inlineLabel()
                            ->unique(ignorable: fn ($record) => $record),


                Section::make()
                    ->schema([
                        Toggle::make('select_all')
                            ->reactive()
                            ->afterStateUpdated(fn ($state, $set) => $state ? $set('permissions', $selectedAllPermissions) : $set('permissions', [])),
                        ...$permissions
                    ]),
                    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No.')->rowIndex(),
                TextColumn::make('name'),
                TextColumn::make('level'),
                TextColumn::make('permissions')
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\EditAction::make()
                ->visible(fn () => auth()->user()->canAccess('role-edit')),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
