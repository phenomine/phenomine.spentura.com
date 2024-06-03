<?php

namespace App\Controllers;

use App\Helpers\Docs;
use Phenomine\Support\Http\Request;
use Phenomine\Support\Routing\Get;
use Phenomine\Support\Routing\Post;

class DocumentationController
{
    #[Get('/docs', 'docs')]
    public function index() {
        $version = Docs::getLatestVersion();
        redirect(route('docs.content', ['version' => $version]));
    }

    #[Get('/docs/{version}/{slug?}/{slug_specs?}', 'docs.content')]
    public function version(Request $request, string $version, string $slug = 'installation', string $slug_specs = null) {
        if ($slug_specs != null) {
            $path = $slug . '/' . $slug_specs;
        } else {
            $path = $slug;
        }

        $content = Docs::getContent($version, $path);

        return view('pages.docs', [
            'content' => $content
        ]);

    }
}
