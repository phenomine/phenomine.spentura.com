<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{ifset title}{include title}{/ifset} | The Phenomine Framework</title>
    {tailwindcss}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="antialiased min-h-screen bg-white dark:bg-gray-950 line-numbers" data-prismjs-copy='<svg class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Z" clip-rule="evenodd"/>
</svg>'
      data-prismjs-copy-error="Press Ctrl+C to copy."
      data-prismjs-copy-success='<svg class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
</svg>
'>
<div class="ais-InstantSearch">
    <div id="searchbox"></div>
    <div id="hits"></div>
</div>
<div class="group relative">
    <div class="relative h-10 w-full min-w-[200px]">
        <input
            type="email"
            placeholder="Search"
            readonly=""
            class="peer h-full w-full rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 focus:border-2 focus:border-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 group-hover:border-2 group-hover:border-gray-900"
        />
    </div>
    <div class="absolute top-[calc(50%-1px)] right-2.5 -translate-y-2/4">
        <kbd class="rounded border border-blue-gray-100 bg-white px-1 pt-px pb-0 text-xs font-medium text-gray-900 shadow shadow-black/5">
      <span class="mr-0.5 inline-block translate-y-[1.5px] text-base">
        ⌘
      </span>
            K
        </kbd>
    </div>
    <div id="docsearch" class="absolute inset-0 w-full opacity-0"></div>
</div>
{ifset navbar}
{include navbar}
{/ifset}
{ifset content}
{include content}
{/ifset}
{ifset footer}
{include footer}
{/ifset}
<script src="{asset('build/js/app.min.js')}"></script>
<script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>
<script type="module" src="{asset('build/js/app.init.js')}"></script>
<script src="{asset('build/js/prism.js')}"></script>
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }
    var themeToggleBtn = document.getElementById('theme-toggle');
    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });
</script>
{ifset scripts}
{include scripts}
{/ifset}
</body>
</html>
