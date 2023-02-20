<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* vue/index.html */
class __TwigTemplate_dcb2d33e8895425c652facfc2c1b81ae extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "vue/index.html"));

        // line 1
        echo "<!doctype html><html lang=\"\"><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1\"><link rel=\"icon\" href=\"/favicon.ico\"><title>endpoints</title><script defer=\"defer\" src=\"/js/chunk-vendors.d09c1b74.js\"></script><script defer=\"defer\" src=\"/js/app.93d9897a.js\"></script><link href=\"/css/chunk-vendors.2014f005.css\" rel=\"stylesheet\"><link href=\"/css/app.ef7cbffc.css\" rel=\"stylesheet\"></head><body><noscript><strong>We're sorry but endpoints doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=\"app\"></div></body></html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "vue/index.html";
    }

    public function getDebugInfo()
    {
        return array (  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html><html lang=\"\"><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1\"><link rel=\"icon\" href=\"/favicon.ico\"><title>endpoints</title><script defer=\"defer\" src=\"/js/chunk-vendors.d09c1b74.js\"></script><script defer=\"defer\" src=\"/js/app.93d9897a.js\"></script><link href=\"/css/chunk-vendors.2014f005.css\" rel=\"stylesheet\"><link href=\"/css/app.ef7cbffc.css\" rel=\"stylesheet\"></head><body><noscript><strong>We're sorry but endpoints doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=\"app\"></div></body></html>", "vue/index.html", "C:\\Users\\Mat\\apps\\app\\templates\\vue\\index.html");
    }
}
