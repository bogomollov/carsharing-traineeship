<?php

namespace App\Models;

use App\Enums\BillsStatus;
use App\Enums\BillsType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Arendator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasUuids;
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'arendators_count',
        'balance',
        'type',
        'status',
    ];

    protected $hidden = [
       'balance'
    ];

    public function bills()
    {
        return $this->hasMany(Arendator::class, 'default_bill_id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'id', 'bill_id');
    }

    public function updateRentersCount() {
        $this->arendators_count = $this->bills()->count();
        $this->save();
    }

    public function updateBillType() {
        if ($this->arendators_count > 1)
        {
            $this->type = BillsType::Corporated;
        }

        elseif ($this->arendators_count == 1)
        {
            $this->type = BillsType::Personal;
        }

        elseif ($this->arendators_count == 0) {
            $this->status = BillsStatus::Blocked;
        }
        $this->save();
    }
}
