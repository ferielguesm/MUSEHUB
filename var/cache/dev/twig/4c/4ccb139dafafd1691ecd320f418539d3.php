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

/* front/home.html.twig */
class __TwigTemplate_109cc43d260bdfe390291bc49fbccd14 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/home.html.twig"));

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

        yield "Accueil - MuseHub";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --light-bg: #F0F0F0;
            --gray-color: #CACACA;
        }
        
        body {
            position: relative;
            overflow-x: hidden;
        }
        
        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }
        
        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: -3rem;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 100px 20px 80px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .hero-content h1 {
            font-size: 4.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 15px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
            line-height: 1.2;
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-content .hero-description {
            font-size: 1.3rem;
            line-height: 1.8;
            text-shadow: 1px 1px 8px rgba(0,0,0,0.3);
            margin-bottom: 3rem;
            animation: fadeInUp 1.2s ease-out;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1.4s ease-out;
        }
        
        .hero-btn {
            padding: 18px 45px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        
        .hero-btn-primary {
            background: linear-gradient(135deg, #FF9CB6 0%, #FF6B9D 100%);
            color: white;
        }
        
        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 156, 182, 0.5);
        }
        
        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.95);
            color: #7f00ff;
        }
        
        .hero-btn-secondary:hover {
            background: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }
        
        /* Gallery Section */
        .gallery-section {
            background: white;
            padding: 100px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 50%, #FFD0E6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(196, 159, 255, 0.2);
            transition: all 0.4s ease;
            cursor: pointer;
            background: white;
        }
        
        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255, 156, 182, 0.35);
        }
        
        .gallery-item img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-item-info {
            padding: 25px;
            background: white;
        }
        .gallery-item-info .gallery-item-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 0.95rem;
            color: #666;
        }
        .gallery-item-price {
            font-weight: 700;
            color: #7f00ff;
        }
        .gallery-item-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .gallery-item-actions .btn {
            flex: 1;
            border-radius: 999px;
            font-weight: 600;
        }
        .gallery-item-actions .btn-outline-primary {
            border: 2px solid #7f00ff;
            color: #7f00ff;
        }
        .gallery-item-actions .btn-outline-primary:hover {
            background: #7f00ff;
            color: white;
        }
        .gallery-item-actions .btn-gradient {
            background: linear-gradient(135deg, #FF9CB6 0%, #7f00ff 100%);
            color: white;
            border: none;
            box-shadow: 0 8px 20px rgba(196, 159, 255, 0.25);
        }
        .gallery-item-actions .btn-gradient:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .gallery-item-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .gallery-item-artist {
            font-size: 0.95rem;
            color: #7f00ff;
            font-weight: 500;
        }
        
        /* Content Sections */
        .content-section {
            background: #F0F0F0;
            padding: 80px 0;
        }
        
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #333;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 100%);
            border-radius: 2px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s ease;
            overflow: hidden;
            background: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 156, 182, 0.25);
        }
        
        .artwork-image {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(196, 159, 255, 0.4);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content .hero-description {
                font-size: 1.1rem;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .hero-btn {
                width: 100%;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 338
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

        // line 339
        yield "<!-- Video Background -->
<video class=\"video-background\" autoplay muted loop playsinline>
    <source src=\"";
        // line 341
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/background-video.mp4"), "html", null, true);
        yield "\" type=\"video/mp4\">
    Votre navigateur ne supporte pas la vidéo HTML5.
</video>

<!-- Hero Section -->
<div class=\"hero-section\">
    <div class=\"hero-overlay\"></div>
    <div class=\"hero-content\">
        <h1>MuseHub</h1>
        <p class=\"hero-description\">
            Découvrez une plateforme exceptionnelle dédiée à l'art. Chaque jour, de nouvelles œuvres sont ajoutées par nos artistes talentueux. 
            Explorez, partagez et achetez des créations artistiques uniques. Rejoignez notre communauté passionnée d'art et de culture.
        </p>
        <div class=\"hero-buttons\">
            <a href=\"";
        // line 355
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
        yield "\" class=\"hero-btn hero-btn-primary\">
                <i class=\"fas fa-paint-brush me-2\"></i>EXPLORER LES ŒUVRES
            </a>
            <a href=\"";
        // line 358
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("community");
        yield "\" class=\"hero-btn hero-btn-secondary\">
                <i class=\"fas fa-users me-2\"></i>REJOINDRE LA COMMUNAUTÉ
            </a>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class=\"gallery-section\">
    <div class=\"container\">
        <div class=\"section-header\">
            <h2><i class=\"fas fa-images me-2\"></i>Galerie d'Art</h2>
            <p>Découvrez notre collection exceptionnelle d'œuvres d'art de renommée mondiale</p>
        </div>
        ";
        // line 372
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["featuredArtworks"]) || array_key_exists("featuredArtworks", $context) ? $context["featuredArtworks"] : (function () { throw new RuntimeError('Variable "featuredArtworks" does not exist.', 372, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 373
            yield "            <div class=\"gallery-grid\">
                ";
            // line 374
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["featuredArtworks"]) || array_key_exists("featuredArtworks", $context) ? $context["featuredArtworks"] : (function () { throw new RuntimeError('Variable "featuredArtworks" does not exist.', 374, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["artwork"]) {
                // line 375
                yield "                    <div class=\"gallery-item\">
                        ";
                // line 376
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 376)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 377
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 377), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 377), "html", null, true);
                    yield "\" loading=\"lazy\">
                        ";
                } else {
                    // line 379
                    yield "                            <div class=\"artwork-image d-flex align-items-center justify-content-center text-muted\" style=\"height: 350px; background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%);\">
                                <i class=\"fas fa-image fa-3x\"></i>
                            </div>
                        ";
                }
                // line 383
                yield "                        <div class=\"gallery-item-info\">
                            <div class=\"gallery-item-title\">";
                // line 384
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 384), "html", null, true);
                yield "</div>
                            <div class=\"gallery-item-artist\">";
                // line 385
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["artistNames"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "artistUuid", [], "any", false, false, false, 385), [], "array", true, true, false, 385) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["artistNames"]) || array_key_exists("artistNames", $context) ? $context["artistNames"] : (function () { throw new RuntimeError('Variable "artistNames" does not exist.', 385, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "artistUuid", [], "any", false, false, false, 385), [], "array", false, false, false, 385)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["artistNames"]) || array_key_exists("artistNames", $context) ? $context["artistNames"] : (function () { throw new RuntimeError('Variable "artistNames" does not exist.', 385, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "artistUuid", [], "any", false, false, false, 385), [], "array", false, false, false, 385), "html", null, true)) : ("Artiste MuseHub"));
                yield "</div>
                            <div class=\"gallery-item-meta\">
                                <span class=\"text-muted\">
                                    ";
                // line 388
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 388)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 389
                    yield "                                        <i class=\"fas fa-tag me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 389), "name", [], "any", false, false, false, 389), "html", null, true);
                    yield "
                                    ";
                } else {
                    // line 391
                    yield "                                        <i class=\"fas fa-palette me-1\"></i>Œuvre originale
                                    ";
                }
                // line 393
                yield "                                </span>
                                <span class=\"gallery-item-price\">
                                    ";
                // line 395
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 395)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 396
                    yield "                                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 396), "html", null, true);
                    yield " €
                                    ";
                } else {
                    // line 398
                    yield "                                        Prix libre
                                    ";
                }
                // line 400
                yield "                                </span>
                            </div>
                            <div class=\"gallery-item-actions\">
                                <a href=\"";
                // line 403
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artwork_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 403)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"fas fa-eye me-1\"></i>Consulter
                                </a>
                                <a href=\"";
                // line 406
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("marketplace");
                yield "?artwork=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 406), "html", null, true);
                yield "\" class=\"btn btn-gradient btn-sm\">
                                    <i class=\"fas fa-shopping-cart me-1\"></i>Acheter
                                </a>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['artwork'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 413
            yield "            </div>
        ";
        } else {
            // line 415
            yield "            <div class=\"alert alert-light text-center\" role=\"alert\">
                <i class=\"fas fa-image me-2\"></i>Aucune image détectée dans <code>assets/oeuvres</code>.
            </div>
        ";
        }
        // line 419
        yield "        <div class=\"text-center mt-5\">
            <a href=\"";
        // line 420
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
        yield "\" class=\"btn btn-primary btn-lg\">
                <i class=\"fas fa-th-large me-2\"></i>Voir toute la collection
            </a>
        </div>
    </div>
</div>

<!-- Latest Artworks Section -->
<div class=\"content-section\">
    <div class=\"container\">
        <h2 class=\"section-title\"><i class=\"fas fa-paint-brush me-2\"></i>Dernières Œuvres</h2>
        <div class=\"row g-4\">
            ";
        // line 432
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["latestArtworks"]) || array_key_exists("latestArtworks", $context) ? $context["latestArtworks"] : (function () { throw new RuntimeError('Variable "latestArtworks" does not exist.', 432, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["artwork"]) {
            // line 433
            yield "            <div class=\"col-md-6 col-lg-4\">
                <div class=\"card h-100\">
                    ";
            // line 435
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 435)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 436
                yield "                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 436), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 436), "html", null, true);
                yield "\" class=\"artwork-image\">
                    ";
            } else {
                // line 438
                yield "                        <div class=\"artwork-image bg-secondary d-flex align-items-center justify-content-center text-white\" style=\"background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%);\">
                            <i class=\"fas fa-image fa-3x\"></i>
                        </div>
                    ";
            }
            // line 442
            yield "                    <div class=\"card-body\">
                        <h5 class=\"card-title\">";
            // line 443
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 443), "html", null, true);
            yield "</h5>
                        <p class=\"text-muted small mb-2\">
                            ";
            // line 445
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 445)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 446
                yield "                                <span class=\"badge\" style=\"background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%); color: white; padding: 5px 12px; border-radius: 15px;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 446), "name", [], "any", false, false, false, 446), "html", null, true);
                yield "</span>
                            ";
            }
            // line 448
            yield "                        </p>
                        ";
            // line 449
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "description", [], "any", false, false, false, 449)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 450
                yield "                            <p class=\"card-text small\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "description", [], "any", false, false, false, 450), 0, 100), "html", null, true);
                yield "...</p>
                        ";
            }
            // line 452
            yield "                        <div class=\"d-flex justify-content-between align-items-center mt-3\">
                            ";
            // line 453
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 453)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 454
                yield "                                <span class=\"fw-bold\" style=\"color: #7f00ff; font-size: 1.1rem;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 454), "html", null, true);
                yield " €</span>
                            ";
            } else {
                // line 456
                yield "                                <span class=\"text-muted\">Prix sur demande</span>
                            ";
            }
            // line 458
            yield "                            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artwork_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 458)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-primary\">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
            ";
            $context['_iterated'] = true;
        }
        // line 463
        if (!$context['_iterated']) {
            // line 464
            yield "            <div class=\"col-12\">
                <div class=\"alert text-center\" style=\"background: linear-gradient(135deg, rgba(255, 208, 230, 0.3) 0%, rgba(196, 159, 255, 0.2) 100%); border: 1px solid #FFD0E6; color: #555; padding: 30px;\">
                    <i class=\"fas fa-info-circle me-2\"></i>Aucune œuvre disponible pour le moment.
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['artwork'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 470
        yield "        </div>
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
        return "front/home.html.twig";
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
        return array (  715 => 470,  704 => 464,  702 => 463,  691 => 458,  687 => 456,  681 => 454,  679 => 453,  676 => 452,  670 => 450,  668 => 449,  665 => 448,  659 => 446,  657 => 445,  652 => 443,  649 => 442,  643 => 438,  635 => 436,  633 => 435,  629 => 433,  624 => 432,  609 => 420,  606 => 419,  600 => 415,  596 => 413,  581 => 406,  575 => 403,  570 => 400,  566 => 398,  560 => 396,  558 => 395,  554 => 393,  550 => 391,  544 => 389,  542 => 388,  536 => 385,  532 => 384,  529 => 383,  523 => 379,  515 => 377,  513 => 376,  510 => 375,  506 => 374,  503 => 373,  501 => 372,  484 => 358,  478 => 355,  461 => 341,  457 => 339,  444 => 338,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'front/base.html.twig' %}

{% block title %}Accueil - MuseHub{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        :root {
            --primary-color: #7f00ff;
            --secondary-color: #FF9CB6;
            --accent-color: #FFD0E6;
            --light-bg: #F0F0F0;
            --gray-color: #CACACA;
        }
        
        body {
            position: relative;
            overflow-x: hidden;
        }
        
        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }
        
        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: -3rem;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 100px 20px 80px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .hero-content h1 {
            font-size: 4.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 15px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
            line-height: 1.2;
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-content .hero-description {
            font-size: 1.3rem;
            line-height: 1.8;
            text-shadow: 1px 1px 8px rgba(0,0,0,0.3);
            margin-bottom: 3rem;
            animation: fadeInUp 1.2s ease-out;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1.4s ease-out;
        }
        
        .hero-btn {
            padding: 18px 45px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        
        .hero-btn-primary {
            background: linear-gradient(135deg, #FF9CB6 0%, #FF6B9D 100%);
            color: white;
        }
        
        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 156, 182, 0.5);
        }
        
        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.95);
            color: #7f00ff;
        }
        
        .hero-btn-secondary:hover {
            background: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }
        
        /* Gallery Section */
        .gallery-section {
            background: white;
            padding: 100px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 50%, #FFD0E6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(196, 159, 255, 0.2);
            transition: all 0.4s ease;
            cursor: pointer;
            background: white;
        }
        
        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255, 156, 182, 0.35);
        }
        
        .gallery-item img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-item-info {
            padding: 25px;
            background: white;
        }
        .gallery-item-info .gallery-item-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 0.95rem;
            color: #666;
        }
        .gallery-item-price {
            font-weight: 700;
            color: #7f00ff;
        }
        .gallery-item-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .gallery-item-actions .btn {
            flex: 1;
            border-radius: 999px;
            font-weight: 600;
        }
        .gallery-item-actions .btn-outline-primary {
            border: 2px solid #7f00ff;
            color: #7f00ff;
        }
        .gallery-item-actions .btn-outline-primary:hover {
            background: #7f00ff;
            color: white;
        }
        .gallery-item-actions .btn-gradient {
            background: linear-gradient(135deg, #FF9CB6 0%, #7f00ff 100%);
            color: white;
            border: none;
            box-shadow: 0 8px 20px rgba(196, 159, 255, 0.25);
        }
        .gallery-item-actions .btn-gradient:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .gallery-item-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .gallery-item-artist {
            font-size: 0.95rem;
            color: #7f00ff;
            font-weight: 500;
        }
        
        /* Content Sections */
        .content-section {
            background: #F0F0F0;
            padding: 80px 0;
        }
        
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #333;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 100%);
            border-radius: 2px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(196, 159, 255, 0.15);
            transition: transform 0.3s ease;
            overflow: hidden;
            background: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 156, 182, 0.25);
        }
        
        .artwork-image {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #7f00ff 0%, #FF9CB6 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(196, 159, 255, 0.4);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content .hero-description {
                font-size: 1.1rem;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .hero-btn {
                width: 100%;
            }
        }
    </style>
{% endblock %}

{% block body %}
<!-- Video Background -->
<video class=\"video-background\" autoplay muted loop playsinline>
    <source src=\"{{ asset('assets/background-video.mp4') }}\" type=\"video/mp4\">
    Votre navigateur ne supporte pas la vidéo HTML5.
</video>

<!-- Hero Section -->
<div class=\"hero-section\">
    <div class=\"hero-overlay\"></div>
    <div class=\"hero-content\">
        <h1>MuseHub</h1>
        <p class=\"hero-description\">
            Découvrez une plateforme exceptionnelle dédiée à l'art. Chaque jour, de nouvelles œuvres sont ajoutées par nos artistes talentueux. 
            Explorez, partagez et achetez des créations artistiques uniques. Rejoignez notre communauté passionnée d'art et de culture.
        </p>
        <div class=\"hero-buttons\">
            <a href=\"{{ path('artworks') }}\" class=\"hero-btn hero-btn-primary\">
                <i class=\"fas fa-paint-brush me-2\"></i>EXPLORER LES ŒUVRES
            </a>
            <a href=\"{{ path('community') }}\" class=\"hero-btn hero-btn-secondary\">
                <i class=\"fas fa-users me-2\"></i>REJOINDRE LA COMMUNAUTÉ
            </a>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class=\"gallery-section\">
    <div class=\"container\">
        <div class=\"section-header\">
            <h2><i class=\"fas fa-images me-2\"></i>Galerie d'Art</h2>
            <p>Découvrez notre collection exceptionnelle d'œuvres d'art de renommée mondiale</p>
        </div>
        {% if featuredArtworks is not empty %}
            <div class=\"gallery-grid\">
                {% for artwork in featuredArtworks %}
                    <div class=\"gallery-item\">
                        {% if artwork.imageUrl %}
                            <img src=\"{{ artwork.imageUrl }}\" alt=\"{{ artwork.title }}\" loading=\"lazy\">
                        {% else %}
                            <div class=\"artwork-image d-flex align-items-center justify-content-center text-muted\" style=\"height: 350px; background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%);\">
                                <i class=\"fas fa-image fa-3x\"></i>
                            </div>
                        {% endif %}
                        <div class=\"gallery-item-info\">
                            <div class=\"gallery-item-title\">{{ artwork.title }}</div>
                            <div class=\"gallery-item-artist\">{{ artistNames[artwork.artistUuid] ?? 'Artiste MuseHub' }}</div>
                            <div class=\"gallery-item-meta\">
                                <span class=\"text-muted\">
                                    {% if artwork.category %}
                                        <i class=\"fas fa-tag me-1\"></i>{{ artwork.category.name }}
                                    {% else %}
                                        <i class=\"fas fa-palette me-1\"></i>Œuvre originale
                                    {% endif %}
                                </span>
                                <span class=\"gallery-item-price\">
                                    {% if artwork.price %}
                                        {{ artwork.price }} €
                                    {% else %}
                                        Prix libre
                                    {% endif %}
                                </span>
                            </div>
                            <div class=\"gallery-item-actions\">
                                <a href=\"{{ path('artwork_show', {id: artwork.id}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"fas fa-eye me-1\"></i>Consulter
                                </a>
                                <a href=\"{{ path('marketplace') }}?artwork={{ artwork.id }}\" class=\"btn btn-gradient btn-sm\">
                                    <i class=\"fas fa-shopping-cart me-1\"></i>Acheter
                                </a>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <div class=\"alert alert-light text-center\" role=\"alert\">
                <i class=\"fas fa-image me-2\"></i>Aucune image détectée dans <code>assets/oeuvres</code>.
            </div>
        {% endif %}
        <div class=\"text-center mt-5\">
            <a href=\"{{ path('artworks') }}\" class=\"btn btn-primary btn-lg\">
                <i class=\"fas fa-th-large me-2\"></i>Voir toute la collection
            </a>
        </div>
    </div>
</div>

<!-- Latest Artworks Section -->
<div class=\"content-section\">
    <div class=\"container\">
        <h2 class=\"section-title\"><i class=\"fas fa-paint-brush me-2\"></i>Dernières Œuvres</h2>
        <div class=\"row g-4\">
            {% for artwork in latestArtworks %}
            <div class=\"col-md-6 col-lg-4\">
                <div class=\"card h-100\">
                    {% if artwork.imageUrl %}
                        <img src=\"{{ artwork.imageUrl }}\" alt=\"{{ artwork.title }}\" class=\"artwork-image\">
                    {% else %}
                        <div class=\"artwork-image bg-secondary d-flex align-items-center justify-content-center text-white\" style=\"background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%);\">
                            <i class=\"fas fa-image fa-3x\"></i>
                        </div>
                    {% endif %}
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{{ artwork.title }}</h5>
                        <p class=\"text-muted small mb-2\">
                            {% if artwork.category %}
                                <span class=\"badge\" style=\"background: linear-gradient(135deg, #7f00ff 0%, #FFD0E6 100%); color: white; padding: 5px 12px; border-radius: 15px;\">{{ artwork.category.name }}</span>
                            {% endif %}
                        </p>
                        {% if artwork.description %}
                            <p class=\"card-text small\">{{ artwork.description|slice(0, 100) }}...</p>
                        {% endif %}
                        <div class=\"d-flex justify-content-between align-items-center mt-3\">
                            {% if artwork.price %}
                                <span class=\"fw-bold\" style=\"color: #7f00ff; font-size: 1.1rem;\">{{ artwork.price }} €</span>
                            {% else %}
                                <span class=\"text-muted\">Prix sur demande</span>
                            {% endif %}
                            <a href=\"{{ path('artwork_show', {id: artwork.id}) }}\" class=\"btn btn-sm btn-primary\">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
            {% else %}
            <div class=\"col-12\">
                <div class=\"alert text-center\" style=\"background: linear-gradient(135deg, rgba(255, 208, 230, 0.3) 0%, rgba(196, 159, 255, 0.2) 100%); border: 1px solid #FFD0E6; color: #555; padding: 30px;\">
                    <i class=\"fas fa-info-circle me-2\"></i>Aucune œuvre disponible pour le moment.
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</div>
{% endblock %}
", "front/home.html.twig", "C:\\xampp\\htdocs\\Musehub3\\templates\\front\\home.html.twig");
    }
}
