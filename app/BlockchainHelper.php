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

}
