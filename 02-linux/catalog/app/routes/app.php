<?php

return [
    '/' => function () {
        return 'Hello world';
    },
    '/about' => function () {
        return 'About us';
    },
    'posts/{id:\d+}' => function () {
       class Post {

            private $id;
            private $title;
            private $description;
            private $author;


            public function __construct($title, $description, $author)
            {
                $this->title = $title;
                $this->description = $description;
                $this->author = $author;
            }


           /**
            * @return mixed
            */
           public function getId()
           {
               return $this->id;
           }
       }

       return [
           new Post('Post 1', 'description 1', 'author 1'),
           new Post('Post 2', 'description 2', 'author 2'),
       ];
    }
];