<?php

namespace model\Trait;

trait TraitSlugify
{
    public function slugify(string $s): string
    {
        // retrait des balises html
        $text = strip_tags($s);
        // On remplace les caractères accentués par des '-'
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // On choisit la locale en utf8
        setlocale(LC_ALL, 'en_US.utf8');
        // On remplace les caractères accentués restants
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // On efface les caractères non alphanumériques
        $text = preg_replace('~[^-\w]+~', '', $text);
        // on retire les espaces
        $text = trim($text, '-');
        // on retire les caractères '-' en double
        $text = preg_replace('~-+~', '-', $text);
        // on met tout en minuscule
        $text = strtolower($text);
        // si le texte est vide
        if (empty($text)) {
            return 'n-a';
        }
        // résultat
        return $text;

        /*
         * Autre code possible
    {
     $text = strtolower(trim(preg_replace(['~[^\pL\d]+~u', '~[^-\w]+~', '~-+~'], ['-', '', '-'], strip_tags($s)), '-'));
        return empty($text) ? 'n-a' : $text;
       }
         */
    }
}