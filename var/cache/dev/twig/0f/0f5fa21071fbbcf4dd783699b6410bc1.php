<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/dashboard.html.twig */
class __TwigTemplate_c0c84acdcb1b797ec7a2be87760cbea0 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Dashboard - MuseHub Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"mb-4\">
    <h1 class=\"h3 mb-0\">Tableau de bord</h1>
    <p class=\"text-muted\">Vue d'ensemble de la plateforme</p>
</div>

<!-- Statistiques -->
<div class=\"row g-4 mb-5\">
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card primary\">
            <div class=\"icon\">
                <i class=\"fas fa-users\"></i>
            </div>
            <h3>";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 18, $this->source); })()), "users", [], "any", false, false, false, 18), "html", null, true);
        yield "</h3>
            <p>Utilisateurs</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card success\">
            <div class=\"icon\">
                <i class=\"fas fa-paint-brush\"></i>
            </div>
            <h3>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 27, $this->source); })()), "artists", [], "any", false, false, false, 27), "html", null, true);
        yield "</h3>
            <p>Artistes</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card info\">
            <div class=\"icon\">
                <i class=\"fas fa-image\"></i>
            </div>
            <h3>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 36, $this->source); })()), "artworks", [], "any", false, false, false, 36), "html", null, true);
        yield "</h3>
            <p>Œuvres</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card warning\">
            <div class=\"icon\">
                <i class=\"fas fa-dollar-sign\"></i>
            </div>
            <h3>";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 45, $this->source); })()), "revenue", [], "any", false, false, false, 45), 2, ",", " "), "html", null, true);
        yield " €</h3>
            <p>Revenus totaux</p>
        </div>
    </div>
</div>

<!-- Modules de gestion -->
<div class=\"row\">
    <div class=\"col-12 mb-4\">
        <h2 class=\"h4 mb-3\"><i class=\"fas fa-cog me-2\"></i>Modules de gestion</h2>
    </div>
</div>

<div class=\"row g-4\">
    <!-- Module Utilisateurs -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-users\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Utilisateurs</h5>
                    <p class=\"text-muted small mb-0\">";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 68, $this->source); })()), "users", [], "any", false, false, false, 68), "html", null, true);
        yield " utilisateurs</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Œuvres -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 76
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_artworks_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-paint-brush\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Œuvres</h5>
                    <p class=\"text-muted small mb-0\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 83, $this->source); })()), "artworks", [], "any", false, false, false, 83), "html", null, true);
        yield " œuvres</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Événements -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-calendar-alt\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Événements</h5>
                    <p class=\"text-muted small mb-0\">";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 98, $this->source); })()), "events", [], "any", false, false, false, 98), "html", null, true);
        yield " événements</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Types d'événements -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 106
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_event_types_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-tags\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Types d'événements</h5>
                    <p class=\"text-muted small mb-0\">Configuration</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Marketplace -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_marketplace_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-shopping-cart\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Marketplace</h5>
                    <p class=\"text-muted small mb-0\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 128, $this->source); })()), "listings", [], "any", false, false, false, 128), "html", null, true);
        yield " annonces</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Transactions -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 136
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_transactions_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-receipt\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Transactions</h5>
                    <p class=\"text-muted small mb-0\">Consulter les dernières transactions</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Communauté -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"";
        // line 151
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_community_list");
        yield "\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-comments\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Modération Communauté</h5>
                    <p class=\"text-muted small mb-0\">";
        // line 158
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 158, $this->source); })()), "posts", [], "any", false, false, false, 158), "html", null, true);
        yield " posts</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Statistiques -->
  <div class=\"col-md-6 col-lg-4\">
       <a href=\"";
        // line 166
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_stats");
        yield "\" class=\"module-card\" style=\"text-decoration: none; display: block; background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-chart-line\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1 text-dark\">Statistiques</h5>
                    <p class=\"text-muted small mb-0\">Vue d'ensemble</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Actions rapides -->
<div class=\"row mt-5\">
    <div class=\"col-12\">
        <div class=\"card\" style=\"border-radius: 15px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);\">
            <div class=\"card-body\">
                <h5 class=\"card-title mb-4\"><i class=\"fas fa-bolt me-2\"></i>Actions rapides</h5>
                <div class=\"row g-3\">
                    <div class=\"col-md-3\">
                        <a href=\"";
        // line 188
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_artwork_new");
        yield "\" class=\"btn btn-primary w-100\">
                            <i class=\"fas fa-plus me-2\"></i>Nouvelle œuvre
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"";
        // line 193
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_list");
        yield "\" class=\"btn btn-success w-100\">
                            <i class=\"fas fa-calendar-plus me-2\"></i>Nouvel événement
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"";
        // line 198
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_list");
        yield "\" class=\"btn btn-info w-100\">
                            <i class=\"fas fa-user-plus me-2\"></i>Nouvel utilisateur
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"";
        // line 203
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_community_list");
        yield "\" class=\"btn btn-warning w-100\">
                            <i class=\"fas fa-shield-alt me-2\"></i>Modération
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/dashboard.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  359 => 203,  351 => 198,  343 => 193,  335 => 188,  310 => 166,  299 => 158,  289 => 151,  271 => 136,  260 => 128,  250 => 121,  232 => 106,  221 => 98,  211 => 91,  200 => 83,  190 => 76,  179 => 68,  169 => 61,  150 => 45,  138 => 36,  126 => 27,  114 => 18,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Dashboard - MuseHub Admin{% endblock %}

{% block body %}
<div class=\"mb-4\">
    <h1 class=\"h3 mb-0\">Tableau de bord</h1>
    <p class=\"text-muted\">Vue d'ensemble de la plateforme</p>
</div>

<!-- Statistiques -->
<div class=\"row g-4 mb-5\">
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card primary\">
            <div class=\"icon\">
                <i class=\"fas fa-users\"></i>
            </div>
            <h3>{{ stats.users }}</h3>
            <p>Utilisateurs</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card success\">
            <div class=\"icon\">
                <i class=\"fas fa-paint-brush\"></i>
            </div>
            <h3>{{ stats.artists }}</h3>
            <p>Artistes</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card info\">
            <div class=\"icon\">
                <i class=\"fas fa-image\"></i>
            </div>
            <h3>{{ stats.artworks }}</h3>
            <p>Œuvres</p>
        </div>
    </div>
    <div class=\"col-md-6 col-lg-3\">
        <div class=\"stat-card warning\">
            <div class=\"icon\">
                <i class=\"fas fa-dollar-sign\"></i>
            </div>
            <h3>{{ stats.revenue|number_format(2, ',', ' ') }} €</h3>
            <p>Revenus totaux</p>
        </div>
    </div>
</div>

<!-- Modules de gestion -->
<div class=\"row\">
    <div class=\"col-12 mb-4\">
        <h2 class=\"h4 mb-3\"><i class=\"fas fa-cog me-2\"></i>Modules de gestion</h2>
    </div>
</div>

<div class=\"row g-4\">
    <!-- Module Utilisateurs -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_users_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-users\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Utilisateurs</h5>
                    <p class=\"text-muted small mb-0\">{{ stats.users }} utilisateurs</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Œuvres -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_artworks_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-paint-brush\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Œuvres</h5>
                    <p class=\"text-muted small mb-0\">{{ stats.artworks }} œuvres</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Événements -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_events_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-calendar-alt\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Gestion Événements</h5>
                    <p class=\"text-muted small mb-0\">{{ stats.events }} événements</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Types d'événements -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_event_types_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-tags\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Types d'événements</h5>
                    <p class=\"text-muted small mb-0\">Configuration</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Marketplace -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_marketplace_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-shopping-cart\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Marketplace</h5>
                    <p class=\"text-muted small mb-0\">{{ stats.listings }} annonces</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Transactions -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_transactions_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-receipt\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Transactions</h5>
                    <p class=\"text-muted small mb-0\">Consulter les dernières transactions</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Communauté -->
    <div class=\"col-md-6 col-lg-4\">
        <a href=\"{{ path('admin_community_list') }}\" class=\"module-card\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-comments\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1\">Modération Communauté</h5>
                    <p class=\"text-muted small mb-0\">{{ stats.posts }} posts</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Module Statistiques -->
  <div class=\"col-md-6 col-lg-4\">
       <a href=\"{{ path('admin_stats') }}\" class=\"module-card\" style=\"text-decoration: none; display: block; background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);\">
            <div class=\"d-flex align-items-center\">
                <div class=\"icon-wrapper\">
                    <i class=\"fas fa-chart-line\"></i>
                </div>
                <div class=\"ms-3\">
                    <h5 class=\"mb-1 text-dark\">Statistiques</h5>
                    <p class=\"text-muted small mb-0\">Vue d'ensemble</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Actions rapides -->
<div class=\"row mt-5\">
    <div class=\"col-12\">
        <div class=\"card\" style=\"border-radius: 15px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);\">
            <div class=\"card-body\">
                <h5 class=\"card-title mb-4\"><i class=\"fas fa-bolt me-2\"></i>Actions rapides</h5>
                <div class=\"row g-3\">
                    <div class=\"col-md-3\">
                        <a href=\"{{ path('admin_artwork_new') }}\" class=\"btn btn-primary w-100\">
                            <i class=\"fas fa-plus me-2\"></i>Nouvelle œuvre
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"{{ path('admin_events_list') }}\" class=\"btn btn-success w-100\">
                            <i class=\"fas fa-calendar-plus me-2\"></i>Nouvel événement
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"{{ path('admin_users_list') }}\" class=\"btn btn-info w-100\">
                            <i class=\"fas fa-user-plus me-2\"></i>Nouvel utilisateur
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"{{ path('admin_community_list') }}\" class=\"btn btn-warning w-100\">
                            <i class=\"fas fa-shield-alt me-2\"></i>Modération
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}


", "admin/dashboard.html.twig", "C:\\xampp\\htdocs\\musehub2\\templates\\admin\\dashboard.html.twig");
    }
}
