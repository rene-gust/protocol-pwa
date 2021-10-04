<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Annotation\Route;

class CientEntryController extends AbstractController
{
    /**
     * @Route("/client/entry/add", name="client_entry_add")
     */
    public function add()
    {
        $form = $this->createEntryForm();
        return $this->render('index.html.twig');
    }

    private function createEntryForm(): FormInterface
    {
        return $this->createFormBuilder()
            ->add('date', DateType::class)
            ->add('disturbanceType', DateType::class)
            ->getForm();
    }
}
