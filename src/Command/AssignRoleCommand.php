<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:user:assign-role',
    description: 'Assigne un rôle à un utilisateur',
)]
class AssignRoleCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email de l\'utilisateur')
            ->addArgument('role', InputArgument::REQUIRED, 'Rôle à assigner (ROLE_ADMINISTRATEUR, ROLE_CATECHISTE, ROLE_CATECHUMENE)')
            ->addOption('remove', null, InputOption::VALUE_NONE, 'Supprimer le rôle au lieu de l\'assigner')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $role = $input->getArgument('role');
        
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        
        if (!$user) {
            $io->error(sprintf('Utilisateur avec l\'email "%s" non trouvé', $email));
            return Command::FAILURE;
        }

        $validRoles = ['ROLE_ADMINISTRATEUR', 'ROLE_CATECHISTE', 'ROLE_CATECHUMENE'];
        if (!in_array($role, $validRoles)) {
            $io->error(sprintf('Rôle "%s" invalide. Rôles valides: %s', $role, implode(', ', $validRoles)));
            return Command::FAILURE;
        }

        $roles = $user->getRoles();
        
        if ($input->getOption('remove')) {
            if (($key = array_search($role, $roles)) !== false) {
                unset($roles[$key]);
                $user->setRoles(array_values($roles));
                $this->entityManager->flush();
                $io->success(sprintf('Rôle "%s" supprimé pour l\'utilisateur "%s"', $role, $email));
            } else {
                $io->warning(sprintf('L\'utilisateur "%s" n\'a pas le rôle "%s"', $email, $role));
            }
        } else {
            if (!in_array($role, $roles)) {
                $roles[] = $role;
                $user->setRoles($roles);
                $this->entityManager->flush();
                $io->success(sprintf('Rôle "%s" assigné à l\'utilisateur "%s"', $role, $email));
            } else {
                $io->warning(sprintf('L\'utilisateur "%s" a déjà le rôle "%s"', $email, $role));
            }
        }

        return Command::SUCCESS;
    }
}
