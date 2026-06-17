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

/* front/base.html.twig */
class __TwigTemplate_6d2ce04f4efe2c0c4caa51b337987bc9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --light-bg: #F0F0F0;
            --gray-color: #CACACA;
            --dark: #2c3e50;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .navbar {
            background: linear-gradient(135deg, rgba(196, 159, 255, 0.88) 0%, rgba(255, 156, 182, 0.88) 100%);
            box-shadow: 0 12px 30px rgba(196, 159, 255, 0.18);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(14px);
            position: relative;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .logo-img {
            filter: brightness(0) invert(1);
            transition: transform 0.3s;
        }
        .navbar-brand:hover .logo-img {
            transform: scale(1.1);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            background: white;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(255, 156, 182, 0.3);
        }
        .card-body {
            padding: 1.5rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-primary:hover {
            opacity: 0.9;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(196, 159, 255, 0.5);
            background: linear-gradient(135deg, #FF9CB6 0%, #7f00ff 100%);
        }
        .nav-link {
            transition: all 0.3s ease;
            border-radius: 5px;
            margin: 0 5px;
        }
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        footer {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.92) 0%, rgba(44, 62, 80, 0.82) 100%);
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 -10px 30px rgba(44, 62, 80, 0.25);
        }
        .artwork-image {
            height: 250px;
            object-fit: cover;
            width: 100%;
            border-radius: 15px 15px 0 0;
            transition: transform 0.3s;
        }
        .card:hover .artwork-image {
            transform: scale(1.05);
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
            overflow-x: hidden;
        }
    </style>
    ";
        // line 105
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 106
        yield "</head>
<body>
    <nav class=\"navbar navbar-expand-lg navbar-dark\">
        <div class=\"container\">
            <a class=\"navbar-brand d-flex align-items-center\" href=\"";
        // line 110
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">
                <img src=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/logo.png"), "html", null, true);
        yield "\" alt=\"MuseHub Logo\" class=\"logo-img me-2\" style=\"height: 40px; width: auto;\" onerror=\"this.style.display='none'; this.nextElementSibling.style.display='inline';\">
                <span style=\"display: none;\"><i class=\"fas fa-palette me-2\"></i></span>
                <span>MuseHub</span>
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto\">
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 120
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Accueil</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
        yield "\">Œuvres</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 122
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("events");
        yield "\">Événements</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 123
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("marketplace");
        yield "\">Marketplace</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 124
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("community");
        yield "\">Communauté</a></li>
                    ";
        // line 125
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 125, $this->source); })()), "user", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 126
            yield "                        ";
            if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 126, $this->source); })()), "user", [], "any", false, false, false, 126), "roles", [], "any", false, false, false, 126))) {
                // line 127
                yield "                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
                yield "\"><i class=\"fas fa-tachometer-alt me-1\"></i>Dashboard</a></li>
                        ";
            }
            // line 129
            yield "                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_profile");
            yield "\"><i class=\"fas fa-user-circle me-1\"></i>Mon profil</a></li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link position-relative\" href=\"";
            // line 131
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_messages");
            yield "\">
                                <i class=\"fas fa-envelope me-1\"></i>Messagerie
                            </a>
                        </li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
            // line 135
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
            yield "\"><i class=\"fas fa-sign-out-alt me-1\"></i>Déconnexion</a></li>
                    ";
        } else {
            // line 137
            yield "                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register");
            yield "\"><i class=\"fas fa-user-plus me-1\"></i>Inscription</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
            // line 138
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
            yield "\"><i class=\"fas fa-sign-in-alt me-1\"></i>Connexion</a></li>
                    ";
        }
        // line 140
        yield "                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class=\"container mt-3\">
            ";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 147, $this->source); })()), "flashes", ["success"], "method", false, false, false, 147));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 148
            yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-check-circle me-2\"></i>";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 153, $this->source); })()), "flashes", ["error"], "method", false, false, false, 153));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 154
            yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-exclamation-circle me-2\"></i>";
            // line 155
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 159
        yield "        </div>
        ";
        // line 160
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 161
        yield "    </main>

    <footer>
        <div class=\"container text-center\">
            <p>&copy; ";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " MuseHub. Tous droits réservés.</p>
            <p class=\"small\">Plateforme de mise en relation entre artistes, galeries et amateurs d'art</p>
        </div>
    </footer>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    ";
        // line 171
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 172
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

        yield "MuseHub - Plateforme Artistique";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 105
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

    // line 160
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

    // line 171
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
        return "front/base.html.twig";
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
        return array (  392 => 171,  370 => 160,  348 => 105,  325 => 6,  310 => 172,  308 => 171,  299 => 165,  293 => 161,  291 => 160,  288 => 159,  278 => 155,  275 => 154,  270 => 153,  260 => 149,  257 => 148,  253 => 147,  244 => 140,  239 => 138,  234 => 137,  229 => 135,  222 => 131,  216 => 129,  210 => 127,  207 => 126,  205 => 125,  201 => 124,  197 => 123,  193 => 122,  189 => 121,  185 => 120,  173 => 111,  169 => 110,  163 => 106,  161 => 105,  59 => 6,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}MuseHub - Plateforme Artistique{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\" rel=\"stylesheet\">
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --light-bg: #F0F0F0;
            --gray-color: #CACACA;
            --dark: #2c3e50;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .navbar {
            background: linear-gradient(135deg, rgba(196, 159, 255, 0.88) 0%, rgba(255, 156, 182, 0.88) 100%);
            box-shadow: 0 12px 30px rgba(196, 159, 255, 0.18);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(14px);
            position: relative;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .logo-img {
            filter: brightness(0) invert(1);
            transition: transform 0.3s;
        }
        .navbar-brand:hover .logo-img {
            transform: scale(1.1);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            background: white;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(255, 156, 182, 0.3);
        }
        .card-body {
            padding: 1.5rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-primary:hover {
            opacity: 0.9;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(196, 159, 255, 0.5);
            background: linear-gradient(135deg, #FF9CB6 0%, #7f00ff 100%);
        }
        .nav-link {
            transition: all 0.3s ease;
            border-radius: 5px;
            margin: 0 5px;
        }
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        footer {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.92) 0%, rgba(44, 62, 80, 0.82) 100%);
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 -10px 30px rgba(44, 62, 80, 0.25);
        }
        .artwork-image {
            height: 250px;
            object-fit: cover;
            width: 100%;
            border-radius: 15px 15px 0 0;
            transition: transform 0.3s;
        }
        .card:hover .artwork-image {
            transform: scale(1.05);
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, rgba(196, 159, 255, 0.12), rgba(255, 156, 182, 0.12)), #ffffff;
            overflow-x: hidden;
        }
    </style>
    {% block stylesheets %}{% endblock %}
</head>
<body>
    <nav class=\"navbar navbar-expand-lg navbar-dark\">
        <div class=\"container\">
            <a class=\"navbar-brand d-flex align-items-center\" href=\"{{ path('home') }}\">
                <img src=\"{{ asset('assets/logo.png') }}\" alt=\"MuseHub Logo\" class=\"logo-img me-2\" style=\"height: 40px; width: auto;\" onerror=\"this.style.display='none'; this.nextElementSibling.style.display='inline';\">
                <span style=\"display: none;\"><i class=\"fas fa-palette me-2\"></i></span>
                <span>MuseHub</span>
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto\">
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('home') }}\">Accueil</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('artworks') }}\">Œuvres</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('events') }}\">Événements</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('marketplace') }}\">Marketplace</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('community') }}\">Communauté</a></li>
                    {% if app.user %}
                        {% if 'ROLE_ADMIN' in app.user.roles %}
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('admin_dashboard') }}\"><i class=\"fas fa-tachometer-alt me-1\"></i>Dashboard</a></li>
                        {% endif %}
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('user_profile') }}\"><i class=\"fas fa-user-circle me-1\"></i>Mon profil</a></li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link position-relative\" href=\"{{ path('app_messages') }}\">
                                <i class=\"fas fa-envelope me-1\"></i>Messagerie
                            </a>
                        </li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('logout') }}\"><i class=\"fas fa-sign-out-alt me-1\"></i>Déconnexion</a></li>
                    {% else %}
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('register') }}\"><i class=\"fas fa-user-plus me-1\"></i>Inscription</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('login') }}\"><i class=\"fas fa-sign-in-alt me-1\"></i>Connexion</a></li>
                    {% endif %}
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class=\"container mt-3\">
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-check-circle me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}
            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fas fa-exclamation-circle me-2\"></i>{{ message }}
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                </div>
            {% endfor %}
        </div>
        {% block body %}{% endblock %}
    </main>

    <footer>
        <div class=\"container text-center\">
            <p>&copy; {{ \"now\"|date(\"Y\") }} MuseHub. Tous droits réservés.</p>
            <p class=\"small\">Plateforme de mise en relation entre artistes, galeries et amateurs d'art</p>
        </div>
    </footer>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>


", "front/base.html.twig", "C:\\xampp\\htdocs\\Musehub3\\templates\\front\\base.html.twig");
    }
}
