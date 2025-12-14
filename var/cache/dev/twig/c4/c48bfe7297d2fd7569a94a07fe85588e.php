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

/* front/artworks.html.twig */
class __TwigTemplate_996b3bab3dd918295a78cfb2de9d46a6 extends Template
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
        // line 2
        return "front/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/artworks.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/artworks.html.twig"));

        $this->parent = $this->load("front/base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Œuvres - MuseHub";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<div class=\"container my-5\">
    <div class=\"mb-4\">
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left me-2\"></i>Retour à l'accueil
        </a>
    </div>

    <div class=\"text-center mb-5\">
        <h1 class=\"display-4 fw-bold mb-3\">Galerie d'Œuvres</h1>
        <p class=\"lead text-muted\">Découvrez notre collection d'œuvres d'art</p>
    </div>

    <!-- Formulaire de création d'œuvre -->
    ";
        // line 20
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20) && (CoreExtension::inFilter("ROLE_ARTIST", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "roles", [], "any", false, false, false, 20)) || CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "user", [], "any", false, false, false, 20), "roles", [], "any", false, false, false, 20))))) {
            // line 21
            yield "    <div class=\"card mb-5\">
        <div class=\"card-body\">
            <h5 class=\"card-title mb-3\">
                <i class=\"fas fa-plus-circle me-2\"></i>Ajouter une nouvelle œuvre
            </h5>
            <form action=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("web_artworks_create");
            yield "\" method=\"POST\" enctype=\"multipart/form-data\" id=\"artworkForm\">
                <div class=\"row\">
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Titre *</label>
                        <input type=\"text\" class=\"form-control\" name=\"title\" required>
                    </div>
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Prix (€)</label>
                        <input type=\"number\" step=\"0.01\" class=\"form-control\" name=\"price\">
                    </div>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Description</label>
                    <textarea class=\"form-control\" name=\"description\" rows=\"3\"></textarea>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">
                            <i class=\"fas fa-upload me-2\"></i>Image de l'œuvre (depuis votre PC) <span class=\"text-danger\">*</span>
                        </label>
                        <input type=\"file\" class=\"form-control\" name=\"image_file\" accept=\"image/*\" id=\"image_file_input\">
                        <small class=\"form-text text-muted\">Formats acceptés: JPG, PNG, GIF, WEBP (max 5MB)</small>
                        <div class=\"mt-2\">
                            <img id=\"imagePreview\" src=\"\" alt=\"Aperçu\" style=\"max-width: 200px; max-height: 200px; display: none; border-radius: 8px; margin-top: 10px;\">
                        </div>
                    </div>
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Catégorie <span class=\"text-danger\">*</span></label>
                        <select class=\"form-select\" name=\"category_id\" required>
                            <option value=\"\">Aucune catégorie</option>
                            ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 56, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 57
                yield "                                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 57), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 57), "html", null, true);
                yield "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            yield "                        </select>
                    </div>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">
                        <i class=\"fas fa-link me-2\"></i>Ou URL de l'image (optionnel)
                    </label>
                    <input type=\"url\" class=\"form-control\" name=\"image_url\" id=\"image_url_input\" placeholder=\"https://...\">
                    <small class=\"form-text text-muted\">Si vous préférez utiliser une URL au lieu d'uploader un fichier</small>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Statut</label>
                    <select class=\"form-select\" name=\"status\">
                        <option value=\"visible\" selected>Visible</option>
                        <option value=\"hidden\">Masqué</option>
                    </select>
                </div>
                <div class=\"d-flex justify-content-end\">
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-save me-2\"></i>Créer l'œuvre
                    </button>
                </div>
            </form>
            
            <script>
                // Preview image before upload
                const imageFileInput = document.getElementById('image_file_input');
                const imageUrlInput = document.getElementById('image_url_input');
                
                if (imageFileInput) {
                    imageFileInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.getElementById('imagePreview');
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                            // Clear URL input when file is selected
                            if (imageUrlInput) {
                                imageUrlInput.value = '';
                            }
                        }
                    });
                }
                
                // Clear file input when URL is entered
                if (imageUrlInput) {
                    imageUrlInput.addEventListener('input', function() {
                        if (this.value && imageFileInput) {
                            imageFileInput.value = '';
                            const preview = document.getElementById('imagePreview');
                            if (preview) {
                                preview.style.display = 'none';
                            }
                        }
                    });
                }
                
                // Form validation - require either file or URL
                document.getElementById('artworkForm')?.addEventListener('submit', function(e) {
                    const hasFile = imageFileInput && imageFileInput.files.length > 0;
                    const hasUrl = imageUrlInput && imageUrlInput.value.trim() !== '';
                    
                    if (!hasFile && !hasUrl) {
                        e.preventDefault();
                        alert('Veuillez soit uploader une image, soit fournir une URL d\\'image.');
                        return false;
                    }
                });
            </script>
        </div>
    </div>
    ";
        }
        // line 135
        yield "
    <div class=\"row\">
        <!-- Sidebar Filters -->
        <div class=\"col-lg-3 mb-4\">
            <div class=\"card shadow-sm border-0\">
                <div class=\"card-header bg-white\">
                    <h5 class=\"mb-0\"><i class=\"fas fa-filter me-2\"></i>Filtres</h5>
                </div>
                <div class=\"card-body\">
                    <form action=\"";
        // line 144
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
        yield "\" method=\"GET\">
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Catégorie</label>
                            <select name=\"category\" class=\"form-select\">
                                <option value=\"\">Toutes les catégories</option>
                                ";
        // line 149
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 149, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 150
            yield "                                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 150), "html", null, true);
            yield "\" ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 150, $this->source); })()), "category", [], "any", false, false, false, 150) == CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 150))) ? ("selected") : (""));
            yield ">
                                        ";
            // line 151
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 151), "html", null, true);
            yield "
                                    </option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        yield "                            </select>
                        </div>
                        
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Prix (€)</label>
                            <div class=\"d-flex gap-2\">
                                <input type=\"number\" name=\"min_price\" class=\"form-control\" placeholder=\"Min\" value=\"";
        // line 160
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 160, $this->source); })()), "min_price", [], "any", false, false, false, 160), "html", null, true);
        yield "\">
                                <input type=\"number\" name=\"max_price\" class=\"form-control\" placeholder=\"Max\" value=\"";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 161, $this->source); })()), "max_price", [], "any", false, false, false, 161), "html", null, true);
        yield "\">
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Trier par</label>
                            <select name=\"sort\" class=\"form-select mb-2\">
                                <option value=\"newest\" ";
        // line 168
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 168, $this->source); })()), "sort", [], "any", false, false, false, 168) == "newest")) ? ("selected") : (""));
        yield ">Plus récents</option>
                                <option value=\"price\" ";
        // line 169
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 169, $this->source); })()), "sort", [], "any", false, false, false, 169) == "price")) ? ("selected") : (""));
        yield ">Prix</option>
                                <option value=\"likes\" ";
        // line 170
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 170, $this->source); })()), "sort", [], "any", false, false, false, 170) == "likes")) ? ("selected") : (""));
        yield ">Popularité</option>
                            </select>
                            <select name=\"direction\" class=\"form-select\">
                                <option value=\"DESC\" ";
        // line 173
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 173, $this->source); })()), "direction", [], "any", false, false, false, 173) == "DESC")) ? ("selected") : (""));
        yield ">Décroissant</option>
                                <option value=\"ASC\" ";
        // line 174
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 174, $this->source); })()), "direction", [], "any", false, false, false, 174) == "ASC")) ? ("selected") : (""));
        yield ">Croissant</option>
                            </select>
                        </div>

                        <div class=\"d-grid gap-2\">
                            <button type=\"submit\" class=\"btn btn-primary\">Appliquer</button>
                            <a href=\"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
        yield "\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class=\"d-grid mt-3\">
                <a href=\"";
        // line 187
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("harvard_collection");
        yield "\" class=\"btn btn-danger text-white shadow-sm\">
                    <i class=\"fas fa-university me-2\"></i>Collection Harvard
                </a>
            </div>
        </div>

        <!-- Artwork Grid -->
        <div class=\"col-lg-9\">
            <div class=\"row g-4\">
                ";
        // line 196
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["artworks"]) || array_key_exists("artworks", $context) ? $context["artworks"] : (function () { throw new RuntimeError('Variable "artworks" does not exist.', 196, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["artwork"]) {
            // line 197
            yield "                <div class=\"col-md-6 col-lg-4\">
                    <div class=\"card h-100 shadow-sm border-0 transition-hover\">
                        <div class=\"position-relative\">
                            ";
            // line 200
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 200)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 201
                yield "                                <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "imageUrl", [], "any", false, false, false, 201), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 201), "html", null, true);
                yield "\" class=\"card-img-top artwork-image\" style=\"height: 250px; object-fit: cover;\">
                            ";
            } else {
                // line 203
                yield "                                <div class=\"card-img-top bg-light d-flex align-items-center justify-content-center\" style=\"height: 250px;\">
                                    <i class=\"fas fa-image fa-3x text-muted\"></i>
                                </div>
                            ";
            }
            // line 207
            yield "                            
                            <!-- Like Button Overlay -->
                            <button class=\"btn btn-light rounded-circle position-absolute top-0 end-0 m-2 shadow-sm like-btn\" 
                                    data-artwork-id=\"";
            // line 210
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 210), "html", null, true);
            yield "\"
                                    data-url=\"";
            // line 211
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_artworks_like", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 211)]), "html", null, true);
            yield "\"
                                    title=\"J'aime\">
                                <i class=\"far fa-heart text-danger\"></i>
                            </button>
                        </div>
                        
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <h5 class=\"card-title mb-0 text-truncate\">";
            // line 219
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "title", [], "any", false, false, false, 219), "html", null, true);
            yield "</h5>
                                <span class=\"badge bg-light text-dark border\">
                                    <i class=\"fas fa-heart text-danger me-1\"></i>
                                    <span class=\"likes-count\">";
            // line 222
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "likesCount", [], "any", false, false, false, 222), "html", null, true);
            yield "</span>
                                </span>
                            </div>
                            
                            <p class=\"text-muted small mb-2\">
                                ";
            // line 227
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 227)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 228
                yield "                                    <span class=\"badge bg-info bg-opacity-10 text-info\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "category", [], "any", false, false, false, 228), "name", [], "any", false, false, false, 228), "html", null, true);
                yield "</span>
                                ";
            }
            // line 230
            yield "                            </p>
                            
                            ";
            // line 232
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "description", [], "any", false, false, false, 232)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 233
                yield "                                <p class=\"card-text small text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "description", [], "any", false, false, false, 233), 0, 100), "html", null, true);
                yield "...</p>
                            ";
            }
            // line 235
            yield "                        </div>
                        
                        <div class=\"card-footer bg-white border-top-0 d-flex justify-content-between align-items-center pb-3\">
                            <span class=\"fw-bold text-primary\">";
            // line 238
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 238)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "price", [], "any", false, false, false, 238) . " €"), "html", null, true)) : ("Sur demande"));
            yield "</span>
                            <a href=\"";
            // line 239
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artwork_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["artwork"], "id", [], "any", false, false, false, 239)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\">Voir</a>
                        </div>
                    </div>
                </div>
                ";
            $context['_iterated'] = true;
        }
        // line 243
        if (!$context['_iterated']) {
            // line 244
            yield "                <div class=\"col-12\">
                    <div class=\"alert alert-info text-center py-5\">
                        <i class=\"fas fa-search fa-3x mb-3 text-info\"></i>
                        <h5>Aucune œuvre trouvée</h5>
                        <p>Essayez de modifier vos filtres de recherche.</p>
                        <a href=\"";
            // line 249
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("artworks");
            yield "\" class=\"btn btn-primary mt-2\">Voir tout</a>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['artwork'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        yield "            </div>
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
        return "front/artworks.html.twig";
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
        return array (  480 => 253,  470 => 249,  463 => 244,  461 => 243,  452 => 239,  448 => 238,  443 => 235,  437 => 233,  435 => 232,  431 => 230,  425 => 228,  423 => 227,  415 => 222,  409 => 219,  398 => 211,  394 => 210,  389 => 207,  383 => 203,  375 => 201,  373 => 200,  368 => 197,  363 => 196,  351 => 187,  341 => 180,  332 => 174,  328 => 173,  322 => 170,  318 => 169,  314 => 168,  304 => 161,  300 => 160,  292 => 154,  283 => 151,  276 => 150,  272 => 149,  264 => 144,  253 => 135,  175 => 59,  164 => 57,  160 => 56,  127 => 26,  120 => 21,  118 => 20,  104 => 9,  100 => 7,  87 => 6,  64 => 4,  41 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
{% extends 'front/base.html.twig' %}

{% block title %}Œuvres - MuseHub{% endblock %}

{% block body %}
<div class=\"container my-5\">
    <div class=\"mb-4\">
        <a href=\"{{ path('home') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"fas fa-arrow-left me-2\"></i>Retour à l'accueil
        </a>
    </div>

    <div class=\"text-center mb-5\">
        <h1 class=\"display-4 fw-bold mb-3\">Galerie d'Œuvres</h1>
        <p class=\"lead text-muted\">Découvrez notre collection d'œuvres d'art</p>
    </div>

    <!-- Formulaire de création d'œuvre -->
    {% if app.user and ('ROLE_ARTIST' in app.user.roles or 'ROLE_ADMIN' in app.user.roles) %}
    <div class=\"card mb-5\">
        <div class=\"card-body\">
            <h5 class=\"card-title mb-3\">
                <i class=\"fas fa-plus-circle me-2\"></i>Ajouter une nouvelle œuvre
            </h5>
            <form action=\"{{ path('web_artworks_create') }}\" method=\"POST\" enctype=\"multipart/form-data\" id=\"artworkForm\">
                <div class=\"row\">
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Titre *</label>
                        <input type=\"text\" class=\"form-control\" name=\"title\" required>
                    </div>
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Prix (€)</label>
                        <input type=\"number\" step=\"0.01\" class=\"form-control\" name=\"price\">
                    </div>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Description</label>
                    <textarea class=\"form-control\" name=\"description\" rows=\"3\"></textarea>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">
                            <i class=\"fas fa-upload me-2\"></i>Image de l'œuvre (depuis votre PC) <span class=\"text-danger\">*</span>
                        </label>
                        <input type=\"file\" class=\"form-control\" name=\"image_file\" accept=\"image/*\" id=\"image_file_input\">
                        <small class=\"form-text text-muted\">Formats acceptés: JPG, PNG, GIF, WEBP (max 5MB)</small>
                        <div class=\"mt-2\">
                            <img id=\"imagePreview\" src=\"\" alt=\"Aperçu\" style=\"max-width: 200px; max-height: 200px; display: none; border-radius: 8px; margin-top: 10px;\">
                        </div>
                    </div>
                    <div class=\"col-md-6 mb-3\">
                        <label class=\"form-label\">Catégorie <span class=\"text-danger\">*</span></label>
                        <select class=\"form-select\" name=\"category_id\" required>
                            <option value=\"\">Aucune catégorie</option>
                            {% for category in categories %}
                                <option value=\"{{ category.id }}\">{{ category.name }}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">
                        <i class=\"fas fa-link me-2\"></i>Ou URL de l'image (optionnel)
                    </label>
                    <input type=\"url\" class=\"form-control\" name=\"image_url\" id=\"image_url_input\" placeholder=\"https://...\">
                    <small class=\"form-text text-muted\">Si vous préférez utiliser une URL au lieu d'uploader un fichier</small>
                </div>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Statut</label>
                    <select class=\"form-select\" name=\"status\">
                        <option value=\"visible\" selected>Visible</option>
                        <option value=\"hidden\">Masqué</option>
                    </select>
                </div>
                <div class=\"d-flex justify-content-end\">
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-save me-2\"></i>Créer l'œuvre
                    </button>
                </div>
            </form>
            
            <script>
                // Preview image before upload
                const imageFileInput = document.getElementById('image_file_input');
                const imageUrlInput = document.getElementById('image_url_input');
                
                if (imageFileInput) {
                    imageFileInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.getElementById('imagePreview');
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                            // Clear URL input when file is selected
                            if (imageUrlInput) {
                                imageUrlInput.value = '';
                            }
                        }
                    });
                }
                
                // Clear file input when URL is entered
                if (imageUrlInput) {
                    imageUrlInput.addEventListener('input', function() {
                        if (this.value && imageFileInput) {
                            imageFileInput.value = '';
                            const preview = document.getElementById('imagePreview');
                            if (preview) {
                                preview.style.display = 'none';
                            }
                        }
                    });
                }
                
                // Form validation - require either file or URL
                document.getElementById('artworkForm')?.addEventListener('submit', function(e) {
                    const hasFile = imageFileInput && imageFileInput.files.length > 0;
                    const hasUrl = imageUrlInput && imageUrlInput.value.trim() !== '';
                    
                    if (!hasFile && !hasUrl) {
                        e.preventDefault();
                        alert('Veuillez soit uploader une image, soit fournir une URL d\\'image.');
                        return false;
                    }
                });
            </script>
        </div>
    </div>
    {% endif %}

    <div class=\"row\">
        <!-- Sidebar Filters -->
        <div class=\"col-lg-3 mb-4\">
            <div class=\"card shadow-sm border-0\">
                <div class=\"card-header bg-white\">
                    <h5 class=\"mb-0\"><i class=\"fas fa-filter me-2\"></i>Filtres</h5>
                </div>
                <div class=\"card-body\">
                    <form action=\"{{ path('artworks') }}\" method=\"GET\">
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Catégorie</label>
                            <select name=\"category\" class=\"form-select\">
                                <option value=\"\">Toutes les catégories</option>
                                {% for category in categories %}
                                    <option value=\"{{ category.name }}\" {{ filters.category == category.name ? 'selected' : '' }}>
                                        {{ category.name }}
                                    </option>
                                {% endfor %}
                            </select>
                        </div>
                        
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Prix (€)</label>
                            <div class=\"d-flex gap-2\">
                                <input type=\"number\" name=\"min_price\" class=\"form-control\" placeholder=\"Min\" value=\"{{ filters.min_price }}\">
                                <input type=\"number\" name=\"max_price\" class=\"form-control\" placeholder=\"Max\" value=\"{{ filters.max_price }}\">
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-bold\">Trier par</label>
                            <select name=\"sort\" class=\"form-select mb-2\">
                                <option value=\"newest\" {{ filters.sort == 'newest' ? 'selected' : '' }}>Plus récents</option>
                                <option value=\"price\" {{ filters.sort == 'price' ? 'selected' : '' }}>Prix</option>
                                <option value=\"likes\" {{ filters.sort == 'likes' ? 'selected' : '' }}>Popularité</option>
                            </select>
                            <select name=\"direction\" class=\"form-select\">
                                <option value=\"DESC\" {{ filters.direction == 'DESC' ? 'selected' : '' }}>Décroissant</option>
                                <option value=\"ASC\" {{ filters.direction == 'ASC' ? 'selected' : '' }}>Croissant</option>
                            </select>
                        </div>

                        <div class=\"d-grid gap-2\">
                            <button type=\"submit\" class=\"btn btn-primary\">Appliquer</button>
                            <a href=\"{{ path('artworks') }}\" class=\"btn btn-outline-secondary\">Réinitialiser</a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class=\"d-grid mt-3\">
                <a href=\"{{ path('harvard_collection') }}\" class=\"btn btn-danger text-white shadow-sm\">
                    <i class=\"fas fa-university me-2\"></i>Collection Harvard
                </a>
            </div>
        </div>

        <!-- Artwork Grid -->
        <div class=\"col-lg-9\">
            <div class=\"row g-4\">
                {% for artwork in artworks %}
                <div class=\"col-md-6 col-lg-4\">
                    <div class=\"card h-100 shadow-sm border-0 transition-hover\">
                        <div class=\"position-relative\">
                            {% if artwork.imageUrl %}
                                <img src=\"{{ artwork.imageUrl }}\" alt=\"{{ artwork.title }}\" class=\"card-img-top artwork-image\" style=\"height: 250px; object-fit: cover;\">
                            {% else %}
                                <div class=\"card-img-top bg-light d-flex align-items-center justify-content-center\" style=\"height: 250px;\">
                                    <i class=\"fas fa-image fa-3x text-muted\"></i>
                                </div>
                            {% endif %}
                            
                            <!-- Like Button Overlay -->
                            <button class=\"btn btn-light rounded-circle position-absolute top-0 end-0 m-2 shadow-sm like-btn\" 
                                    data-artwork-id=\"{{ artwork.id }}\"
                                    data-url=\"{{ path('api_artworks_like', {id: artwork.id}) }}\"
                                    title=\"J'aime\">
                                <i class=\"far fa-heart text-danger\"></i>
                            </button>
                        </div>
                        
                        <div class=\"card-body\">
                            <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                <h5 class=\"card-title mb-0 text-truncate\">{{ artwork.title }}</h5>
                                <span class=\"badge bg-light text-dark border\">
                                    <i class=\"fas fa-heart text-danger me-1\"></i>
                                    <span class=\"likes-count\">{{ artwork.likesCount }}</span>
                                </span>
                            </div>
                            
                            <p class=\"text-muted small mb-2\">
                                {% if artwork.category %}
                                    <span class=\"badge bg-info bg-opacity-10 text-info\">{{ artwork.category.name }}</span>
                                {% endif %}
                            </p>
                            
                            {% if artwork.description %}
                                <p class=\"card-text small text-muted\">{{ artwork.description|slice(0, 100) }}...</p>
                            {% endif %}
                        </div>
                        
                        <div class=\"card-footer bg-white border-top-0 d-flex justify-content-between align-items-center pb-3\">
                            <span class=\"fw-bold text-primary\">{{ artwork.price ? artwork.price ~ ' €' : 'Sur demande' }}</span>
                            <a href=\"{{ path('artwork_show', {id: artwork.id}) }}\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3\">Voir</a>
                        </div>
                    </div>
                </div>
                {% else %}
                <div class=\"col-12\">
                    <div class=\"alert alert-info text-center py-5\">
                        <i class=\"fas fa-search fa-3x mb-3 text-info\"></i>
                        <h5>Aucune œuvre trouvée</h5>
                        <p>Essayez de modifier vos filtres de recherche.</p>
                        <a href=\"{{ path('artworks') }}\" class=\"btn btn-primary mt-2\">Voir tout</a>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "front/artworks.html.twig", "C:\\xampp\\htdocs\\musehub2\\templates\\front\\artworks.html.twig");
    }
}
