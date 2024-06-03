<?php

namespace App\Helpers;

use Algolia\AlgoliaSearch\SearchClient;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;
use Phenomine\Support\File;
use Phenomine\Support\Str;

class Search
{
    public function generateDataset()
    {
        $client = SearchClient::create(config('algolia.app_id'), config('algolia.api_key'));
        $directories = File::allDirectories(res_path('static/docs'));
        $records = [];
        foreach ($directories as $directory) {
            $index = $this->datasetPerVersion(basename($directory));
            $algolia = $client->initIndex(basename($directory));
            $algolia->saveObjects($index, ['autoGenerateObjectIDIfNotExist' => true]);
        }
    }

    public function datasetPerVersion($version) {
        $files = File::allFiles(res_path('static/docs/' . $version), true);
        $menu = [];
        foreach ($files as $file) {
            $content = File::read($file);
            $frontMatterParser = new FrontMatterParser(new SymfonyYamlFrontMatterParser());
            $frontMatter = $frontMatterParser->parse($content)->getFrontMatter();
            $title = $frontMatter['title'] ?? 'Untitled';

            $group = 'index';
            $realFile = Str::replace($file, res_path('static/docs/' . $version . '/'), '');
            if (Str::contains($realFile, '/')) {
                $group = Str::split($realFile, '/');
                $group = $group[0];
            }
            // make title from group like 'the-basic' to 'The Basic'
            $groupTitle = Str::replace($group, '-', ' ');
            $groupTitle = Str::replace($groupTitle, '_', ' ');
            $groupTitle = Str::toUpperWords($groupTitle);
            $menu[] = [
                'title' => $title,
                'group' => $groupTitle,
                'description' => $frontMatter['description'] ?? '',
                'url' => Str::replace($realFile, '.md', '')
            ];
        }

        return $menu;
    }
}
