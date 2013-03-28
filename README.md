dtGeshiBundle
===================================================

Add in the composer
```
requires: {
    ...,
    "theodordiaconu/geshi-bundle" : "dev-master",
}
```

In the app/AppKernel.php file
```
$bundles = array(
    ...,
    new DT\Bundle\GeshiBundle\DTGeshiBundle(),
);
```

How to use
===================================================

After you have plugged it in your Symfony2 Application you have several ways to use this:

Twig
---------------------------
```
{{ block_of_code|geshi_highlight('javascript') }}

{{ geshi_highlight(block_of_code, 'javascript') }}
```

Controller
---------------------------
```
public function indexAction()
{
    // ...
    $highlighter = $this->get('dt_geshi.highlighter');

    return $highlighter->createResponse('<h1>Hello</h1>', 'html');
}
```

Also, for bad ass people I have also plugged in another method:
```
return $highlighter->createJSONResponse(array('hello' => 'there'));
```