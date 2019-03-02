<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\User\UserRepository;

class UserExtension extends AbstractExtension
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getOwner', [$this, 'getOwner']),
        ];
    }

    public function getOwner()
    {
        return $this->userRepository->findBlogOwner();
    }
}
