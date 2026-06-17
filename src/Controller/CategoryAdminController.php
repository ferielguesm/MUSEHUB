<?php

namespace App\Controller;

use App\Entity\PostCategory;
use App\Repository\PostCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/categories')]
#[IsGranted('ROLE_ADMIN')]
class CategoryAdminController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private PostCategoryRepository $categoryRepository
    ) {}

    #[Route('', name: 'admin_category_index', methods: ['GET'])]
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();
        
        return $this->render('admin/category_list.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/new', name: 'admin_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('create_category', $request->request->get('_token'))) {
                $this->addFlash('error', 'Jeton CSRF invalide.');
                return $this->redirectToRoute('admin_category_new');
            }

            $category = new PostCategory();
            $category->setName($request->request->get('name'));
            $category->setSlug($request->request->get('slug'));
            $category->setDescription($request->request->get('description'));
            $category->setIcon($request->request->get('icon'));
            $category->setColor($request->request->get('color'));

            $this->em->persist($category);
            $this->em->flush();

            $this->addFlash('success', 'Catégorie créée avec succès.');
            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category_form.html.twig', [
            'category' => null,
            'action' => 'new',
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_category_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            $this->addFlash('error', 'Catégorie introuvable.');
            return $this->redirectToRoute('admin_category_index');
        }

        if ($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('edit_category_' . $id, $request->request->get('_token'))) {
                $this->addFlash('error', 'Jeton CSRF invalide.');
                return $this->redirectToRoute('admin_category_edit', ['id' => $id]);
            }

            $category->setName($request->request->get('name'));
            $category->setSlug($request->request->get('slug'));
            $category->setDescription($request->request->get('description'));
            $category->setIcon($request->request->get('icon'));
            $category->setColor($request->request->get('color'));

            $this->em->flush();

            $this->addFlash('success', 'Catégorie mise à jour avec succès.');
            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category_form.html.twig', [
            'category' => $category,
            'action' => 'edit',
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_category_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            $this->addFlash('error', 'Catégorie introuvable.');
            return $this->redirectToRoute('admin_category_index');
        }

        if (!$this->isCsrfTokenValid('delete_category_' . $id, $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_category_index');
        }

        $this->em->remove($category);
        $this->em->flush();

        $this->addFlash('success', 'Catégorie supprimée avec succès.');
        return $this->redirectToRoute('admin_category_index');
    }
}
