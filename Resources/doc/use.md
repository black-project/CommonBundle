How to use this awesome bundle?
===============================

## Form - EventListener

### SetButtonsSubscriber

SetButtonSubsriber add 3 (or 4 if your class is already persisted and have an $id) buttons
in your FormType. This "trick" allow you to manage your form submission with something like
this `$this->form->get('button')->isClicked()`.

If you want more information about this, just [read this](http://symfony.com/blog/new-in-symfony-2-3-buttons-support-in-forms).


### Views

#### Fields
`fields.html.twig` changes `{% block form_* %}` and adapt them for Twitter Bootstrap.

I use this form_theme by this way (in my `::base.html.twig`)

```yaml

{% if form is defined %}
    {% form_theme form 'BlackAssetsBundle:Form:fields.html.twig' %}
{% endif %}

<!DOCTYPE html>

[...]

```

### Public
Twitter Bootstrap v2.3.7

```yaml

{#  Import CSS  #}
{% stylesheets '@BlackAssetsBundle/Resources/public/css/bootstrap.min.css' %}
<link href="{{ asset_url }}" rel="stylesheet" media="screen, projection" />
{% endstylesheets %}

{% stylesheets '@BlackAssetsBundle/Resources/public/css/bootstrap-responsive.min.css' %}
<link href="{{ asset_url }}" rel="stylesheet" media="screen, projection" />
{% endstylesheets %}

{% block stylesheets %}{% endblock %}

{% javascripts '@BlackAssetsBundle/Resources/public/js/bootstrap.min.js' %}
<script src="{{ asset_url }}"></script>
{% endjavascripts %}

{% block javascripts %}{% endblock %}
```
