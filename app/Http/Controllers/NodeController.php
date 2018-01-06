<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function register(RegisterNodeRequest $request) {
        $node = Node::create([
            'name' => $request->input('name'),
            'key' => $request->input('key'),
            'address' => $request->ip()
        ]);
        return;
    }
}
