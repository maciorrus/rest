<?php

namespace App\Controller;

use App\Entity\TaskList;
use App\Repository\PhotoRepository;
use App\Repository\TaskListRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\FileParam;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Response;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractFOSRestController
{
    /**
     * @var TaskListRepository
     */
    private $taskListRepository;
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var PhotoRepository
     */
    private $photoRepository;

    public function __construct(TaskListRepository $taskListRepository, PhotoRepository $pr, EntityManagerInterface $em){

        $this->taskListRepository = $taskListRepository;
        $this->photoRepository = $pr;
        $this->em = $em;
    }

    public function getListsAction()
    {
        return $this->taskListRepository->findAll();
    }

    /**
     * @RequestParam(name="title", nullable=false)
     * @param ParamFetcherInterface $fetcher
     * @return TaskList[]
     */
    public function postListAction(ParamFetcher $fetcher)
    {
        $title = $fetcher->get('title');
        $list = new TaskList();
        if($title){
            $list->setTitle($title);
            $this->em->persist($list);
            $this->em->flush();
        }
        return $this->view($this->taskListRepository->findAll(), Response::HTTP_CREATED);
    }

    /**
     * @FileParam(name="image", nullable=false, image=true)
     * @param ParamFetcherInterface $fetcher
     * @return int
     */
    public function postImageAction(ParamFetcher $fetcher)
    {
        $file = $fetcher->get('image');
        if($file){
            $file->move('/home/mmichalak/Obrazy/',$_FILES['image']['name']);
        }
        echo 'Done\n';
        return count($_FILES);
    }



//    public function index()
//    {
//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/HomeController.php',
//        ]);
//    }
}
