<x-app-layout>
    <div class="grid xl:grid-cols-3 grid-cols-1 py-6 sm:pt-6 p-2">
        <div class="xl:col-span-2 mx-5 h-max">
            <div class="shadow rounded-md w-full mx-auto" id="preview-{{$script->id}}">
                <div class="flex space-x-4" name="script-meta">
                    <div class="flex-1 space-y-4 py-1">
                        <div name="script-details" class="space-y-2 pl-3">
                            <div name="script-title" class="text-xl font-black">{{$script->name}}</div>
                            <div name="script-description" class="text-xs truncate">{{$script->description}}</div>
                        </div>
                    </div>
                    <div class="flex-1 space-y-4 py-3">
                        <div name="script-stats" class="space-y-2 pr-3 flex flex-col place-self-end items-end content-end self-end place-content-end place-items-end">
                            <div name="script-views" class="text-sm">{{$script->views}} Views</div>
                            <div name="script-author" class="text-xs truncate">
                                @if ($script->author->verified)
                                    <i class="fa-solid fa-badge-check"> </i>
                                @endif
                                {{$script->author->name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div name="script-thumbnail" class="rounded-3xl bg-secondary h-full min-full overflow-hidden text-xs text-clip font-code">
                        <pre><code class="language-javascript">{{$script->script}}</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="">

        </div>
    </div>
    @vite(['resources/js/autoHighlight.js'])
</x-app-layout>
