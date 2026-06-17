<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Creates an admin user',
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = 'admin@musehub.com';
        $password = 'password';

        $userRepository = $this->entityManager->getRepository(User::class);
        $existingUser = $userRepository->findOneBy(['email' => $email]);

        if ($existingUser) {
            $io->note(sprintf('User %s already exists.', $email));
            
            if (!in_array('ROLE_ADMIN', $existingUser->getRoles())) {
                $existingUser->setRoles(array_merge($existingUser->getRoles(), ['ROLE_ADMIN']));
                $this->entityManager->flush();
                $io->success('Updated existing user to have ROLE_ADMIN.');
            }
            return Command::SUCCESS;
        }

        $user = new User();
        $user->setEmail($email);
        $user->setUsername('Admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setIsActive(true);
        
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $password
        );
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success(sprintf('Admin user created successfully. Email: %s, Password: %s', $email, $password));

        return Command::SUCCESS;
    }
}
