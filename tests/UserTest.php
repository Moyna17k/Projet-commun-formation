<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreateUser()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }

    public function testId()
    {
        $user = new User();
        // En supposant que l'ID est généré automatiquement par Doctrine,
        // nous n'avons pas besoin de définir manuellement l'ID ici.
        // Donc, on teste juste que getId() retourne null initialement.
        $this->assertNull($user->getId());
    }

    public function testEmail()
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertEquals('test@example.com', $user->getEmail());
    }

    public function testRoles()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }

    public function testPassword()
    {
        $user = new User();
        $user->setPassword('password');
        $this->assertEquals('password', $user->getPassword());
    }

    public function testIsVerified()
    {
        $user = new User();
        $user->setVerified(true);
        $this->assertTrue($user->isVerified());
    }
}
