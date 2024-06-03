<aside id="sidebar" class="fixed inset-0 z-20 flex-none h-full w-72 lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-72 lg:block hidden" aria-labelledby="sidebar-label" aria-label="sidebar-label">
    <h4 id="sidebar-label" class="sr-only">Browse docs</h4>
    <div id="navWrapper" class="overflow-y-auto z-20 h-full bg-white scrolling-touch max-w-2xs lg:h-[calc(100vh-3rem)] lg:block lg:sticky top:24 lg:top-28 dark:bg-gray-950 lg:mr-0 pl-6 pr-6">
        <div class="sticky top-0 -ml-0.5 pointer-events-none z-10">
            <div class="h-1 bg-white dark:bg-gray-950"></div>
            <div class="bg-white dark:bg-gray-950 relative pointer-events-auto -mt-2 pt-2">
<!--                <button type="button" class="search-box-init hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700">-->
<!--                    <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none">-->
<!--                        <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
<!--                        <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>-->
<!--                    </svg>Quick search... <span class="ml-auto pl-3 flex-none text-xs font-semibold">⌘K</span>-->
<!--                </button>-->
<!--                <div class="h-[2px] -m-1 bg-gray-950">-->
<!--                    <div id="docsearch"></div>-->
<!--                </div>-->
                <div id="docsearch"></div>

            </div>
            <div class="h-8 bg-gradient-to-b from-white dark:from-gray-950"></div>
        </div>
        <nav id="nav" class="pt-20 px-1 pl-3 lg:pl-0 lg:-mt-5 lg:pt-0 font-normal text-base lg:text-sm pb-10 lg:pb-20 sticky?lg:h-(screen-18)" aria-label="Docs navigation">
            <ul class="mb-0 list-unstyled">
                {foreach \App\Helpers\Docs::menu() as $menu}
                <li>
                    {if $menu['title'] != 'Index'}
                    <h5 class="mb-2 mt-2 text-sm font-semibold tracking-wide text-gray-900 uppercase lg:text-xs dark:text-white">
                        {$menu['title']}
                    </h5>
                    {/if}
                    <ul class="py-1 list-unstyled fw-normal small">
                        {foreach $menu['items'] as $item}
                        <li>
                            <a n:transition="route('docs.content', ['version' => $item['version'], 'slug' => $item['path']])" data-sidebar-item="" class="py-2 transition-colors duration-200 relative flex items-center flex-wrap font-medium hover:text-gray-900 dark:hover:text-white
                            {if routeIs(route('docs.content', ['version' => $item['version'], 'slug' => $item['path']]))}
                            text-black dark:text-white
                            {else}
                            text-gray-500 dark:text-gray-400
                            {/if}
                            ">
                                {$item['title']}
                                {if $item['new']}
                                <span>
                                    <span class="bg-blue-100 text-blue-800 text-2xs font-semibold ml-2 px-1.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-100 dark:border-blue-400">NEW</span>
                                </span>
                                {/if}
                            </a>
                        </li>
                        {/foreach}
                    </ul>
                </li>
                {/foreach}
            </ul>
        </nav>
    </div>
</aside>
<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/60" id="sidebarBackdrop"></div>
