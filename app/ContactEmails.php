<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmails extends Model
{
    //declare the table
    protected $table = "contact_emails";

    //set fillable fields
    protected $fillable = [
      'name',
      'email',
      'number',
      'content'
    ];
}
