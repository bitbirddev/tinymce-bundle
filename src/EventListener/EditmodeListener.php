<?php

namespace bitbirddev\TinyMceBundle\EventListener;

use Pimcore\Event\BundleManagerEvents;
use Pimcore\Event\BundleManager\PathsEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: BundleManagerEvents::EDITMODE_JS_PATHS, method: 'addPath')]
#[AsEventListener(event: BundleManagerEvents::JS_PATHS, method: 'addPath')]
class EditmodeListener
{
    public function addPath(PathsEvent $event): void
    {
        $event->setPaths(array_merge($event->getPaths(), [
            '/bundles/tinymce/js/pimcore/tinymce.js'
        ]));
    }
}
