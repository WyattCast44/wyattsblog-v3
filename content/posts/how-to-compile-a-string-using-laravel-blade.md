---
title: 'How to compile a string using Laravel Blade'
slug: how-to-compile-a-string-using-laravel-blade
excerpt: 'Have you ever needed to render a random string with Blade? Well here''s how to do it.'
updated_at: 2021-05-13T00:52:19+00:00
created_at: 2021-05-13T00:52:19+00:00
published: false
---
Laravel's templating engine Blade is a beautiful and powerful tool. But the blade engine will only compile templates that are actually written to a file somewhere (as far as I know). This is not a meaningful limitation in everyday uses cases, but there may come a day where you need to compile a string.

To illustrate the basic steps involved let's look at the example below and see how we could compile this string using the Blade engine.

```php
$title = "Blade is awesome";

$template = '# {{ Str::title($title) }}';
```

The first thing we do to is put this content into a temporary file. So the question becomes where should we create this file? You can theoretically store this file anywhere, but I like to create a new tmp folder in the storage directory.

```bash
storage/
├── framework/
│──── views/
│────── tmp/
```

So we know where we will store in, we now need a name for the file, I prefer to use the `uniqid2` function like the example below, I prefix the file with `blade_` just for convenience in debugging.

```php
$filename = uniqid('blade_');
```

Notice that I did not append .blade.php, this is because when Blade attempts to find the file it will automatically append the .blade.php extension.

To generate the full path to the desired file I use one of the path helper functions:

```php
$filepath = storage_path("framework/views/tmp/$filename.blade.php");
```

When Blade is looking for the view file it will only look in places where you have told it to look. If you look at your default `config/view.php` file you find a `paths` array, this is an array of all the places that Blade will look for templates that you want it to compile.

If we want Blade to find our generated files at the path we just generated we need to tell it to also check in that location, so we will add it to the `config/view.php` file:

```php
'paths' => [
    resource_path('views'),
    storage_path("framework/views/tmp"),
],
```

We now have the filename and path, we just need to ensure that the directory exists

```php
if (!file_exists(storage_path("framework/views/tmp"))) {
    mkdir(storage_path("framework/views/tmp"), 0777, true);
}
```

So we know the directory exists, we just need to write the template to the filepath:

```php
file_put_contents($filepath, trim($template));
```

Finally we have our template in a file, we can now compile it using the View class!

```php
use Illuminate\Support\Facades\View;

$rendered = (View::make($filename, [
    'title' => $title,
]))->render();

// output => # Blade Is Awesome
```

The last thing we need to do is clean up that temporary file:

```php
unlink($filepath);
```

That's really it, not to bad once you break it down. If you want to keep reading, we will refactor this into a nice helper function for your toolbag.

## Refactoring

We can rewrite the above steps into a helper function like below.

```php
/**
 * Render a given blade template with the optionally given data
 */
function blade($template, $data = []): string
{
    $filename = uniqid('blade_');

    $path = config('view.tmp_directory');

    View::addLocation($path);

    $filepath = $path . DIRECTORY_SEPARATOR . "$filename.blade.php";

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    file_put_contents($filepath, trim($template));

    $rendered = (View::make($filename, $data))->render();

    unlink($filepath);

    return $rendered;
}
```

Notice instead of adding our path to the paths array, we are using the `addLocation` method to tell Blade to check that path at runtime. If we just added it to the paths array, Blade may check there when compiling our normal views which just decreases performance. We also made the temporary directory configurable by adding the `tmp_directory` to our `view.php` file.

## Conclusion

One thing to consider in real world applications is caching your compiled templates and checking if it already exists before recompiling it, it might look something like below:

```php
public function getContentAttribute($value)
{
    if (app()->environment('production')) {
        if(Cache::has('blog.posts.content.' . $this->id)) {
            return Cache::get('blog.posts.content.' . $this->id);
        }
    }

    $contents = blade($value, $this->getViewData());

    if (app()->environment('production')) {
        Cache::put('blog.posts.content.' . $this->id, $contents);
    }

    return $contents;
}
```

I hope that this helps you out if you ever find yourself needing to compile a string using Blade. If have any questions or ideas to improve this flow let me know on twitter [@wyattcastaned44](https://twitter.com/wyattcastaned44)