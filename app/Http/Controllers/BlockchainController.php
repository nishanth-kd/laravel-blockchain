<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blocks;
use App\Http\Request\TransactionRequest;
use App\Block;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function mine(Request $request) {
        $lastBlock = Block::getLastBlock();
        $proof = $lastBlock->proofOfWork();

        $transaction = Transaction::_create([
            'sender_id' => '0',
            'recipient_id' => $request->input('node_id'),
            'amount' => '1',
        ]);

        $block = Block::_create($transaction);

        return new Blocks(Block::_create($request));
    }

    public function transact(TransactionRequest $request) {
        $transaction = Transaction::_create($request->input());
        $block = Block::_create($transaction);
        return new Blocks($block);
    }

    public function chain(Request $request) {
        return new Chain(Block::_create($request));
    }
}
