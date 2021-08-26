<?php

namespace Drupal\unocha_term_front\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Force admin theme for add, edit and delete form.
    foreach ($collection->all() as $route) {
      if (strpos($route->getPath(), '/admin/structure/taxonomy/manage/{taxonomy_vocabulary}/add') === 0) {
        $route->setOption('_admin_route', FALSE);
      }

      if (strpos($route->getPath(), '/taxonomy/term/{taxonomy_term}/edit') === 0) {
        $route->setOption('_admin_route', FALSE);
      }

      if (strpos($route->getPath(), '/taxonomy/term/{taxonomy_term}/delete') === 0) {
        $route->setOption('_admin_route', FALSE);
      }

      if (strpos($route->getPath(), '/taxonomy/term/{taxonomy_term}/revisions') === 0) {
        $route->setOption('_admin_route', FALSE);
      }
    }
  }

}
