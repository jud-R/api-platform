<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;

class PostCountController {

    public function __construct(private PostRepository $postRepository)
    {
    }
    
    public function __invoke(Request $request): int
    {
        $onLineQuery = $request->get('online');
        $conditions = [];
        if($onLineQuery !== null){
            $conditions = ['online' => $onLineQuery === '1' ? true : false];
        }
        return $this->postRepository->count($conditions);
    }
}
