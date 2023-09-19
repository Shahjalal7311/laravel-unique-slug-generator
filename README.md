## Installation

## Use from Model
 - Import first the UniqueSlugFacade facade in model

```php
use Shah\LaravelUniqueSlugGenerator\Facades\UniqueSlugFacade;

public static function slug_generator($title = null){
    return ShahUniqSlug::unique_slug_generate(model::class', $title, 'name');
}

```

### Call form controller

```

$slug = Model::slug_generator($param);

```

### In app.config 

## add in providers
```
    Shah\LaravelUniqueSlugGenerator\UniqueSlugServiceProvider::class,
```
## add in aliases
```

'ShahUniqSlug' => Shah\LaravelUniqueSlugGenerator\Facades\UniqueSlugFacade::class
```
## Help Link
 - https://laravel.com/docs/10.x/packages
 - https://github.com/laravel/laravel
