dtGeshiBundle
===================================================

Add in the composer
``
    requires: {
        ...,
        "theodordiaconu/geshi-bundle" : "dev-master",
    }
``

In the app/AppKernel.php file
``
    $bundles = array(
        ...,
        new DT\Bundle\GeshiBundle\dtGeshiBundle(),
    );
``

How to use
===================================================

After you have plugged it in your Symfony2 Application you have several ways to use this:

Twig
---------------------------
``
{{ block_of_code|geshi_highlight('js') }}
{{ geshi_highlight(block_of_code, 'js') }}
``

Controller
---------------------------
