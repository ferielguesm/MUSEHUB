<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArtworkAdminControllerTest extends WebTestCase
{
    public function testArtworkCreationFlow()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        
        // Retrieve the admin user we created earlier
        $testUser = $userRepository->findOneBy(['email' => 'admin@musehub.com']);
        
        if (!$testUser) {
            $this->markTestSkipped('Admin user not found. Please run manual setup.');
        }

        $client->loginUser($testUser);

        // 1. Navigate to the Creation Page
        $crawler = $client->request('GET', '/admin/artworks/new');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Créer une œuvre');

        // 2. Submit Empty Form (Expect Validation Errors)
        $buttonCrawlerNode = $crawler->selectButton('Créer');
        $form = $buttonCrawlerNode->form();
        
        // We submit empty strings for required fields
        $client->submit($form, [
            'artwork[title]' => '',
            'artwork[artistUuid]' => '',
            'artwork[price]' => '',
        ]);
        
        $this->assertResponseIsSuccessful(); // Should not redirect
        // Look for HTML5 validation or server-side validation. 
        // Since we enabled "novalidate" on form, we expect server errors.
        // In the template: {{ form_start(form, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
        
        // Symfony forms usually render errors in a div or list.
        // My template: {{ form_errors(form.title) }}
        
        // We can check for specific error messages I added in Entity
        // "Le titre est obligatoire."
        $this->assertAnySelectorTextContains('body', 'Le titre est obligatoire');
        $this->assertAnySelectorTextContains('body', 'Le prix est obligatoire');
        
        // 3. Submit Negative Price (Expect Error)
        $client->submit($form, [
            'artwork[title]' => 'Test Artwork',
            'artwork[artistUuid]' => 'test-uuid-123',
            'artwork[description]' => 'Description',
            'artwork[price]' => '-50',
            'artwork[status]' => 'visible',
        ]);
        
        $this->assertAnySelectorTextContains('body', 'Le prix doit être positif');

        // 4. Submit Valid Data (Success)
        // I will use a manually entered URL for image just to test "non-upload" success path first, 
        // as uploading fake files in tests is slightly more verbose.
        $client->submit($form, [
            'artwork[title]' => 'Functional Test Art',
            'artwork[artistUuid]' => 'func-test-uuid',
            'artwork[description]' => 'A beautiful test artifact',
            'artwork[price]' => '150.00',
            'artwork[imageUrl]' => 'https://via.placeholder.com/150',
        ]);
        
        // Should redirect to index
        $this->assertResponseRedirects('/admin/artworks');
        $client->followRedirect();
        
        // Assert we see the success message
        $this->assertSelectorTextContains('.alert-success', 'succès');
    }

    public function testLikeFunctionality()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneBy(['email' => 'admin@musehub.com']);
        $client->loginUser($testUser);

        // 1. Create a quick artwork for testing likes
        $entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        
        // We need a unique title to avoid unique constraint if any (though currently none on title)
        $artwork = new \App\Entity\Artwork();
        $artwork->setTitle('Likeable Art ' . uniqid());
        $artwork->setArtistUuid('artist-123');
        $artwork->setPrice('50.00');
        $artwork->setImageUrl('http://example.com/img.jpg');
        $artwork->setLikesCount(0);
        
        $entityManager->persist($artwork);
        $entityManager->flush();

        $artworkId = $artwork->getId();

        // 2. Like the artwork
        $client->request('POST', '/admin/artworks/' . $artworkId . '/like');
        $this->assertResponseRedirects('/admin/artworks');
        
        // Verify count became 1
        $entityManager->clear();
        $artwork = $entityManager->getRepository(\App\Entity\Artwork::class)->find($artworkId);
        $this->assertEquals(1, $artwork->getLikesCount());

        // 3. Unlike the artwork
        $client->request('POST', '/admin/artworks/' . $artworkId . '/like');
        $this->assertResponseRedirects('/admin/artworks');

        // Verify count became 0
        $entityManager->clear();
        $artwork = $entityManager->getRepository(\App\Entity\Artwork::class)->find($artworkId);
        $this->assertEquals(0, $artwork->getLikesCount());
    }
}
