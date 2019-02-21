<?php

/* base.html.twig */
class __TwigTemplate_7ddf0c29561a6001d324e5adb98306056f9e0d08a1d40e378e28f4d544aed030 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
    ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "</body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
    }

    // line 10
    public function block_body($context, array $blocks = [])
    {
        // line 11
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  51 => 10,  46 => 7,  41 => 12,  39 => 10,  33 => 7,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>{% block title %}{% endblock %}</title>
</head>
<body>
    {% block body %}
    {% endblock %}
</body>
</html>", "base.html.twig", "C:\\wamp\\www\\develop\\templates\\base.html.twig");
    }
}
