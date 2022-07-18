<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GuidesModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_assets';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fields = [
        'id',
        'type',
        'name',
        'ext',
        'path',
        'seed',
        'environment',
        'deleted_at'
    ];
}
