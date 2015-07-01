<?php
namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ExclusiveBooks\DemoAppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function indexAction($descrip,$price)
    {
    $product = new Product();
    $product->setName($descrip);
    $product->setPrice($price);
    $product->setDescription('Lorem ipsum dolor');

    $em = $this->getDoctrine()->getManager();

    $em->persist($product);
    $em->flush();

    return new Response('Created product id '.$product->getId());
    }

public function updateAction($id,$name)
{
    $em = $this->getDoctrine()->getManager();
    $product = $em->getRepository('ExclusiveBooksDemoAppBundle:Product')->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $product->setName($name);
    $em->flush();

    return $this->redirectToRoute('product',array('id' =>$id));
}

    public function showAction($id)
	{
	    $product = $this->getDoctrine()
		->getRepository('ExclusiveBooksDemoAppBundle:Product')
		->find($id);

	    if (!$product) {
		throw $this->createNotFoundException(
		    'No product found for id '.$id
		);
	    }

	   return $this->render('ExclusiveBooksDemoAppBundle:Product:product.html.twig',array('product' => $product));
	}
	public function showallAction()
	{
	     $em = $this->getDoctrine()->getManager();
             $products = $em->getRepository('ExclusiveBooksDemoAppBundle:Product')
              ->findlikeNameOrderedByPrice('blou');

	    if (!$products) {
		throw $this->createNotFoundException(
		    'No products found!'
		);
	    }

	   return $this->render('ExclusiveBooksDemoAppBundle:Product:products.html.twig',array('products' => $products));
	}
}
