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

/* admin/base.html.twig */
class __TwigTemplate_880be48cc90601f22a3d95501d32de35 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield " - MuseHub</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --dark: #2c3e50;
            --success: #22c55e;
            --danger: #f87171;
            --warning: #fbbf24;
            --info: #38bdf8;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(196, 159, 255, 0.95) 0%, rgba(255, 156, 182, 0.95) 100%);
            color: white;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
            padding: 20px 0;
            box-shadow: 10px 0 30px rgba(196, 159, 255, 0.15);
            backdrop-filter: blur(16px);
        }
        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin-bottom: 20px;
        }
        .sidebar .logo h4 {
            margin: 0;
            font-weight: bold;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background: transparent;
        }
        .topbar {
            background: rgba(255, 255, 255, 0.9);
            padding: 15px 30px;
            margin: -30px -30px 30px -30px;
            box-shadow: 0 15px 30px rgba(196, 159, 255, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.85) 100%);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 4px solid;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        .stat-card.primary { border-left-color: var(--primary-color); }
        .stat-card.success { border-left-color: var(--success); }
        .stat-card.danger { border-left-color: var(--danger); }
        .stat-card.warning { border-left-color: var(--warning); }
        .stat-card.info { border-left-color: var(--info); }
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        .stat-card.primary .icon { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); }
        .stat-card.success .icon { background: linear-gradient(135deg, var(--success), var(--secondary-color)); }
        .stat-card.danger .icon { background: linear-gradient(135deg, var(--danger), var(--secondary-color)); }
        .stat-card.warning .icon { background: linear-gradient(135deg, var(--warning), var(--secondary-color)); }
        .stat-card.info .icon { background: linear-gradient(135deg, var(--info), var(--secondary-color)); }
        .stat-card h3 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }
        .stat-card p {
            color: #6b7280;
            margin: 5px 0 0 0;
        }
        .module-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.9));
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
            margin-bottom: 20px;
        }
        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            color: inherit;
            text-decoration: none;
        }
        .module-card .icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 12px 20px rgba(196, 159, 255, 0.4);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(196, 159, 255, 0.35);
        }
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-color: transparent;
            color: white;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(196, 159, 255, 0.25);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background: linear-gradient(135deg, rgba(196, 159, 255, 0.2) 0%, rgba(255, 156, 182, 0.15) 100%);
        }
        .table tbody tr {
            transition: background-color 0.2s;
        }
        .table tbody tr:hover {
            background-color: rgba(196, 159, 255, 0.08);
        }
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            background: rgba(196, 159, 255, 0.15);
            color: var(--dark);
        }
    </style>
    ";
        // line 202
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 203
        yield "</head>
<body>
    <div class=\"sidebar\">
        <div class=\"logo\">
            <h4><i class=\"fas fa-palette me-2\"></i>MuseHub Admin</h4>
        </div>
        <nav class=\"nav flex-column\">
            <a class=\"nav-link\" href=\"";
        // line 210
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">
                <i class=\"fas fa-tachometer-alt\"></i> Dashboard
            </a>
            <a class=\"nav-link\" href=\"";
        // line 213
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_artworks_list");
        yield "\">
                <i class=\"fas fa-palette\"></i> Artworks
            </a>
            <a class=\"nav-link\" href=\"";
        // line 216
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_community_list");
        yield "\">
                <i class=\"fas fa-comments\"></i> Communauté
            </a>
            <a class=\"nav-link\" href=\"";
        // line 219
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_marketplace_list");
        yield "\">
                <i class=\"fas fa-store\"></i> Marketplace
            </a>
            <a class=\"nav-link\" href=\"";
        // line 222
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_list");
        yield "\">
                <i class=\"fas fa-users\"></i> Users
            </a>
            <a class=\"nav-link\" href=\"";
        // line 225
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_list");
        yield "\">
                <i class=\"fas fa-calendar\"></i> Events
            </a>
            <hr style=\"border-color: rgba(255,255,255,0.2); margin: 15px 0;\">
            <a class=\"nav-link\" href=\"";
        // line 229
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">
                <i class=\"fas fa-home\"></i> Retour au site
            </a>
            <a class=\"nav-link\" href=\"";
        // line 232
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
        yield "\">
                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
            </a>
        </nav>
    </div>

    <div class=\"main-content\">
        <div class=\"topbar\">
            <div>
                <h5 class=\"mb-0\">Bienvenue, ";
        // line 241
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 241, $this->source); })()), "user", [], "any", false, false, false, 241)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 241, $this->source); })()), "user", [], "any", false, false, false, 241), "username", [], "any", false, false, false, 241), "html", null, true)) : ("Admin"));
        yield "</h5>
                <small class=\"text-muted\">Dashboard Administrateur</small>
            </div>
            <div>
                <span class=\"badge bg-success\">En ligne</span>
            </div>
        </div>

        <!-- Flash Messages -->
        ";
        // line 250
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 250, $this->source); })()), "flashes", ["success"], "method", false, false, false, 250));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 251
            yield "            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-check-circle me-2\"></i>";
            // line 252
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 256
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 256, $this->source); })()), "flashes", ["error"], "method", false, false, false, 256));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 257
            yield "            <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-exclamation-circle me-2\"></i>";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 262, $this->source); })()), "flashes", ["warning"], "method", false, false, false, 262));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 263
            yield "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-exclamation-triangle me-2\"></i>";
            // line 264
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 268
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 268, $this->source); })()), "flashes", ["info"], "method", false, false, false, 268));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 269
            yield "            <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-info-circle me-2\"></i>";
            // line 270
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 274
        yield "
        ";
        // line 275
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 276
        yield "    </div>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    ";
        // line 279
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 280
        yield "</body>
</html>


";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "Dashboard Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 202
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 275
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 279
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/base.html.twig";
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
        return array (  501 => 279,  479 => 275,  457 => 202,  434 => 6,  419 => 280,  417 => 279,  412 => 276,  410 => 275,  407 => 274,  397 => 270,  394 => 269,  389 => 268,  379 => 264,  376 => 263,  371 => 262,  361 => 258,  358 => 257,  353 => 256,  343 => 252,  340 => 251,  336 => 250,  324 => 241,  312 => 232,  306 => 229,  299 => 225,  293 => 222,  287 => 219,  281 => 216,  275 => 213,  269 => 210,  260 => 203,  258 => 202,  59 => 6,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Dashboard Admin{% endblock %} - MuseHub</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --dark: #2c3e50;
            --success: #22c55e;
            --danger: #f87171;
            --warning: #fbbf24;
            --info: #38bdf8;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(196, 159, 255, 0.95) 0%, rgba(255, 156, 182, 0.95) 100%);
            color: white;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
            padding: 20px 0;
            box-shadow: 10px 0 30px rgba(196, 159, 255, 0.15);
            backdrop-filter: blur(16px);
        }
        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin-bottom: 20px;
        }
        .sidebar .logo h4 {
            margin: 0;
            font-weight: bold;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background: transparent;
        }
        .topbar {
            background: rgba(255, 255, 255, 0.9);
            padding: 15px 30px;
            margin: -30px -30px 30px -30px;
            box-shadow: 0 15px 30px rgba(196, 159, 255, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.85) 100%);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 4px solid;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        .stat-card.primary { border-left-color: var(--primary-color); }
        .stat-card.success { border-left-color: var(--success); }
        .stat-card.danger { border-left-color: var(--danger); }
        .stat-card.warning { border-left-color: var(--warning); }
        .stat-card.info { border-left-color: var(--info); }
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        .stat-card.primary .icon { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); }
        .stat-card.success .icon { background: linear-gradient(135deg, var(--success), var(--secondary-color)); }
        .stat-card.danger .icon { background: linear-gradient(135deg, var(--danger), var(--secondary-color)); }
        .stat-card.warning .icon { background: linear-gradient(135deg, var(--warning), var(--secondary-color)); }
        .stat-card.info .icon { background: linear-gradient(135deg, var(--info), var(--secondary-color)); }
        .stat-card h3 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }
        .stat-card p {
            color: #6b7280;
            margin: 5px 0 0 0;
        }
        .module-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.9));
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
            margin-bottom: 20px;
        }
        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            color: inherit;
            text-decoration: none;
        }
        .module-card .icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 12px 20px rgba(196, 159, 255, 0.4);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(196, 159, 255, 0.35);
        }
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-color: transparent;
            color: white;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(196, 159, 255, 0.25);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background: linear-gradient(135deg, rgba(196, 159, 255, 0.2) 0%, rgba(255, 156, 182, 0.15) 100%);
        }
        .table tbody tr {
            transition: background-color 0.2s;
        }
        .table tbody tr:hover {
            background-color: rgba(196, 159, 255, 0.08);
        }
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            background: rgba(196, 159, 255, 0.15);
            color: var(--dark);
        }
    </style>
    {% block stylesheets %}{% endblock %}
</head>
<body>
    <div class=\"sidebar\">
        <div class=\"logo\">
            <h4><i class=\"fas fa-palette me-2\"></i>MuseHub Admin</h4>
        </div>
        <nav class=\"nav flex-column\">
            <a class=\"nav-link\" href=\"{{ path('admin_dashboard') }}\">
                <i class=\"fas fa-tachometer-alt\"></i> Dashboard
            </a>
            <a class=\"nav-link\" href=\"{{ path('admin_artworks_list') }}\">
                <i class=\"fas fa-palette\"></i> Artworks
            </a>
            <a class=\"nav-link\" href=\"{{ path('admin_community_list') }}\">
                <i class=\"fas fa-comments\"></i> Communauté
            </a>
            <a class=\"nav-link\" href=\"{{ path('admin_marketplace_list') }}\">
                <i class=\"fas fa-store\"></i> Marketplace
            </a>
            <a class=\"nav-link\" href=\"{{ path('admin_users_list') }}\">
                <i class=\"fas fa-users\"></i> Users
            </a>
            <a class=\"nav-link\" href=\"{{ path('admin_events_list') }}\">
                <i class=\"fas fa-calendar\"></i> Events
            </a>
            <hr style=\"border-color: rgba(255,255,255,0.2); margin: 15px 0;\">
            <a class=\"nav-link\" href=\"{{ path('home') }}\">
                <i class=\"fas fa-home\"></i> Retour au site
            </a>
            <a class=\"nav-link\" href=\"{{ path('logout') }}\">
                <i class=\"fas fa-sign-out-alt\"></i> Déconnexion
            </a>
        </nav>
    </div>

    <div class=\"main-content\">
        <div class=\"topbar\">
            <div>
                <h5 class=\"mb-0\">Bienvenue, {{ app.user ? app.user.username : 'Admin' }}</h5>
                <small class=\"text-muted\">Dashboard Administrateur</small>
            </div>
            <div>
                <span class=\"badge bg-success\">En ligne</span>
            </div>
        </div>

        <!-- Flash Messages -->
        {% for message in app.flashes('success') %}
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-check-circle me-2\"></i>{{ message }}
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        {% endfor %}
        {% for message in app.flashes('error') %}
            <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-exclamation-circle me-2\"></i>{{ message }}
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        {% endfor %}
        {% for message in app.flashes('warning') %}
            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-exclamation-triangle me-2\"></i>{{ message }}
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        {% endfor %}
        {% for message in app.flashes('info') %}
            <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\" style=\"border-radius: 10px;\">
                <i class=\"fas fa-info-circle me-2\"></i>{{ message }}
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            </div>
        {% endfor %}

        {% block body %}{% endblock %}
    </div>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>


", "admin/base.html.twig", "C:\\xampp\\htdocs\\Musehub3\\templates\\admin\\base.html.twig");
    }
}
