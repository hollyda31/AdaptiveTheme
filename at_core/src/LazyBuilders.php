<?php

namespace Drupal\at_core;

use \Drupal\Core\Security\TrustedCallbackInterface;

/**
 * Lazy builders for the at_theme
 */
class LazyBuilders implements TrustedCallbackInterface {

  /**
   * {@inheritdoc}
   */
  public static function trustedCallbacks() {
    return ['breadcrumbTitle'];
  }

  /**
   * Return values for the breadcrumb title placeholder.
   * @param $page_title
   * @return array
   */
  public static function breadcrumbTitle() {
    $request = \Drupal::request();
    $route_match = \Drupal::routeMatch();
    $title = \Drupal::service('title_resolver')->getTitle($request, $route_match->getRouteObject());
    $array = [
      '#theme' => 'page_title__breadcrumb',
      '#title' => $title,
    ];
    return $array;
  }

}
