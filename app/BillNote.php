<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillNote extends Model
{
  protected $table = 'bill_notes';
  protected $primaryKey = 'bill_note_id';

  protected $fillable = [
    'bill_note_desc_en',
    'bill_note_desc_ar',

  ];

  public $timestamps = false;

}
