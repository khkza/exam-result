<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Student;
use Filament\Forms\Form;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'phone',
        'password',
        'permissions'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

public function canAccessPanel(Panel $panel): bool
    {
        return true;
        // return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function canAccess(string $permission): bool
    {
        return (bool) in_array($permission, self::authPermissions());
    }
    public function forms()
    {
        // return $this->belongsToMany(Form::class, 'forms_users');
        return $this->hasMany(Form::class);

    }
  public  function authPermissions(): array
    {

       //dd(auth()->user()->role);
      return auth()->user()->role->permissions;
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
