<?php

namespace App;

trait BlockchainHelper
{
    
    public static function proofOfWork(String $lastProof) {
        $proof = 0;
        while (false == self::validProof($lastProof, $proof)) {
            $proof++;
        }
        return $proof;
    }

    public static function validProof(String $lastProof, String $proof) {
        return substr(hash('sha256', $lastProof.$proof), -1) == '0';
    }

    public static function getHash(Block $block) {
        return hash('sha256', $block->toJson());
    }

    public static function validChain(Block $blocks) {
        $previousBlock = false;
        foreach($blocks as $block) {
            if($previousBlock) {
                if($block->previous_hash != self::getHash($previousBlock)) {
                    return false;
                } 
                if(false == self::validProof($previousBlock->proof, $block->proof)) {
                    return false;
                }
            } else {
                $previousBlock = $block;
            }
        }
        return true;
    }

}
