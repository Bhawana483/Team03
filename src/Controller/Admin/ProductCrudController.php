<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ClothCategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ProductRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Log\LoggerInterface;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\Choice;
use App\Controller\Admin\JsonResponsese;
//use App\Controller\Admin\HttpFoundationResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductCrudController extends AbstractCrudController
{
    public function __construct(
        AdminUrlGenerator $adminUrlGenerator, 
        ClothCategoryRepository $ClothCategoryRepository, 
        UserRepository $UserRepository, 
        ProductRepository $ProductRepository, 
        SluggerInterface $slugger,
        LoggerInterface $logger
    ) {
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->ClothCategoryRepository = $ClothCategoryRepository;
        $this->UserRepository = $UserRepository;
        $this->ProductRepository = $ProductRepository;
        $this->slugger = $slugger;
        $this->logger = $logger;
    }
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
    
    public function configureActions(Actions $actions): Actions
    {
        $importPostButton = Action::new('importPost', 'Import')->setCssClass('btn btn-default')->createAsGlobalAction()->linkToCrudAction('importPost');
        $exportPostButton = Action::new('exportPost', 'Export')->setCssClass('btn btn-default')->createAsGlobalAction()->linkToCrudAction('export_data');
         
        
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
    
            return $actions 
            ->add(Crud::PAGE_INDEX, $importPostButton)
            ->add(Crud::PAGE_INDEX, $exportPostButton)
            ->add(Crud::PAGE_INDEX, 'detail')
                
                // ...
            ;
        }
        else{
            return $actions
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
             ->setPermission(Action::EDIT, 'ROLE_ADMIN')
             ->setPermission(Action::NEW, 'ROLE_ADMIN');
            ;
        }
       
                     
    }

    public function configureFields(string $pageName): iterable
    {
        $uploadPath = $this->getParameter('images');
        return [
            
           
            
            TextField::new('name'),
            TextField::new('brand'),
            IntegerField::new('cost'),
            TextField::new('color'),
            ImageField::new('image')->setLabel('Image')->setBasePath($uploadPath['uploads']['url_prefix'])->setUploadDir($uploadPath['uploads']['url_path'])->setRequired(false),
            ChoiceField::new('section')->setChoices([
              
                'Male' => 'male',
                'Female' => 'female',
                'Kids' => 'kids',
            ]),
            ChoiceField::new('size')->setChoices([
              
                'XL' => 'XL',
                'L' => 'L',
                'M' => 'M',
                'S' => 'S',
            ]),
            ChoiceField::new('cloth_type')->setChoices([
                
                 'Cotton' => 'cotton',
                 'Nylon' => 'nylon',
                 'Silk' => 'silk',
                 'Other' => 'other',
                 
             ]),
           
            DateTimeField::new('createdAt')->hideOnForm()->hideOnIndex(),
            DateTimeField::new('updatedAt')->hideOnForm()->hideOnIndex(),
            ChoiceField::new('quality')->setChoices([
               
                 'High' => 'high',
                 'Averagae' => 'average',
                 
             ]),
             ChoiceField::new('good_fit')->setChoices([
                //'Select' => null,
                 'Slim Fit' => 'slim fit',
                 'Loose Fit' => 'loose fit',
                 'Normal' => 'normal',
                 
             ]),
             ChoiceField::new('attractiveness')->setChoices([
                //'Select' => null,
                 'Highly Attractive' => 'highly attractive',
                 'Fine' => 'fine',
                 'Normal' => 'normal',
                 
             ]),
             
             ChoiceField::new('pattern')->setChoices([
                //'Select' => null,
                 'Solid' => 'solid',
                 'Printed' => 'printed',
                 'Checks' => 'checks',
                 'Other' => 'other'
                 
             ]),
             ChoiceField::new('length')->setChoices([
                
                 'Full Length' => 'full length',
                 'Short Length' => 'short length',
                 'Knee Length' => 'knee length',
                 'Normal' => 'normal'
                 
             ]),
             ChoiceField::new('neck')->setChoices([
                 'None' => ' ',
                 'Round Neck' => 'round neck',
                 'V Neck' => 'v neck',
                 'Deep Neck' => 'deep neck',
                 
             ]),
             
             ChoiceField::new('sleeve')->setChoices([
                 'None' => ' ',
                 'Full Sleeve' => 'full sleeve',
                 'Mega Sleeve' => 'mega sleeve',
                 'Lantern Sleeve' => 'lantern sleeve',
                 
                 
             ]),
             ChoiceField::new('occasion')->setChoices([
                'Traditional' => 'traditional',
                 'Party Wear' => 'party wear',
                 'Casual Wear' => 'casual wear',
                 'Formal Wear' => 'formal wear',
                 
             ]),
             ChoiceField::new('origin')->setChoices([
                //'Select' => null,
                 'Made in India' => 'made in india',
                 'Made in Zimbawe' => 'made in zimbawe',
                 'Made in Britain' => 'made in britain',
                 'Others' => 'Others',
                 
             ]),
             TextField::new('description'),
             ChoiceField::new('ease_of_care')->setChoices([
                //'Select' => null,
                 'DryClean' => 'dryclean',
                 'Washable' => 'washable',
                 
                 
             ]),
             IntegerField::new('discount'),
             AssociationField::new('category'),
             AssociationField::new('manager'),
             ChoiceField::new('status')->setChoices([
               
                 'New' => 'new',
                 'Review' => 'review',
                 'Published' => 'published',
                 
             ]),
        ];
    }
    public function importPost(Request $request)
    {
        $post = new Product();
        $form = $this->createForm(ProductType::class, $post);        
        $form->handleRequest($request);

        $importedFile = $form->get('import_file')->getData();
        if ($form->isSubmitted() && $importedFile) {
            $jsonData = file_get_contents($importedFile);
            $entityManager = $this->getDoctrine()->getManager();
           
            try{
                $postData = json_decode($jsonData);
               
                foreach ($postData as $postItem) {
                    $newPost = new Product();
                    $cat= $this->ClothCategoryRepository->find($postItem->category_id);
                   // $cat1= $this->UserRepository->find($postItem->manager_id);
                    $newPost->setManager($this -> getUser());
                    $newPost->setName($postItem->name);
                    $newPost->setClothType($postItem->cloth_type);
                    $newPost->setColor($postItem->color);
                    $newPost->setBrand($postItem->brand);
                    $newPost->setCost($postItem->cost);
                    $url = $postItem->image;
                    
                    $fname=basename($postItem->image);
                    $img = 'uploads/images/'.$fname.'';
                    file_put_contents($img, file_get_contents($url));
                    $newPost->setImage($fname);
                    $newPost->setCreatedAt(new \DateTime());
                    $newPost->setUpdatedAt(new \DateTime());
                    $newPost->setSection($postItem->section);
                    $newPost->setSize($postItem->size);
                    $newPost->setQuality($postItem->quality);
                    $newPost->setGoodFit($postItem->good_fit);
                    $newPost->setAttractiveness($postItem->attractiveness);
                   
                    $newPost->setPattern($postItem->pattern);
                    $newPost->setLength($postItem->length);
                    $newPost->setNeck($postItem->neck);
                    $newPost->setOccasion($postItem->occasion);
                    $newPost->setSleeve($postItem->sleeve);
                    $newPost->setOrigin($postItem->origin);
                    $newPost->setDescription($postItem->description);
                    $newPost->setEaseOfCare($postItem->ease_of_care);
                    $newPost->setDiscount($postItem->discount);
                    // $newPost->setPostType((!empty($postItem->post_type))?$postItem->post_type:'post');
                    if(!empty($cat)){
                        $newPost->setCategory($cat);
                    }
                    
                    // $newPost->setCategoryName($cat);
                  
                    // $newPost->setUser($this->getUser());
                    // $newPost->setStatus('draft');
                    $newPost->setStatus('new');
                    $entityManager->persist($newPost);
                    $entityManager->flush();
                }

                $this->addFlash('success', 'Product(s) data has been imported successfully');
                $this->logger->info('Data imported', $postData);
            } catch (\Exception $e){
                $this->addFlash('error', 'Unable to import data correctly.');
                $this->logger->error('Unable to import data correctly.');
            }
        }else{
            $this->logger->error('File was not uploaded');
        }

        return $this->render('admin/product/import.html.twig', [
            'page_title' => 'Import Product',
            'back_link' => $this->adminUrlGenerator->setController(ProductCrudController::class)->setAction(Action::INDEX)->generateUrl(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/export_data", name="get_all_Product", methods={"GET"})
     */
    public function export_data(): JsonResponse
    {
        $Product = $this->ProductRepository->findBy([
            'status' => 'published'
        ]);
        $data = [];

        foreach ($Product as $Products) {
            $data[] = [
                    'id' => $Products->getId(),
                    'brand' => $Products->getBrand(),
                    'color' => $Products->getColor(),
                    'cost' => $Products->getCost(),
                    'image' => $Products->getImage(),
                    'created_at' => $Products->getCreatedAt(),
                    'updated_at' => $Products->getUpdatedAt(),
                    'section' => $Products->getSection(),
                    'size' => $Products->getSize(),
                    'name' => $Products->getName(),
                    'description' => $Products->getDescription(),
                    'quality' => $Products->getQuality(),
                    'good_fit' => $Products->getGoodFit(),
                    'attractiveness' => $Products->getAttractiveness(),
                    'pattern' => $Products->getPattern(),
                    'length' => $Products->getLength(),
                    'neck' => $Products->getNeck(),
                    'occasion' => $Products->getOccasion(),
                    'sleeve' => $Products->getSleeve(),
                    'origin' => $Products->getOrigin(),
                    'ease_of_care' => $Products->getEaseOfCare(),
                    'discount' => $Products->getDiscount(),
                    'status' => $Products->getStatus(),
                    'cloth_type' => $Products->getClothType(),
                    
                
            ];
        }

        return new JsonResponse($data);
    }
}
