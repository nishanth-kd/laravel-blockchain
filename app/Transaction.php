<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['amount'];

    public static function _create($attr) {
        $transaction = Transaction::create($attr);
        $transaction->sender(User::find($attr['sender_id']));
        $transaction->recipient(User::find($attr['recipient_id']));
        if($transaction->isValid()) {
            return $transaction;
        } else {
            return;
        }
        
    }

    public function sender(User $sender) {
        
        if($sender) {
           $this->sender_id = $sender->id;
           return true;
        }
        return false;
    }

    public function recipient(User $recipient) {
        if($recipient) {
           $this->recipient_id = $recipient->id;
           return true;
        }
        return false;
    }

    public function senderHasBalance() {
        return true;
    }

    public function isValid() {
        return $this->senderHasBalance();
    }
}
