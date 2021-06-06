<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === rtrim($pathinfo, '/')) {
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                        goto not__profiler_home;
                    } else {
                        return $this->redirect($rawPathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ('/_profiler/purge' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // moviedex
        if ('/moviedex' === $pathinfo) {
            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::moviedexAction',  '_route' => 'moviedex',);
        }

        if (0 === strpos($pathinfo, '/worldmap')) {
            // worldmapnext
            if ('/worldmap/next' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::worldnextAction',  '_route' => 'worldmapnext',);
            }

            // worldmap
            if ('/worldmap' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::worldAction',  '_route' => 'worldmap',);
            }

        }

        // muffin time
        if ('/battle' === $pathinfo) {
            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::indexAction',  '_route' => 'muffin time',);
        }

        // task_success
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_task_success;
            } else {
                return $this->redirect($rawPathinfo.'/', 'task_success');
            }

            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::loginAction',  '_route' => 'task_success',);
        }
        not_task_success:

        // game_default_load
        if (0 === strpos($pathinfo, '/save') && preg_match('#^/save/(?P<slag>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'game_default_load')), array (  '_controller' => 'GameBundle\\Controller\\DefaultController::loadAction',));
        }

        // game_default_login
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_game_default_login;
            } else {
                return $this->redirect($rawPathinfo.'/', 'game_default_login');
            }

            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::loginAction',  '_route' => 'game_default_login',);
        }
        not_game_default_login:

        // game_default_index
        if ('/battle' === $pathinfo) {
            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::indexAction',  '_route' => 'game_default_index',);
        }

        if (0 === strpos($pathinfo, '/worldmap')) {
            // game_default_world
            if ('/worldmap' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::worldAction',  '_route' => 'game_default_world',);
            }

            // game_default_worldnext
            if ('/worldmap/next' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::worldnextAction',  '_route' => 'game_default_worldnext',);
            }

            // game_default_left
            if ('/worldmap/left' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::leftAction',  '_route' => 'game_default_left',);
            }

            // game_default_up
            if ('/worldmap/up' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::upAction',  '_route' => 'game_default_up',);
            }

            // game_default_right
            if ('/worldmap/right' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::rightAction',  '_route' => 'game_default_right',);
            }

            // game_default_down
            if ('/worldmap/down' === $pathinfo) {
                return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::downAction',  '_route' => 'game_default_down',);
            }

        }

        // game_default_save
        if ('/save' === $pathinfo) {
            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::saveAction',  '_route' => 'game_default_save',);
        }

        // game_default_moviedex
        if ('/moviedex' === $pathinfo) {
            return array (  '_controller' => 'GameBundle\\Controller\\DefaultController::moviedexAction',  '_route' => 'game_default_moviedex',);
        }

        // homepage
        if ('' === rtrim($pathinfo, '/')) {
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif (!in_array($this->context->getMethod(), array('HEAD', 'GET'))) {
                goto not_homepage;
            } else {
                return $this->redirect($rawPathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }
        not_homepage:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
