<?php 
namespace App\Tests\Form\Type;


use Symfony\Component\Form\Test\TypeTestCase;
use App\Entity\Subscriber;
use App\Form\SubscriberType;

class TestedTypeTest extends TypeTestCase {
    public function testSubmitValidData() {
        $formData = array(
            'test' => 'test',
            'test2' => 'test2',
        );
        
        $objectToCompare = new Subscriber();
        $form = $this->factory->create(SubscriberType::class, $objectToCompare);
        
        $form->submit($formData);
        
        $this->assertTrue($form->isSynchronized());
        
        // check that $objectToCompare was modified as expected when the form was submitted
        $this->assertEquals($object, $objectToCompare);
        
        $view = $form->createView();
        $children = $view->children;
        
        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
        
        
    }
}




?>