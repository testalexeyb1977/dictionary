<?php

namespace App\DataFixtures;

use App\Entity\Dictionary\EAV\Attribute;
use App\Entity\Dictionary\EAV\Dictionary;
use App\Entity\Dictionary\EAV\DictionaryUW;
use App\Entity\Dictionary\EAV\Entity;
use App\Entity\Dictionary\EAV\EntityUW;
use App\Entity\Dictionary\EAV\Value;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        /**
         * Обычный плоский справочник
         */
        $dictionary = new Dictionary('Образование');

        $entity1 = new Entity('Среднее', $dictionary);
        $entity2 = new Entity('Высшее', $dictionary);
        $entity3 = new Entity('Несколько высших', $dictionary);

        $manager->persist($dictionary);
        $manager->persist($entity1);
        $manager->persist($entity2);
        $manager->persist($entity3);

        /**
         * Справочник с аттрибутами
         */
        $dictionary = new Dictionary('Тачки');

        $attributeMarka = new Attribute('Marka', $dictionary);
        $attributeModel = new Attribute('Model', $dictionary);
        $attributePower = new Attribute('Power', $dictionary);

        $entity1 = new Entity('ACURA - MDX 3,5', $dictionary);
        $attributeMarkaValue = new Value($entity1, $attributeMarka, 'ACURA');
        $attributeModelValue = new Value($entity1, $attributeModel, 'MDX 3,5');
        $attributePowerValue = new Value($entity1, $attributePower, '290');

        $manager->persist($dictionary);
        $manager->persist($attributeMarka);
        $manager->persist($attributeModel);
        $manager->persist($attributePower);
        $manager->persist($entity1);
        $manager->persist($attributeMarkaValue);
        $manager->persist($attributeModelValue);
        $manager->persist($attributePowerValue);

        /**
         * Пример Маппинга
         */
        $dictionaryUW = new DictionaryUW('Социальный статус');

        // Можно также добавить атрибуты для справочника UW
        $attributeTest = new Attribute('TestAttr', $dictionary);
        $entityUW = new EntityUW('Наемный рабочий', $dictionary);
        $attributeTestValue = new Value($entityUW, $attributeTest, 'test');

        $dictionaryPartner = new Dictionary('Социальный статус');
        $entityPartner = new Entity('Другое', $dictionary);

        $entityUW->addMapping($entityPartner);

        $manager->persist($dictionaryUW);
        $manager->persist($attributeTest);
        $manager->persist($attributeTestValue);
        $manager->persist($entityUW);
        $manager->persist($dictionaryPartner);
        $manager->persist($entityPartner);

        $manager->flush();
    }
}
