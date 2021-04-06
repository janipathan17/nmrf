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

/* themes/custom/nmrf/templates/paragraph--accordion.html.twig */
class __TwigTemplate_e4a350bb01b123b85020175ad5962c5c680fe627033601e14a59528cb1bbbe9d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'paragraph' => [$this, 'block_paragraph'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 42, "block" => 50];
        $filters = ["clean_class" => 45, "escape" => 51, "replace" => 54, "lower" => 54, "trim" => 54, "striptags" => 54, "render" => 54];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['clean_class', 'escape', 'replace', 'lower', 'trim', 'striptags', 'render'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 41
        echo "  ";
        // line 42
        $context["classes"] = [0 => "paragraph", 1 => "card", 2 => ("paragraph--type--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 45
($context["paragraph"] ?? null), "bundle", [])))), 3 => ((        // line 46
($context["view_mode"] ?? null)) ? (("paragraph--view-mode--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null))))) : ("")), 4 => (( !$this->getAttribute(        // line 47
($context["paragraph"] ?? null), "isPublished", [], "method")) ? ("paragraph--unpublished") : (""))];
        // line 50
        echo "  ";
        $this->displayBlock('paragraph', $context, $blocks);
        // line 66
        echo "  ";
    }

    // line 50
    public function block_paragraph($context, array $blocks = [])
    {
        // line 51
        echo "    <div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
      ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 64
        echo "    </div>
  ";
    }

    // line 52
    public function block_content($context, array $blocks = [])
    {
        // line 53
        echo "        <div class=\"card-header\">
          <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#id";
        // line 54
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_trim_filter(strip_tags($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_header", [])))))), [" " => "", "." => ""]), "html", null, true);
        echo "\">
            ";
        // line 55
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_header", [])), "html", null, true);
        echo "
          </button>
        </div>
        <div id=\"id";
        // line 58
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_trim_filter(strip_tags($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_header", [])))))), [" " => "", "." => ""]), "html", null, true);
        echo "\" class=\"collapse\" data-parent=\"#accordion\">
          <div class=\"card-body\">
            ";
        // line 60
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_body", [])), "html", null, true);
        echo "
          </div>
        </div>
      ";
    }

    public function getTemplateName()
    {
        return "themes/custom/nmrf/templates/paragraph--accordion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 60,  102 => 58,  96 => 55,  92 => 54,  89 => 53,  86 => 52,  81 => 64,  79 => 52,  74 => 51,  71 => 50,  67 => 66,  64 => 50,  62 => 47,  61 => 46,  60 => 45,  59 => 42,  57 => 41,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
  /**
   * @file
   * Default theme implementation to display a paragraph.
   *
   * Available variables:
   * - paragraph: Full paragraph entity.
   *   Only method names starting with \"get\", \"has\", or \"is\" and a few common
   *   methods such as \"id\", \"label\", and \"bundle\" are available. For example:
   *   - paragraph.getCreatedTime() will return the paragraph creation timestamp.
   *   - paragraph.id(): The paragraph ID.
   *   - paragraph.bundle(): The type of the paragraph, for example, \"image\" or \"text\".
   *   - paragraph.getOwnerId(): The user ID of the paragraph author.
   *   See Drupal\\paragraphs\\Entity\\Paragraph for a full list of public properties
   *   and methods for the paragraph object.
   * - content: All paragraph items. Use {{ content }} to print them all,
   *   or print a subset such as {{ content.field_example }}. Use
   *   {{ content|without('field_example') }} to temporarily suppress the printing
   *   of a given child element.
   * - attributes: HTML attributes for the containing element.
   *   The attributes.class element may contain one or more of the following
   *   classes:
   *   - paragraphs: The current template type (also known as a \"theming hook\").
   *   - paragraphs--type-[type]: The current paragraphs type. For example, if the paragraph is an
   *     \"Image\" it would result in \"paragraphs--type--image\". Note that the machine
   *     name will often be in a short form of the human readable label.
   *   - paragraphs--view-mode--[view_mode]: The View Mode of the paragraph; for example, a
   *     preview would result in: \"paragraphs--view-mode--preview\", and
   *     default: \"paragraphs--view-mode--default\".
   * - view_mode: View mode; for example, \"preview\" or \"full\".
   * - logged_in: Flag for authenticated user status. Will be true when the
   *   current user is a logged-in member.
   * - is_admin: Flag for admin user status. Will be true when the current user
   *   is an administrator.
   *
   * @see template_preprocess_paragraph()
   *
   * @ingroup themeable
   */
  #}
  {%
    set classes = [
      'paragraph',
      'card',
      'paragraph--type--' ~ paragraph.bundle|clean_class,
      view_mode ? 'paragraph--view-mode--' ~ view_mode|clean_class,
      not paragraph.isPublished() ? 'paragraph--unpublished'
    ]
  %}
  {% block paragraph %}
    <div{{ attributes.addClass(classes) }}>
      {% block content %}
        <div class=\"card-header\">
          <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#id{{ content.field_header|render|striptags|trim|lower|replace({' ':'', '.':''}) }}\">
            {{ content.field_header }}
          </button>
        </div>
        <div id=\"id{{ content.field_header|render|striptags|trim|lower|replace({' ':'', '.':''}) }}\" class=\"collapse\" data-parent=\"#accordion\">
          <div class=\"card-body\">
            {{ content.field_body }}
          </div>
        </div>
      {% endblock %}
    </div>
  {% endblock paragraph %}
  ", "themes/custom/nmrf/templates/paragraph--accordion.html.twig", "/var/www/html/nmrf/themes/custom/nmrf/templates/paragraph--accordion.html.twig");
    }
}
