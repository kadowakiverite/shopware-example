<?php declare(strict_types=1);

namespace Nao\Example\Subscriber;

use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Shopware\Core\System\SalesChannel\Entity\SalesChannelEntityLoadedEvent;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Core\Content\Product\ProductEvents;

class MySubscriber implements EventSubscriberInterface
{
    public function __construct(
        private SystemConfigService $systemConfigService
    ){}
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageLoadedEvent::class => 'onProductsLoaded'
        ];
    }

    public function onProductsLoaded(ProductPageLoadedEvent $event): void
    {
        $page = $event->getPage();
        $exapmleConfig = $this->systemConfigService->get('NaoExample.config.example');
        $customBlock = '<p>The Example Config is: '. $exapmleConfig.'</p>';
        $page->setExtensions(['customBlock' => $customBlock]);
    }
}