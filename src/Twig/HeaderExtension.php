<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\Page\Header\HeaderRepository;

class HeaderExtension extends AbstractExtension
{
    /**
     * @var HeaderRepository
     */
    private $headerRepository;

    public function __construct(HeaderRepository $headerRepository)
    {
        $this->headerRepository = $headerRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getEnabled', [$this, 'getEnabled']),
        ];
    }

    public function getEnabled()
    {
        return $this->headerRepository->findEnabled();
    }
}
