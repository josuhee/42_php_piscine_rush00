<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* GameBundle::login.html.twig */
class __TwigTemplate_2b1471007d24300707b1e5ddbbf2bcd31d9e61ea3c0ae31c85a5d6756d4d0cad extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "GameBundle::login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Login the Game</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/login.css\"/>
    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"script/login.js\"></script>
</head>
<body>
    <!--total-->
    <div id=\"page-wrapper\">
        <!--header-->
        <header id=\"main-header\">
            <hgroup>
                <h1>Start the Game</h1>
                <h2>-Capture your moviemon</h2>
            </hgroup>
        </header>
        <!--content-->
        <div id=\"content\">
            <!--login-->
            <div id=\"login\" class=\"pull-left\">
                <ul class=\"outer-menu\">
                    <li class=\"outer-menu-item\">
                        <span class=\"outer-menu-title\">NEW !</span>
                        <ul class=\"inner-menu\">
                            <li>
                                ";
        // line 31
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start');
        echo "
                                ";
        // line 32
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "
                            </li>
                        </ul>
                    </li>
                    <li class=\"outer-menu-item\">
                        <span class=\"outer-menu-title\">Load !</span>
                        <ul class=\"inner-menu\">
                            ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["save"] ?? $this->getContext($context, "save")));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 40
            echo "                            <li><a href=\"http://localhost:8000/save/";
            echo twig_escape_filter($this->env, $context["file"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["file"], "html", null, true);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--footer-->
        <footer id=\"main-footer\">
            <p class=\"footer-margin\">php | piscine | rush00 | project | by. slee2, sujo</p>
            <p class=\"footer-margin\">Born to code. 42Seoul...</p>
            <div class=\"git-address\">
                <img class=\"pull-left\" src=\"img/github.png\" alt=\"\">
                <p class=\"pull-left\"><span>slee2</span> : https://github.com/Lee-seungju</p>
            </div>
            <div class=\"git-address\">
                <img class=\"pull-left\" src=\"img/github.png\" alt=\"\">
                <p class=\"pull-left\"><span>sujo</span> : https://github.com/josuhee</p>
            </div>
        </footer>
    </div>
</body>
</html>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "GameBundle::login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 42,  83 => 40,  79 => 39,  69 => 32,  65 => 31,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Login the Game</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/login.css\"/>
    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"script/login.js\"></script>
</head>
<body>
    <!--total-->
    <div id=\"page-wrapper\">
        <!--header-->
        <header id=\"main-header\">
            <hgroup>
                <h1>Start the Game</h1>
                <h2>-Capture your moviemon</h2>
            </hgroup>
        </header>
        <!--content-->
        <div id=\"content\">
            <!--login-->
            <div id=\"login\" class=\"pull-left\">
                <ul class=\"outer-menu\">
                    <li class=\"outer-menu-item\">
                        <span class=\"outer-menu-title\">NEW !</span>
                        <ul class=\"inner-menu\">
                            <li>
                                {{ form_start(form) }}
                                {{ form_end(form) }}
                            </li>
                        </ul>
                    </li>
                    <li class=\"outer-menu-item\">
                        <span class=\"outer-menu-title\">Load !</span>
                        <ul class=\"inner-menu\">
                            {% for file in save %}
                            <li><a href=\"http://localhost:8000/save/{{ file }}\">{{ file }}</a></li>
                            {% endfor %}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--footer-->
        <footer id=\"main-footer\">
            <p class=\"footer-margin\">php | piscine | rush00 | project | by. slee2, sujo</p>
            <p class=\"footer-margin\">Born to code. 42Seoul...</p>
            <div class=\"git-address\">
                <img class=\"pull-left\" src=\"img/github.png\" alt=\"\">
                <p class=\"pull-left\"><span>slee2</span> : https://github.com/Lee-seungju</p>
            </div>
            <div class=\"git-address\">
                <img class=\"pull-left\" src=\"img/github.png\" alt=\"\">
                <p class=\"pull-left\"><span>sujo</span> : https://github.com/josuhee</p>
            </div>
        </footer>
    </div>
</body>
</html>

", "GameBundle::login.html.twig", "/Users/sujo/Desktop/projects/php/rush00/d04/src/GameBundle/Resources/views/login.html.twig");
    }
}
