<h1>array to input</h1>
  <ul class="sortable">
        <li>first
            <ul class="sortable">
                <li>1.1</li>
            </ul>
        </li>
  </ul>
  <ul class="sortable"></ul>
  <ul class="sortable"></ul>
<?php
    $f      = new file();
    $app    = new app();


    $d = [
        'toto'=>[
            'oouo'
        ],
        'asset'=>[
            'less' => [
                'test',
                '123',
                'dsqsq',
                'fdbfdsbgf'
            ],
            'js'=>[
                'toto',
                'tata'
            ]
        ]
    ];



  $c->arrayInput($d);

  ?>

