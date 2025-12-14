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

/* front/events.html.twig */
class __TwigTemplate_74e9267cccf2cc7de24119baedba4781 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "front/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/events.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/events.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 1);
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

        yield "Événements - MuseHub";
        
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
        yield "<div class=\"container my-5\">
    <div class=\"text-center mb-5\">
        <h1 class=\"display-4 fw-bold mb-3\">Événements Artistiques</h1>
        <p class=\"lead text-muted\">Participez aux événements de la communauté</p>
    </div>

    <div class=\"row g-4\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 13, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 14
            yield "        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card h-100\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 17), "html", null, true);
            yield "</h5>
                    <div class=\"mb-3\">
                        <p class=\"mb-1\">
                            <i class=\"fas fa-calendar text-primary me-2\"></i>
                            <strong>";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "dateTime", [], "any", false, false, false, 21), "d/m/Y"), "html", null, true);
            yield "</strong>
                        </p>
                        <p class=\"mb-1\">
                            <i class=\"fas fa-clock text-primary me-2\"></i>
                            ";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "dateTime", [], "any", false, false, false, 25), "H:i"), "html", null, true);
            yield "
                        </p>
                        <p class=\"mb-1\">
                            <i class=\"fas fa-map-marker-alt text-primary me-2\"></i>
                            ";
            // line 29
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 29) == "online")) {
                // line 30
                yield "                                <span class=\"badge bg-success\">En ligne</span>
                            ";
            } else {
                // line 32
                yield "                                <span class=\"badge bg-info\">Sur place</span>
                            ";
            }
            // line 34
            yield "                        </p>
                        ";
            // line 35
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 36
                yield "                        <p class=\"mb-1\">
                            <i class=\"fas fa-tag text-primary me-2\"></i>
                            <span class=\"badge bg-secondary text-white\" 
                                  data-bs-toggle=\"tooltip\" 
                                  data-bs-html=\"true\"
                                  data-bs-placement=\"top\" 
                                  title=\"<strong>";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 42), "name", [], "any", false, false, false, 42), "html", null, true);
                yield "</strong><br>
                                         ";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 43), "description", [], "any", false, false, false, 43), "html", null, true);
                yield "<br>
                                         <hr style='margin: 5px 0; border-color: rgba(255,255,255,0.3);'>
                                         💰 ";
                // line 45
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 45), "requiresPayment", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Payant") : ("Gratuit"));
                yield "<br>
                                         ⏱️ Durée: ";
                // line 46
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 46), "typicalDurationHours", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 46), "typicalDurationHours", [], "any", false, false, false, 46) . "h"), "html", null, true)) : ("Non définie"));
                yield "<br>
                                         👥 Capacité: ";
                // line 47
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 47), "capacityType", [], "any", false, false, false, 47) == "unlimited")) {
                    yield "Illimitée";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 47), "capacityType", [], "any", false, false, false, 47) == "limited")) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 47), "defaultMaxParticipants", [], "any", false, false, false, 47), "html", null, true);
                    yield " places max";
                } else {
                    yield "Sur invitation";
                }
                yield "\">
                                ";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventType", [], "any", false, false, false, 48), "name", [], "any", false, false, false, 48), "html", null, true);
                yield "
                            </span>
                        </p>
                        ";
            }
            // line 52
            yield "                    </div>
                    ";
            // line 53
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                yield "                        <p class=\"card-text\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 54), 0, 120), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 54)) > 120)) {
                    yield "...";
                }
                yield "</p>
                    ";
            }
            // line 56
            yield "                    <div class=\"mt-3 row g-2\">
                        <div class=\"col-6\">
                            ";
            // line 58
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "user", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 59
                yield "                                ";
                $context["isRegistered"] = CoreExtension::getAttribute($this->env, $this->source, ($context["participationMap"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "uuid", [], "any", false, false, false, 59), [], "array", true, true, false, 59);
                // line 60
                yield "                                <form method=\"POST\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((((($tmp = (isset($context["isRegistered"]) || array_key_exists("isRegistered", $context) ? $context["isRegistered"] : (function () { throw new RuntimeError('Variable "isRegistered" does not exist.', 60, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("web_events_unsubscribe") : ("web_events_subscribe")), ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 60)]), "html", null, true);
                yield "\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(((((($tmp = (isset($context["isRegistered"]) || array_key_exists("isRegistered", $context) ? $context["isRegistered"] : (function () { throw new RuntimeError('Variable "isRegistered" does not exist.', 61, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("unsubscribe_event_") : ("subscribe_event_")) . CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 61))), "html", null, true);
                yield "\">
                                    <button type=\"submit\" class=\"btn btn-";
                // line 62
                yield (((($tmp = (isset($context["isRegistered"]) || array_key_exists("isRegistered", $context) ? $context["isRegistered"] : (function () { throw new RuntimeError('Variable "isRegistered" does not exist.', 62, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("secondary") : ("primary"));
                yield " btn-sm w-100\">
                                        ";
                // line 63
                if ((($tmp = (isset($context["isRegistered"]) || array_key_exists("isRegistered", $context) ? $context["isRegistered"] : (function () { throw new RuntimeError('Variable "isRegistered" does not exist.', 63, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 64
                    yield "                                            <i class=\"fas fa-user-check me-1\"></i>Se désinscrire
                                        ";
                } else {
                    // line 66
                    yield "                                            <i class=\"fas fa-user-plus me-1\"></i>S'inscrire
                                        ";
                }
                // line 68
                yield "                                    </button>
                                </form>
                            ";
            } else {
                // line 71
                yield "                                <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
                yield "\" class=\"btn btn-outline-primary btn-sm w-100\">Se connecter pour s'inscrire</a>
                            ";
            }
            // line 73
            yield "                        </div>
                        <div class=\"col-3\">
                            <a href=\"/api/events/";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 75), "html", null, true);
            yield "/ics\" class=\"btn btn-outline-secondary btn-sm w-100\" title=\"Télécharger .ics\">
                                <i class=\"fas fa-calendar-plus me-1\"></i>.ics
                            </a>
                        </div>
                        <div class=\"col-3\">
                            ";
            // line 80
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "latitude", [], "any", false, false, false, 80) && CoreExtension::getAttribute($this->env, $this->source, $context["event"], "longitude", [], "any", false, false, false, 80))) {
                // line 81
                yield "                                <a href=\"https://maps.google.com/?q=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "latitude", [], "any", false, false, false, 81), "html", null, true);
                yield ",";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "longitude", [], "any", false, false, false, 81), "html", null, true);
                yield "\" 
                                   class=\"btn btn-outline-info btn-sm w-100\" 
                                   title=\"Voir sur Google Maps\"
                                   target=\"_blank\">
                                    <i class=\"fas fa-map-marker-alt me-1\"></i>Carte
                                </a>
                            ";
            } else {
                // line 88
                yield "                                <button class=\"btn btn-outline-secondary btn-sm w-100\" disabled title=\"Pas de coordonnées GPS\">
                                    <i class=\"fas fa-map-marker-alt me-1\"></i>Carte
                                </button>
                            ";
            }
            // line 92
            yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
            $context['_iterated'] = true;
        }
        // line 97
        if (!$context['_iterated']) {
            // line 98
            yield "        <div class=\"col-12\">
            <div class=\"alert alert-info text-center\">
                <i class=\"fas fa-info-circle me-2\"></i>Aucun événement à venir pour le moment.
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        yield "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 108
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

        // line 109
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Activer les tooltips Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
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
        return "front/events.html.twig";
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
        return array (  337 => 109,  324 => 108,  311 => 104,  300 => 98,  298 => 97,  289 => 92,  283 => 88,  270 => 81,  268 => 80,  260 => 75,  256 => 73,  250 => 71,  245 => 68,  241 => 66,  237 => 64,  235 => 63,  231 => 62,  227 => 61,  222 => 60,  219 => 59,  217 => 58,  213 => 56,  204 => 54,  202 => 53,  199 => 52,  192 => 48,  181 => 47,  177 => 46,  173 => 45,  168 => 43,  164 => 42,  156 => 36,  154 => 35,  151 => 34,  147 => 32,  143 => 30,  141 => 29,  134 => 25,  127 => 21,  120 => 17,  115 => 14,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Événements - MuseHub{% endblock %}

{% block body %}
<div class=\"container my-5\">
    <div class=\"text-center mb-5\">
        <h1 class=\"display-4 fw-bold mb-3\">Événements Artistiques</h1>
        <p class=\"lead text-muted\">Participez aux événements de la communauté</p>
    </div>

    <div class=\"row g-4\">
        {% for event in events %}
        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card h-100\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{{ event.title }}</h5>
                    <div class=\"mb-3\">
                        <p class=\"mb-1\">
                            <i class=\"fas fa-calendar text-primary me-2\"></i>
                            <strong>{{ event.dateTime|date('d/m/Y') }}</strong>
                        </p>
                        <p class=\"mb-1\">
                            <i class=\"fas fa-clock text-primary me-2\"></i>
                            {{ event.dateTime|date('H:i') }}
                        </p>
                        <p class=\"mb-1\">
                            <i class=\"fas fa-map-marker-alt text-primary me-2\"></i>
                            {% if event.location == 'online' %}
                                <span class=\"badge bg-success\">En ligne</span>
                            {% else %}
                                <span class=\"badge bg-info\">Sur place</span>
                            {% endif %}
                        </p>
                        {% if event.eventType %}
                        <p class=\"mb-1\">
                            <i class=\"fas fa-tag text-primary me-2\"></i>
                            <span class=\"badge bg-secondary text-white\" 
                                  data-bs-toggle=\"tooltip\" 
                                  data-bs-html=\"true\"
                                  data-bs-placement=\"top\" 
                                  title=\"<strong>{{ event.eventType.name }}</strong><br>
                                         {{ event.eventType.description }}<br>
                                         <hr style='margin: 5px 0; border-color: rgba(255,255,255,0.3);'>
                                         💰 {{ event.eventType.requiresPayment ? 'Payant' : 'Gratuit' }}<br>
                                         ⏱️ Durée: {{ event.eventType.typicalDurationHours ? event.eventType.typicalDurationHours ~ 'h' : 'Non définie' }}<br>
                                         👥 Capacité: {% if event.eventType.capacityType == 'unlimited' %}Illimitée{% elseif event.eventType.capacityType == 'limited' %}{{ event.eventType.defaultMaxParticipants }} places max{% else %}Sur invitation{% endif %}\">
                                {{ event.eventType.name }}
                            </span>
                        </p>
                        {% endif %}
                    </div>
                    {% if event.description %}
                        <p class=\"card-text\">{{ event.description|slice(0, 120) }}{% if event.description|length > 120 %}...{% endif %}</p>
                    {% endif %}
                    <div class=\"mt-3 row g-2\">
                        <div class=\"col-6\">
                            {% if app.user %}
                                {% set isRegistered = participationMap[event.uuid] is defined %}
                                <form method=\"POST\" action=\"{{ path(isRegistered ? 'web_events_unsubscribe' : 'web_events_subscribe', {id: event.id}) }}\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token((isRegistered ? 'unsubscribe_event_' : 'subscribe_event_') ~ event.id) }}\">
                                    <button type=\"submit\" class=\"btn btn-{{ isRegistered ? 'secondary' : 'primary' }} btn-sm w-100\">
                                        {% if isRegistered %}
                                            <i class=\"fas fa-user-check me-1\"></i>Se désinscrire
                                        {% else %}
                                            <i class=\"fas fa-user-plus me-1\"></i>S'inscrire
                                        {% endif %}
                                    </button>
                                </form>
                            {% else %}
                                <a href=\"{{ path('login') }}\" class=\"btn btn-outline-primary btn-sm w-100\">Se connecter pour s'inscrire</a>
                            {% endif %}
                        </div>
                        <div class=\"col-3\">
                            <a href=\"/api/events/{{ event.id }}/ics\" class=\"btn btn-outline-secondary btn-sm w-100\" title=\"Télécharger .ics\">
                                <i class=\"fas fa-calendar-plus me-1\"></i>.ics
                            </a>
                        </div>
                        <div class=\"col-3\">
                            {% if event.latitude and event.longitude %}
                                <a href=\"https://maps.google.com/?q={{ event.latitude }},{{ event.longitude }}\" 
                                   class=\"btn btn-outline-info btn-sm w-100\" 
                                   title=\"Voir sur Google Maps\"
                                   target=\"_blank\">
                                    <i class=\"fas fa-map-marker-alt me-1\"></i>Carte
                                </a>
                            {% else %}
                                <button class=\"btn btn-outline-secondary btn-sm w-100\" disabled title=\"Pas de coordonnées GPS\">
                                    <i class=\"fas fa-map-marker-alt me-1\"></i>Carte
                                </button>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {% else %}
        <div class=\"col-12\">
            <div class=\"alert alert-info text-center\">
                <i class=\"fas fa-info-circle me-2\"></i>Aucun événement à venir pour le moment.
            </div>
        </div>
        {% endfor %}
    </div>
</div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Activer les tooltips Bootstrap
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
{% endblock %}

", "front/events.html.twig", "C:\\xampp\\htdocs\\musehub2\\templates\\front\\events.html.twig");
    }
}
