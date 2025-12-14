<?php

namespace App\Command;

use App\Entity\PostCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:seed-post-categories',
    description: 'Seed default post categories for the community',
)]
class SeedPostCategoriesCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $categories = [
            [
                'name' => 'Actualités',
                'slug' => 'news',
                'description' => 'Actualités et annonces importantes',
                'icon' => 'fas fa-newspaper',
                'color' => '#3b82f6'
            ],
            [
                'name' => 'Questions',
                'slug' => 'questions',
                'description' => 'Questions et discussions',
                'icon' => 'fas fa-question-circle',
                'color' => '#10b981'
            ],
            [
                'name' => 'Humour',
                'slug' => 'memes',
                'description' => 'Humour et memes',
                'icon' => 'fas fa-laugh-squint',
                'color' => '#f59e0b'
            ],
            [
                'name' => 'Inspiration',
                'slug' => 'inspiration',
                'description' => 'Inspirations artistiques et créatives',
                'icon' => 'fas fa-lightbulb',
                'color' => '#8b5cf6'
            ],
            [
                'name' => 'Événements',
                'slug' => 'events',
                'description' => 'Discussions sur les événements',
                'icon' => 'fas fa-calendar-alt',
                'color' => '#ef4444'
            ],
            [
                'name' => 'Général',
                'slug' => 'general',
                'description' => 'Discussions générales',
                'icon' => 'fas fa-comments',
                'color' => '#6b7280'
            ]
        ];

        foreach ($categories as $categoryData) {
            $existing = $this->entityManager->getRepository(PostCategory::class)->findOneBy(['slug' => $categoryData['slug']]);
            if ($existing) {
                $output->writeln("Category '{$categoryData['name']}' already exists, skipping.");
                continue;
            }

            $category = new PostCategory();
            $category->setName($categoryData['name']);
            $category->setSlug($categoryData['slug']);
            $category->setDescription($categoryData['description']);
            $category->setIcon($categoryData['icon']);
            $category->setColor($categoryData['color']);

            $this->entityManager->persist($category);
            $output->writeln("Created category '{$categoryData['name']}'.");
        }

        $this->entityManager->flush();

        $output->writeln('Post categories seeded successfully!');

        return Command::SUCCESS;
    }
}
