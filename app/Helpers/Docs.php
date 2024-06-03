<?php

namespace App\Helpers;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\MarkdownConverter;
use Phenomine\Support\File;
use Phenomine\Support\Str;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

class Docs
{
    public static function getLatestVersion() : string {
        return config('version.current', 'master');
    }

    public static function getVersions() : array {
        $directories = File::allDirectories(res_path('static/docs'));
        $versions = [];
        foreach ($directories as $directory) {
            $versions[] = [
                'version' => Str::toUpperFirst(basename($directory)),
                'path' => basename($directory)
            ];
        }
        return $versions;
    }

    public static function menu() : array
    {
        $version = request()->attributes->get('version');
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

            $menu[$group]['title'] = $groupTitle;
            $menu[$group]['items'][] = [
                'title' => $title,
                'path' => Str::replace($realFile, '.md', ''),
                'new' => $frontMatter['new'] ?? false,
                'version' => $version
            ];
        }

        // re-order menu with index at first
        $menu = array_merge(['index' => $menu['index']], $menu);

        return $menu;
    }

    public static function getContent($version, $path)
    {
        $file = res_path('static/docs/' . $version . '/' . $path . '.md');
        if (!File::exists($file)) {
            return null;
        }
        $content = File::read($file);
        $environment = new Environment([]);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new FrontMatterExtension());
        $converter = new MarkdownConverter($environment);
        return $converter->convert($content);
    }
}
