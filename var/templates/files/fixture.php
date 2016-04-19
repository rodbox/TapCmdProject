<?php
namespace {{ BUNDLENAMESPACE }}\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use {{ NAMESPACE }};

class Load{{ ENTITY }} implements FixtureInterface
{

  public function load(ObjectManager $em)

  {
    $attrs = [
      [
        'name'  => 'stockage',
        'view' => 'default'
      ],
      [
        'name'  => 'colors',
        'view' => 'colors'
      ],
      [
        'name'  => 'size',
        'view' => 'size'
      ],


    ];

    foreach ($attrs as $attr) {
      ${{ ENTITY }} = new {{ ENTITY }}();
      ${{ ENTITY }}->setName($attr['name']);
      ${{ ENTITY }}->setView($attr['view']);

      $em->persist(${{ ENTITY }});
    }

    $em->flush();
  }

}