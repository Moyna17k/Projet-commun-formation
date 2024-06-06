<?php

namespace App\Tests\Form;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\Form\Test\TypeTestCase;

class RegistrationFormTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'email' => 'test@example.com',
            'agreeTerms' => true,
            'plainPassword' => [
                'first' => 'password',
                'second' => 'password',
            ],
        ];

        $user = new User();

        $form = $this->factory->create(RegistrationFormType::class, $user);

        $expectedUser = new User();
        $expectedUser->setEmail('test@example.com');
        $expectedUser->setPlainPassword('password');
        $expectedUser->setAgreeTerms(true);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expectedUser, $user);

        // Check if form rendering is working correctly
        $view = $form->createView();
        $this->assertArrayHasKey('email', $view);
        $this->assertArrayHasKey('agreeTerms', $view);
        $this->assertArrayHasKey('plainPassword', $view);
    }

    public function testSubmitInvalidData(): void
    {
        $formData = [
            'email' => 'invalid-email',
            'agreeTerms' => false,
            'plainPassword' => [
                'first' => 'short',
                'second' => 'short',
            ],
        ];

        $user = new User();

        $form = $this->factory->create(RegistrationFormType::class, $user);

        $form->submit($formData);

        $this->assertFalse($form->isSynchronized());
        $this->assertCount(3, $form->getErrors(true));
    }
}
