<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_ec958b4728fff8843b572ec51766ed0cf690f191610c9a7c5adab3d8a86527ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1f13120ced62789d05cc790c02a1cb9feedd126fd866ca238ab33179c1da6401 = $this->env->getExtension("native_profiler");
        $__internal_1f13120ced62789d05cc790c02a1cb9feedd126fd866ca238ab33179c1da6401->enter($__internal_1f13120ced62789d05cc790c02a1cb9feedd126fd866ca238ab33179c1da6401_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1f13120ced62789d05cc790c02a1cb9feedd126fd866ca238ab33179c1da6401->leave($__internal_1f13120ced62789d05cc790c02a1cb9feedd126fd866ca238ab33179c1da6401_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_56a70f49ec067e9fde49d7895dd101916bf55836c87bad83b3330bb1ff7ea75d = $this->env->getExtension("native_profiler");
        $__internal_56a70f49ec067e9fde49d7895dd101916bf55836c87bad83b3330bb1ff7ea75d->enter($__internal_56a70f49ec067e9fde49d7895dd101916bf55836c87bad83b3330bb1ff7ea75d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_56a70f49ec067e9fde49d7895dd101916bf55836c87bad83b3330bb1ff7ea75d->leave($__internal_56a70f49ec067e9fde49d7895dd101916bf55836c87bad83b3330bb1ff7ea75d_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_5f1109563617acae25549b1ed71eb0f2783940835aac6f92ede6c551d7250363 = $this->env->getExtension("native_profiler");
        $__internal_5f1109563617acae25549b1ed71eb0f2783940835aac6f92ede6c551d7250363->enter($__internal_5f1109563617acae25549b1ed71eb0f2783940835aac6f92ede6c551d7250363_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_5f1109563617acae25549b1ed71eb0f2783940835aac6f92ede6c551d7250363->leave($__internal_5f1109563617acae25549b1ed71eb0f2783940835aac6f92ede6c551d7250363_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_aad8f7ddb253647d1f01130aa2ddb1c057f6e3cc7d08f62e27a096adfbee10a0 = $this->env->getExtension("native_profiler");
        $__internal_aad8f7ddb253647d1f01130aa2ddb1c057f6e3cc7d08f62e27a096adfbee10a0->enter($__internal_aad8f7ddb253647d1f01130aa2ddb1c057f6e3cc7d08f62e27a096adfbee10a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_aad8f7ddb253647d1f01130aa2ddb1c057f6e3cc7d08f62e27a096adfbee10a0->leave($__internal_aad8f7ddb253647d1f01130aa2ddb1c057f6e3cc7d08f62e27a096adfbee10a0_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
";
    }
}
