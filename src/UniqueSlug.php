<?php

namespace Shah\LaravelUniqueSlugGenerator;

class UniqueSlug
{
    /**
     * Generate a Unique Slug.
     * @return string
     * @throws \Exception
     */
    public function unique_slug_generate($model, $value, $field, $separator = null)
    {
        try{
            $separator = empty($separator) ? config('unique-slug.separator') : $separator;
            $id = 0;

            $slug =  preg_replace('/\s+\?+\#+\/+/', $separator, (trim(strtolower($value))));
            $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);
            $SlugsLists = $this->getDulicateSlug($slug, $id, $model, $field);
            if (!$SlugsLists->contains("$field", $slug)) {
                return $slug;
            }
            for ($i = 1; $i <= config('unique-slug.max_count'); $i++) {
                $generatedSlug = $slug . $separator . $i;
                if (!$SlugsLists->contains("$field", $generatedSlug)) {
                    return $generatedSlug;
                }
            }
        }catch( \Exception $e){
            throw new \Exception('Can`t create unique slug ', $e->getMessage());
        }
        
    }

    private function getDulicateSlug($slug, $id, $model, $field)
    {
        // early return if the slug
        if (empty($id)) {
            $id = 0;
        }

        return $model::select("$field")
            ->where("$field", 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
