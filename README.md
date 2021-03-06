DTGeshiBundle
===================================================

Add in the composer
```javascript
requires: {
    // ...
    "theodordiaconu/geshi-bundle" : "dev-master",
}
```

In the app/AppKernel.php file
```php
$bundles = array(
    // ...
    new DT\Bundle\GeshiBundle\DTGeshiBundle(),
);
```

How to use
===================================================

After you have plugged it in your Symfony2 Application you have several ways to use this:

Twig
---------------------------
```twig
{{ block_of_code|geshi_highlight('javascript') }}

{{ geshi_highlight(block_of_code, 'javascript') }}
```

PHP
---------------------------

#### To get the highlighter

```php
$highlighter = $this->get('dt_geshi.highlighter');
```

#### Simple highlighting

```php
$highlighted = $highlighter->highlight('<h1>Please highlight me!</h1>', 'html');
```

#### To create a response that highlights everything automatically for you
```php
public function indexAction()
{
    // ...
    return $highlighter->createResponse('<h1>Hello</h1>', 'html');
    return $highlighter->createResponse('<h1>This is the line with the error</h1>', 'html', 500);
}
```

#### Also, for bad ass people I have also plugged in another method:

```php
$response = $highlighter->createJSONResponse(array('hello' => 'there'));
```


#### If you want flexibility in configuring the output, you've got it.

```php
$highlighted = $highlighter->highlight(
    '<h1>Please highlight me!</h1>',
    'html',
    function(\GeSHi\GeSHi $geshi){
        $geshi->set_header_type(GESHI_HEADER_NONE);
    }
);
```

#### How to set default options to GeSHi

```php
$highlighter->setDefaultOptions(function($geshi){
    /** @var $geshi \GeSHi\GeSHi */
    $geshi->set_header_type(GESHI_HEADER_NONE);
});

// the highlighting will proceed using the settings from the Default Options
$highlighted = $highlighter->highlight('<h1>Please highlight me!</h1>', 'html');
// or
$highlighter->createResponse('<h1>Hello</h1>', 'html');
```

