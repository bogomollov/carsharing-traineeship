<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArendatorsBills extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'arendatorsbills';

    public function bill() {
        return $this->belongsTo(Bills::class);
    }
    public function arendator() {
        return $this->belongsTo(Arendators::class);
    }

    protected static function boot() {
        parent::boot();

        static::saving(function ($bill) {
            if ($bill->arendator->default_bill_id == null) {
                $bill->arendator->default_bill_id = $bill->bill_id->id;
                $bill->arendator->save();
            }
        });

        static::saved(function ($bill) {
            $bill->bill_id->updateArendatorsCount(); //добавить функции
            $bill->bill_id->updateBillsType();
        });

        static::deleted(function ($bill) {
            $bill->bill_id->updateArendatorsCount();
            $bill->bill_id->updateBillsType();

            if ($bill->arendator->default_bill_id == $bill->bill_id->id) {
                $bill->arendator->default_bill_id = null;
                $bill->arendator->save();
            }
        });
    }
}
