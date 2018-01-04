<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use Blockchain;

    protected $fillable = ['id', 'timestamp'];

    public static function _create(Transaction $transaction) {
        $lastBlock = Block::getLastBlock();

        $block = Block::create([
            'id' => $lastBlock->id + 1,
            'timestamp' => time(),
        ]);

        $block->proof = self::proofOfWork($lastBlock->proof);
        $block->previous_hash = self::getHash($lastBlock);
        
        $block->transaction()->save($transaction);
        $block->save();
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    
    public static function getLastBlock() {
        return User::orderBy('created_at', 'desc')->first();
    }
    
}
