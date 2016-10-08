<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_2aa9d6f300aa0e003c0c88e1baf75a75fca776b3ede9ec873120741a007d4fa0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_58db91285c2ee0bc514a132fa272e449995efd4889c3fb31dc95669ac3507402 = $this->env->getExtension("native_profiler");
        $__internal_58db91285c2ee0bc514a132fa272e449995efd4889c3fb31dc95669ac3507402->enter($__internal_58db91285c2ee0bc514a132fa272e449995efd4889c3fb31dc95669ac3507402_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_58db91285c2ee0bc514a132fa272e449995efd4889c3fb31dc95669ac3507402->leave($__internal_58db91285c2ee0bc514a132fa272e449995efd4889c3fb31dc95669ac3507402_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_f174c378563dd0106dcb9b74163c55d618ae1b85f471cb148bebaed5227661f0 = $this->env->getExtension("native_profiler");
        $__internal_f174c378563dd0106dcb9b74163c55d618ae1b85f471cb148bebaed5227661f0->enter($__internal_f174c378563dd0106dcb9b74163c55d618ae1b85f471cb148bebaed5227661f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_f174c378563dd0106dcb9b74163c55d618ae1b85f471cb148bebaed5227661f0->leave($__internal_f174c378563dd0106dcb9b74163c55d618ae1b85f471cb148bebaed5227661f0_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_7004825e43556c04e6c8f2ce8ee53f978527b7cfd325434e9fb9ad148f07478d = $this->env->getExtension("native_profiler");
        $__internal_7004825e43556c04e6c8f2ce8ee53f978527b7cfd325434e9fb9ad148f07478d->enter($__internal_7004825e43556c04e6c8f2ce8ee53f978527b7cfd325434e9fb9ad148f07478d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_7004825e43556c04e6c8f2ce8ee53f978527b7cfd325434e9fb9ad148f07478d->leave($__internal_7004825e43556c04e6c8f2ce8ee53f978527b7cfd325434e9fb9ad148f07478d_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_95f0d1597337dec7754b31ce556094611ffe745aec5cdc6795086699aac565c0 = $this->env->getExtension("native_profiler");
        $__internal_95f0d1597337dec7754b31ce556094611ffe745aec5cdc6795086699aac565c0->enter($__internal_95f0d1597337dec7754b31ce556094611ffe745aec5cdc6795086699aac565c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_95f0d1597337dec7754b31ce556094611ffe745aec5cdc6795086699aac565c0->leave($__internal_95f0d1597337dec7754b31ce556094611ffe745aec5cdc6795086699aac565c0_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
";
    }
}
