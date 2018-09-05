<?php
/**
 * AjaxController
 * @package site-ajax
 * @version 0.0.1
 */

namespace SiteAjax\Controller;

class AjaxController extends \Mim\Controller
{
    public function singleAction() {
        $name = $this->req->param->name;

        if(!isset($this->config->siteAjax->$name))
            return $this->res->send();

        $opts = $this->config->siteAjax->$name;

        $handler = explode('::', $opts->handler);
        $class   = $handler[0];
        $method  = $handler[1];

        $cache   = $opts->cache ?? null;
        if($cache && module_exists('lib-cache-output'))
            $this->res->setCache($cache);

        $params = $class::$method();
        if(!$params)
            return $this->res->send();

        $view = $opts->view;
        $this->res->render($view, $params);

        $this->res->send();
    }
}