<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProtocolStatus;

class Protocol extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'protocol_id',
        'title',
        'resume',
        'period',
        'current_status',
        'keywords',
        'pdf',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pdf',
        'pivot'
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    public function studentsData()
    {
        return $this->hasManyThrough(
            Student::class, // Modelo destino
            ProtocolRole::class, // Modelo intermedio
            'protocol_id', // Llave foránea en ProtocolRole
            'id', // Llave foránea en Student
            'id', // Llave local en Protocol
            'user_id' // Llave local en ProtocolRole
        )->where('protocol_roles.role', 'student');
    }

    public function directorsData()
    {
        return $this->hasManyThrough(
            Staff::class, // Modelo destino
            ProtocolRole::class, // Modelo intermedio
            'protocol_id', // Llave foránea en ProtocolRole
            'id', // Llave foránea en Staff
            'id', // Llave local en Protocol
            'user_id' // Llave local en ProtocolRole
        )->where('protocol_roles.role', 'director');
    }

    public function sinodalsData()
    {
        return $this->hasManyThrough(
            Staff::class, // Modelo destino
            ProtocolRole::class, // Modelo intermedio
            'protocol_id', // Llave foránea en ProtocolRole
            'id', // Llave foránea en Staff
            'id', // Llave local en Protocol
            'user_id' // Llave local en ProtocolRole
        )->where('protocol_roles.role', 'sinodal')->with('academies');
    }

    public function students()
    {
        return $this->hasMany(ProtocolRole::class, 'protocol_id')->where('role', 'student');
    }

    public function directors()
    {
        return $this->hasMany(ProtocolRole::class, 'protocol_id')->where('role', 'director');
    }

    public function sinodals()
    {
        return $this->hasMany(ProtocolRole::class, 'protocol_id')->where('role', 'sinodal');
    }

    public function datesAndTerms()
    {
        return $this->belongsTo(DatesAndTerms::class, 'period');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(ProtocolStatus::class);
    }

    public function status()
    {
        return $this->hasOne(ProtocolStatus::class, 'protocol_id');
    }

    public function academies()
    {
        return $this->belongsToMany(Academy::class, 'protocol_academy', 'protocol_id', 'academy_id');
    }
}
