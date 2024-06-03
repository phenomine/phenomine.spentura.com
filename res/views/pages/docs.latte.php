{layout 'layouts.documentation'}
{block title}Installation{/block}

{block content}
<div class="w-full px-6 mx-auto max-w-8xl">
    <div class="lg:flex">
        {include 'components.sidebar'}
        <main id="content-wrapper" class="flex-auto w-full min-w-0 lg:static lg:max-h-full lg:overflow-visible">
            <div class="flex w-full">
                <div class="flex-auto max-w-4xl min-w-0 pt-6 lg:px-8 lg:pt-8 pb:12 xl:pb-24 lg:pb-16">
                    <div id="mainContent" class="slide-it text-gray-900 dark:text-gray-400">

                        {$content|noescape}

<!--                        <aside class="flex mt-6 mb-8 font-medium leading-6 border-t border-gray-200 dark:border-gray-900 pt-8" aria-label="Previous and next page navigation">-->
<!--                            <a class="flex items-center justify-center mr-8 text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" href="/docs/components/rating/"><svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">-->
<!--                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>-->
<!--                                </svg>Rating</a>-->
<!--                            <a class="flex items-center justify-center ml-auto text-right text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" href="/docs/components/skeleton/">Skeleton<svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">-->
<!--                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>-->
<!--                                </svg></a>-->
<!---->
<!--                        </aside>-->
                    </div>
                </div>

                <div class="flex-none hidden w-64 pl-8 mr-8 xl:text-sm xl:block">
                    <div class="flex overflow-y-auto sticky top-28 flex-col justify-between pb-6 h-[calc(100vh-5rem)]">
                        <div class="mb-8">
                            <h4 class="mb-2 text-sm font-semibold tracking-wide text-gray-900 uppercase dark:text-white lg:text-xs">On this page</h4>
                            <nav id="TableOfContents">
                                <ul class="text-gray-800 dark:text-gray-400 text-md">

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
{/block}
