<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(protected Environment $twig, protected RouterInterface $routerInterface ){
    
    }
    public function onControllerEvent(ControllerEvent $event): void
    {
        $routes = $this->routerInterface->getRouteCollection();
        foreach($routes as $k => $route){
            if(strpos( $k, '_',  0)){
                $allRoutes[] = $k;
            }
        }

        $this->twig->addGlobal('allroutes', $allRoutes);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
